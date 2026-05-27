/**
 * JobYaari – AJAX Filter Engine
 * Handles category pills, date filter, search, and pagination
 * All without page reload using jQuery AJAX
 */

$(function () {

  // ── State ─────────────────────────────────────────────────────────────────
  const state = {
    category:    'all',
    date:        '',
    search:      '',
    page:        1,
    loading:     false,
  };

  let searchTimer = null;
  const DEBOUNCE_MS = 350;

  // ── Selectors ──────────────────────────────────────────────────────────────
  const $grid       = $('#blog-grid');
  const $loading    = $('#loading-overlay');
  const $count      = $('#results-count');
  const $pagination = $('#pagination-wrap');
  const $heroSearch = $('#hero-search');

  // ── Core Fetch ─────────────────────────────────────────────────────────────
  function fetchBlogs(resetPage) {
    if (state.loading) return;

    if (resetPage) state.page = 1;
    state.loading = true;

    $loading.addClass('active');
    $grid.css('opacity', '0.4');

    $.ajax({
      url: '/ajax/filter',
      method: 'GET',
      data: {
        category: state.category !== 'all' ? state.category : '',
        date:     state.date,
        search:   state.search,
        page:     state.page,
      },
      success: function (res) {
        // Inject cards
        if (res.html.trim() === '') {
          $grid.html(`
            <div class="empty-state" style="grid-column:1/-1">
              <div class="empty-icon">🔍</div>
              <h3>No posts found</h3>
              <p>Try adjusting your filters or search term.</p>
            </div>
          `);
        } else {
          $grid.html(res.html);
        }

        // Update count
        $count.text(res.total);

        // Update pagination
        renderPagination(res.currentPage, res.lastPage);

        // Animate in
        $grid.css('opacity', '1');
        $grid.find('.blog-card').each(function (i) {
          $(this).css({ opacity: 0, transform: 'translateY(20px)' });
          setTimeout(() => {
            $(this).css({
              transition: 'opacity 0.3s ease, transform 0.3s ease',
              opacity: 1, transform: 'translateY(0)'
            });
          }, i * 60);
        });
      },
      error: function () {
        $grid.html(`<div class="empty-state" style="grid-column:1/-1">
          <div class="empty-icon">⚠️</div>
          <h3>Something went wrong</h3>
          <p>Please try again later.</p>
        </div>`);
      },
      complete: function () {
        $loading.removeClass('active');
        $grid.css('opacity', '1');
        state.loading = false;
      }
    });
  }

  // ── Render Pagination ──────────────────────────────────────────────────────
  function renderPagination(current, last) {
    if (last <= 1) { $pagination.html(''); return; }

    let html = '<nav class="pagination">';

    // Prev
    if (current > 1) {
      html += `<button class="page-btn" data-page="${current - 1}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="15 18 9 12 15 6"/></svg>
      </button>`;
    } else {
      html += `<span class="page-btn page-btn--disabled">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="15 18 9 12 15 6"/></svg>
      </span>`;
    }

    // Pages
    const pages = buildPageRange(current, last);
    pages.forEach(p => {
      if (p === '...') {
        html += `<span class="page-btn page-btn--dots">…</span>`;
      } else if (p === current) {
        html += `<span class="page-btn page-btn--active">${p}</span>`;
      } else {
        html += `<button class="page-btn" data-page="${p}">${p}</button>`;
      }
    });

    // Next
    if (current < last) {
      html += `<button class="page-btn" data-page="${current + 1}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="9 18 15 12 9 6"/></svg>
      </button>`;
    } else {
      html += `<span class="page-btn page-btn--disabled">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="9 18 15 12 9 6"/></svg>
      </span>`;
    }

    html += '</nav>';
    $pagination.html(html);
  }

  function buildPageRange(current, last) {
    if (last <= 7) return Array.from({ length: last }, (_, i) => i + 1);
    const pages = [];
    if (current <= 4) {
      for (let i = 1; i <= 5; i++) pages.push(i);
      pages.push('...'); pages.push(last);
    } else if (current >= last - 3) {
      pages.push(1); pages.push('...');
      for (let i = last - 4; i <= last; i++) pages.push(i);
    } else {
      pages.push(1); pages.push('...');
      for (let i = current - 1; i <= current + 1; i++) pages.push(i);
      pages.push('...'); pages.push(last);
    }
    return pages;
  }

  // ── Category Pills ─────────────────────────────────────────────────────────
  $(document).on('click', '.pill', function () {
    $('.pill').removeClass('active');
    $(this).addClass('active');
    state.category = $(this).data('category');
    fetchBlogs(true);
  });

  // ── Date Filter ────────────────────────────────────────────────────────────
  $('#date-filter').on('change', function () {
    state.date = $(this).val();
    fetchBlogs(true);
  });

  // ── Sidebar Search ─────────────────────────────────────────────────────────
  $('#sidebar-search').on('input', function () {
    clearTimeout(searchTimer);
    const val = $(this).val().trim();
    searchTimer = setTimeout(function () {
      state.search = val;
      fetchBlogs(true);
    }, DEBOUNCE_MS);
  });

  // ── Hero Search ────────────────────────────────────────────────────────────
  $('#hero-search-submit').on('click', function () {
    state.search = $heroSearch.val().trim();
    $('#sidebar-search').val(state.search);
    $('html, body').animate({ scrollTop: $('.blogs-section').offset().top - 80 }, 500);
    fetchBlogs(true);
  });

  $heroSearch.on('keypress', function (e) {
    if (e.key === 'Enter') $('#hero-search-submit').trigger('click');
  });

  // ── Clear Filters ──────────────────────────────────────────────────────────
  $('#clear-filters').on('click', function () {
    state.category = 'all'; state.date = ''; state.search = '';
    $('.pill').removeClass('active');
    $('.pill[data-category="all"]').addClass('active');
    $('#date-filter').val('');
    $('#sidebar-search').val('');
    $heroSearch.val('');
    fetchBlogs(true);
  });

  // ── Pagination ─────────────────────────────────────────────────────────────
  $(document).on('click', '.page-btn[data-page]', function () {
    state.page = parseInt($(this).data('page'));
    fetchBlogs(false);
    $('html, body').animate({ scrollTop: $('.blogs-section').offset().top - 100 }, 400);
  });

  // ── Mobile Filter Toggle ───────────────────────────────────────────────────
  $('#mobile-filter-toggle').on('click', function () {
    $('#filter-sidebar').toggleClass('mobile-open');
  });

});
