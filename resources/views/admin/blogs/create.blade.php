@extends('admin.layouts.dashboard')
@section('page-title', 'Create New Post')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2 class="card-title">Create New Blog Post</h2>
        <a href="{{ route('admin.blogs.index') }}" class="btn-secondary-sm">&larr; Back</a>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="blog-form" id="blog-form">
        @csrf

        <div class="form-grid">
            <!-- Left: Main content -->
            <div class="form-col-main">
                <div class="form-field">
                    <label class="form-label" for="title">Post Title <span class="required">*</span></label>
                    <input type="text" id="title" name="title"
                        class="form-input-admin @error('title') is-error @enderror"
                        placeholder="e.g. SSC CGL 2024 Admit Card Released"
                        value="{{ old('title') }}" required>
                    @error('title') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="short_description">Short Description <span class="required">*</span></label>
                    <textarea id="short_description" name="short_description" rows="3"
                        class="form-textarea @error('short_description') is-error @enderror"
                        placeholder="Brief summary shown on blog cards (max 500 characters)"
                        maxlength="500" required>{{ old('short_description') }}</textarea>
                    <div class="char-count"><span id="desc-count">0</span> / 500</div>
                    @error('short_description') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label class="form-label">Full Content <span class="required">*</span></label>

                    {{-- Hidden input to hold Quill content for form submission --}}
                    <input type="hidden" name="content" id="content-input">

                    {{-- Quill editor container --}}
                    <div class="quill-editor-wrap">
                        <div id="quill-editor">{{ old('content') }}</div>
                    </div>
                    @error('content') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Right: Settings -->
            <div class="form-col-side">
                <div class="side-card">
                    <h3 class="side-card-title">Publish Settings</h3>

                    <div class="form-field">
                        <label class="form-label" for="category_id">Category <span class="required">*</span></label>
                        <select id="category_id" name="category_id"
                            class="form-select @error('category_id') is-error @enderror" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label class="form-label" for="published_at">Publish Date <span class="required">*</span></label>
                        <input type="date" id="published_at" name="published_at"
                            class="form-input-admin @error('published_at') is-error @enderror"
                            value="{{ old('published_at', date('Y-m-d')) }}" required>
                        @error('published_at') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label class="toggle-label">
                            <div class="toggle-wrap">
                                <input type="checkbox" name="is_published" id="is_published" value="1"
                                    {{ old('is_published', '1') ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </div>
                            <span>Publish immediately</span>
                        </label>
                    </div>
                </div>

                <div class="side-card">
                    <h3 class="side-card-title">Featured Image</h3>
                    <div class="image-upload-zone" id="image-upload-zone">
                        <input type="file" id="image" name="image" accept="image/*" class="image-file-input">
                        <div class="upload-placeholder" id="upload-placeholder">
                            <div class="upload-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="32" height="32">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/>
                                    <polyline points="21 15 16 10 5 21"/>
                                </svg>
                            </div>
                            <p class="upload-text">Click to upload image</p>
                            <p class="upload-hint">JPEG, PNG, WebP &mdash; Max 2MB</p>
                        </div>
                        <div class="image-preview-wrap" id="image-preview-wrap" style="display:none">
                            <img id="image-preview" src="" alt="Preview" class="image-preview">
                            <button type="button" class="remove-image" id="remove-image" title="Remove">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="12" height="12">
                                    <path d="M18 6 6 18M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('image') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.blogs.index') }}" class="btn-cancel">Cancel</a>
            <button type="button" class="btn-secondary" id="save-draft-btn" style="border: 1px solid var(--border); padding: 10px 18px; border-radius: var(--radius-sm); font-weight: 600; display: inline-flex; align-items: center; gap: 6px; cursor: pointer; color: var(--text-secondary); background: #fff;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4z"/>
                </svg>
                Save as Draft
            </button>
            <button type="submit" class="btn-submit" id="submit-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/>
                </svg>
                Publish Post
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script src="{{ asset('js/admin-form.js') }}"></script>
<script>
// Initialize Quill rich text editor
var quill = new Quill('#quill-editor', {
    theme: 'snow',
    placeholder: 'Write your full blog post content here...',
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, 4, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'align': [] }],
            ['blockquote', 'code-block'],
            ['link', 'image'],
            ['clean']
        ]
    }
});

// Pre-fill if old content exists (validation error case)
@if(old('content'))
quill.clipboard.dangerouslyPasteHTML(`{!! addslashes(old('content')) !!}`);
@endif

// On submit, copy Quill HTML to hidden input
document.getElementById('blog-form').addEventListener('submit', function() {
    document.getElementById('content-input').value = quill.root.innerHTML;
});

// Handle Save as Draft
document.getElementById('save-draft-btn').addEventListener('click', function() {
    document.getElementById('is_published').checked = false;
    document.getElementById('blog-form').submit();
});
</script>
@endpush
