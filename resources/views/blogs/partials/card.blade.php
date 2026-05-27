<article class="blog-card" data-id="{{ $blog->id }}">
    <a href="{{ route('blogs.show', $blog->slug) }}" class="card-image-link">
        <div class="card-image-wrap">
            <img src="{{ $blog->image_url }}"
                 alt="{{ $blog->title }}"
                 class="card-image"
                 loading="lazy"
                 onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
            <div class="card-image-overlay"></div>
            <span class="card-category-badge" style="background: {{ $blog->category->color }}">
                {{ $blog->category->name }}
            </span>
        </div>
    </a>
    <div class="card-body">
        <div class="card-meta">
            <span class="card-date">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="13" height="13">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ $blog->published_at->format('d M Y') }}
            </span>
            <span class="card-read-time">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="13" height="13">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                {{ $blog->read_time }}
            </span>
        </div>

        <h2 class="card-title">
            <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
        </h2>

        <p class="card-excerpt">{{ Str::limit($blog->short_description, 120) }}</p>

        <a href="{{ route('blogs.show', $blog->slug) }}" class="card-read-more">
            Read More
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
            </svg>
        </a>
    </div>
</article>
