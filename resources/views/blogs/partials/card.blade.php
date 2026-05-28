<article class="blog-card" style="animation-delay: {{ ($loop->index ?? 0) * 0.06 }}s" data-slug="{{ $blog->slug }}">
    <div class="card-image-wrap">
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="{{ $blog->title }}"
                 class="card-image"
                 onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
        @else
            <img src="{{ asset('images/default-blog.jpg') }}"
                 alt="{{ $blog->title }}"
                 class="card-image">
        @endif
        <div class="card-image-overlay"></div>
        <span class="card-category-badge" style="background: {{ $blog->category->color ?? '#1a56db' }}">
            {{ $blog->category->name ?? '' }}
        </span>
        
        {{-- Bookmark button --}}
        <button class="btn-bookmark" data-slug="{{ $blog->slug }}" title="Bookmark this post" aria-label="Bookmark">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
            </svg>
        </button>
    </div>

    <div class="card-body">
        <div class="card-meta">
            <span class="card-date">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ $blog->published_at->format('d M Y') }}
            </span>
            <span class="card-read-time">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
                {{ max(1, round(str_word_count(strip_tags($blog->content)) / 200)) }} min read
            </span>
        </div>

        <h2 class="card-title">
            <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
        </h2>

        @if($blog->short_description)
        <p class="card-excerpt">{{ Str::limit($blog->short_description, 95) }}</p>
        @endif

        <a href="{{ route('blogs.show', $blog->slug) }}" class="card-read-more">
            Read More
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="13" height="13">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </a>
    </div>
</article>
