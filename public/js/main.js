/**
 * JobYaari – Main Site JavaScript
 */
$(function () {

  // ── Sticky Navbar ──────────────────────────────────────────────────────────
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 50) {
      $('#navbar').addClass('scrolled');
    } else {
      $('#navbar').removeClass('scrolled');
    }
  });

  // ── Hamburger Menu ─────────────────────────────────────────────────────────
  $('#hamburger').on('click', function () {
    $('#mobile-menu').toggleClass('open');
    const isOpen = $('#mobile-menu').hasClass('open');
    $(this).find('span').each(function (i) {
      if (isOpen) {
        if (i === 0) $(this).css({ transform: 'rotate(45deg) translate(5px, 5px)' });
        if (i === 1) $(this).css({ opacity: '0' });
        if (i === 2) $(this).css({ transform: 'rotate(-45deg) translate(5px, -5px)' });
      } else {
        $(this).css({ transform: '', opacity: '' });
      }
    });
  });

  // ── Close mobile menu on outside click ────────────────────────────────────
  $(document).on('click', function (e) {
    if (!$(e.target).closest('#navbar').length) {
      $('#mobile-menu').removeClass('open');
      $('#hamburger span').css({ transform: '', opacity: '' });
    }
  });

});
