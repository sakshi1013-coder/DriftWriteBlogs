@extends('admin.layouts.dashboard')
@section('page-title', 'Edit Post')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2 class="card-title">Edit Blog Post</h2>
        <div class="header-actions">
            <a href="{{ route('blogs.show', $blog->slug) }}" target="_blank" class="btn-secondary-sm">👁 View Live</a>
            <a href="{{ route('admin.blogs.index') }}" class="btn-secondary-sm">← Back</a>
        </div>
    </div>

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="blog-form" id="blog-form">
        @csrf @method('PUT')

        <div class="form-grid">
            <!-- Left Column -->
            <div class="form-col-main">
                <div class="form-field">
                    <label class="form-label" for="title">Post Title <span class="required">*</span></label>
                    <input type="text" id="title" name="title" class="form-input @error('title') is-error @enderror"
                        value="{{ old('title', $blog->title) }}" required>
                    @error('title') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="short_description">Short Description <span class="required">*</span></label>
                    <textarea id="short_description" name="short_description" rows="3"
                        class="form-textarea @error('short_description') is-error @enderror"
                        maxlength="500" required>{{ old('short_description', $blog->short_description) }}</textarea>
                    <div class="char-count"><span id="desc-count">{{ strlen($blog->short_description) }}</span>/500</div>
                    @error('short_description') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label class="form-label" for="content">Full Content <span class="required">*</span></label>
                    <textarea id="content" name="content" rows="20"
                        class="form-textarea form-textarea--tall @error('content') is-error @enderror"
                        >{{ old('content', $blog->content) }}</textarea>
                    @error('content') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Right Column -->
            <div class="form-col-side">
                <div class="side-card">
                    <h3 class="side-card-title">📅 Publish Settings</h3>

                    <div class="form-field">
                        <label class="form-label" for="category_id">Category <span class="required">*</span></label>
                        <select id="category_id" name="category_id"
                            class="form-select @error('category_id') is-error @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $blog->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label class="form-label" for="published_at">Publish Date <span class="required">*</span></label>
                        <input type="date" id="published_at" name="published_at"
                            class="form-input @error('published_at') is-error @enderror"
                            value="{{ old('published_at', $blog->published_at->format('Y-m-d')) }}" required>
                        @error('published_at') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label class="toggle-label">
                            <div class="toggle-wrap">
                                <input type="checkbox" name="is_published" id="is_published" value="1"
                                    {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </div>
                            <span>Published</span>
                        </label>
                    </div>
                </div>

                <div class="side-card">
                    <h3 class="side-card-title">🖼️ Featured Image</h3>

                    @if($blog->image)
                    <div class="current-image">
                        <p class="current-image-label">Current Image:</p>
                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="current-image-preview">
                    </div>
                    <p class="replace-hint">Upload a new image to replace it:</p>
                    @endif

                    <div class="image-upload-zone" id="image-upload-zone">
                        <input type="file" id="image" name="image" accept="image/*" class="image-file-input">
                        <div class="upload-placeholder" id="upload-placeholder">
                            <div class="upload-icon">📷</div>
                            <p class="upload-text">Click to upload or drag & drop</p>
                            <p class="upload-hint">JPEG, PNG, GIF, WebP — Max 2MB</p>
                        </div>
                        <div class="image-preview-wrap" id="image-preview-wrap" style="display:none">
                            <img id="image-preview" src="" alt="Preview" class="image-preview">
                            <button type="button" class="remove-image" id="remove-image">✕</button>
                        </div>
                    </div>
                    @error('image') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.blogs.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/>
                </svg>
                Update Post
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/admin-form.js') }}"></script>
@endpush
