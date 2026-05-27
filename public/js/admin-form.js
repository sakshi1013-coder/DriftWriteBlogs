/**
 * JobYaari – Admin Form JavaScript
 * Handles image preview, char count
 */
$(function () {

  // ── Character Count for Short Description ─────────────────────────────────
  const $desc  = $('#short_description');
  const $count = $('#desc-count');
  if ($desc.length) {
    $count.text($desc.val().length);
    $desc.on('input', function () {
      $count.text($(this).val().length);
    });
  }

  // ── Image Upload Preview ───────────────────────────────────────────────────
  const $fileInput    = $('#image');
  const $placeholder  = $('#upload-placeholder');
  const $previewWrap  = $('#image-preview-wrap');
  const $previewImg   = $('#image-preview');
  const $removeBtn    = $('#remove-image');

  $fileInput.on('change', function () {
    const file = this.files[0];
    if (!file) return;

    // Validate size
    if (file.size > 2 * 1024 * 1024) {
      alert('Image size must be less than 2MB');
      this.value = '';
      return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
      $previewImg.attr('src', e.target.result);
      $placeholder.hide();
      $previewWrap.show();
    };
    reader.readAsDataURL(file);
  });

  $removeBtn.on('click', function () {
    $fileInput.val('');
    $previewImg.attr('src', '');
    $previewWrap.hide();
    $placeholder.show();
  });

  // ── Drag and Drop ──────────────────────────────────────────────────────────
  const $zone = $('#image-upload-zone');

  $zone.on('dragover', function (e) {
    e.preventDefault();
    $(this).css('border-color', 'var(--primary)');
  });

  $zone.on('dragleave', function () {
    $(this).css('border-color', '');
  });

  $zone.on('drop', function (e) {
    e.preventDefault();
    $(this).css('border-color', '');
    const file = e.originalEvent.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
      const dt = new DataTransfer();
      dt.items.add(file);
      $fileInput[0].files = dt.files;
      $fileInput.trigger('change');
    }
  });

  // ── Submit button loading state ────────────────────────────────────────────
  $('#blog-form').on('submit', function () {
    $('#submit-btn').prop('disabled', true).html(`
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" class="spin-icon">
        <path d="M21 12a9 9 0 11-6.219-8.56"/>
      </svg>
      Saving...
    `);
  });

});
