@extends('layouts.app')
@section('title', $blog->title . ' – DriftWrite')

@section('content')
<div class="blog-detail-wrap">
    <div class="container">

        <!-- ── Breadcrumb ──────────────────────────────────────────────── -->
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('blogs.index') }}">Home</a>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
            <a href="{{ route('blogs.index', ['category' => $blog->category->slug]) }}">
                {{ $blog->category->name }}
            </a>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
            <span>{{ Str::limit($blog->title, 50) }}</span>
        </nav>

        <div class="detail-layout">

            <!-- ── Article ─────────────────────────────────────────────── -->
            <article class="blog-article" data-slug="{{ $blog->slug }}">
                <!-- Hero Image -->
                <div class="article-image-wrap">
                    <img src="{{ $blog->image_url }}"
                         alt="{{ $blog->title }}"
                         class="article-image"
                         onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
                    <div class="article-image-gradient"></div>
                </div>

                <!-- Header -->
                <div class="article-header">
                    <div class="article-header-wrap">
                        <div class="article-tags">
                            <span class="article-cat-badge" style="background: {{ $blog->category->color }}22; color: {{ $blog->category->color }}; border-color: {{ $blog->category->color }}44">
                                {{ $blog->category->name }}
                            </span>
                        </div>
                        {{-- Bookmark button --}}
                        <button class="btn-detail-bookmark" data-slug="{{ $blog->slug }}" aria-label="Bookmark this post">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
                            </svg>
                            <span class="bookmark-text">Bookmark</span>
                        </button>
                    </div>

                    <h1 class="article-title">{{ $blog->title }}</h1>

                    <div class="article-meta">
                        <div class="meta-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            {{ $blog->published_at->format('d F Y') }}
                        </div>
                        <div class="meta-divider">•</div>
                        <div class="meta-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            {{ $blog->read_time }}
                        </div>
                    </div>

                    <p class="article-short-desc">{{ $blog->short_description }}</p>
                </div>

                <!-- Content -->
                <div class="article-content">
                    {!! $blog->content !!}
                </div>

                <!-- Share Section -->
                <div class="article-share">
                    <span class="share-label">Share this post:</span>
                    <div class="share-btns">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->url()) }}"
                           target="_blank" class="share-btn share-twitter" aria-label="Share on Twitter">
                            𝕏 Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . request()->url()) }}"
                           target="_blank" class="share-btn share-whatsapp" aria-label="Share on WhatsApp">
                            📱 WhatsApp
                        </a>
                        <button class="share-btn share-copy" id="copy-link" data-url="{{ request()->url() }}">
                            🔗 Copy Link
                        </button>
                    </div>
                </div>
            </article>

            <!-- ── Sidebar ──────────────────────────────────────────────── -->
            <aside class="detail-sidebar">
                <!-- Related Posts -->
                @if($related->count())
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        Related Posts
                    </h3>
                    <div class="related-posts">
                        @foreach($related as $rel)
                        <a href="{{ route('blogs.show', $rel->slug) }}" class="related-post-item">
                            <div class="related-post-img">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                                     onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
                            </div>
                            <div class="related-post-info">
                                <p class="related-post-title">{{ Str::limit($rel->title, 55) }}</p>
                                <span class="related-post-date">{{ $rel->published_at->format('d M Y') }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Category Filter Quick Links -->
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        </svg>
                        Browse Categories
                    </h3>
                    <div class="cat-quick-links">
                        @foreach(\App\Models\Category::withCount(['blogs' => fn($q) => $q->where('is_published', true)])->get() as $cat)
                        <a href="{{ route('blogs.index', ['category' => $cat->slug]) }}" class="cat-link"
                           style="--cat-color: {{ $cat->color }}">
                            {{ $cat->name }}
                            <span class="cat-count">{{ $cat->blogs_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#copy-link').on('click', function() {
    const url = $(this).data('url');
    navigator.clipboard.writeText(url).then(() => {
        $(this).text('✅ Copied!');
        setTimeout(() => $(this).text('🔗 Copy Link'), 2000);
    });
});
</script>
@endpush
