@extends('layouts.app')
@section('title', 'JobYaari – Latest Government Job Updates & Exam News')

@section('content')
<!-- ── Hero Section ──────────────────────────────────────────────────────── -->
<section class="hero">
    <div class="hero-bg-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>
    <div class="hero-content">
        <div class="hero-badge">🔔 Live Updates</div>
        <h1 class="hero-title">Stay Ahead in Your<br><span class="gradient-text">Government Job Journey</span></h1>
        <p class="hero-subtitle">Admit cards, results, syllabi, answer keys & recruitment news — all in one place.</p>

        <div class="hero-search-box">
            <div class="hero-search-wrap">
                <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                </svg>
                <input type="text" id="hero-search" placeholder="Search for SSC, UPSC, Railway, Banking..." class="hero-search-input" autocomplete="off">
                <button class="hero-search-btn" id="hero-search-submit">Search</button>
            </div>
        </div>

        <div class="hero-stats">
            <div class="hero-stat">
                <span class="stat-number">{{ \App\Models\Blog::published()->count() }}+</span>
                <span class="stat-label">Articles</span>
            </div>
            <div class="hero-stat-divider"></div>
            <div class="hero-stat">
                <span class="stat-number">{{ \App\Models\Category::count() }}</span>
                <span class="stat-label">Categories</span>
            </div>
            <div class="hero-stat-divider"></div>
            <div class="hero-stat">
                <span class="stat-number">Daily</span>
                <span class="stat-label">Updates</span>
            </div>
        </div>
    </div>
</section>

<!-- ── Main Blog Section ─────────────────────────────────────────────────── -->
<section class="blogs-section">
    <div class="container">
        <div class="blogs-layout">

            <!-- ── Sidebar / Filters ─────────────────────────────────────── -->
            <aside class="filter-sidebar" id="filter-sidebar">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                        </svg>
                        Filter Posts
                    </h3>

                    <!-- Category Filter -->
                    <div class="filter-group">
                        <label class="filter-label">Category</label>
                        <div class="category-pills" id="category-pills">
                            <button class="pill active" data-category="all">All</button>
                            @foreach($categories as $cat)
                                <button class="pill" data-category="{{ $cat->slug }}"
                                    style="--pill-color: {{ $cat->color }}">
                                    {{ $cat->name }}
                                    <span class="pill-count">{{ $cat->blogs_count }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Date Filter -->
                    <div class="filter-group">
                        <label class="filter-label" for="date-filter">Filter by Month</label>
                        <input type="month" id="date-filter" class="date-input" value="{{ request('date') }}">
                    </div>

                    <!-- Search in sidebar -->
                    <div class="filter-group">
                        <label class="filter-label" for="sidebar-search">Search</label>
                        <div class="sidebar-search-wrap">
                            <input type="text" id="sidebar-search" class="sidebar-search-input"
                                placeholder="Search posts..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    <button class="btn-clear-filters" id="clear-filters">
                        ✕ Clear All Filters
                    </button>
                </div>

                <!-- Latest Posts -->
                <div class="sidebar-card">
                    <h3 class="sidebar-title">🔥 Latest Posts</h3>
                    <div class="latest-posts">
                        @foreach($latestBlogs as $latest)
                        <a href="{{ route('blogs.show', $latest->slug) }}" class="latest-post-item">
                            <div class="latest-post-cat" style="background: {{ $latest->category->color }}22; color: {{ $latest->category->color }}">
                                {{ $latest->category->name }}
                            </div>
                            <p class="latest-post-title">{{ Str::limit($latest->title, 60) }}</p>
                            <span class="latest-post-date">{{ $latest->published_at->format('d M Y') }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <!-- ── Blog Grid ─────────────────────────────────────────────── -->
            <div class="blog-main">
                <div class="blog-main-header">
                    <div class="results-info">
                        <span id="results-count">{{ $blogs->total() }}</span> posts found
                    </div>
                    <button class="mobile-filter-toggle" id="mobile-filter-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                        </svg>
                        Filters
                    </button>
                </div>

                <!-- Loading skeleton -->
                <div class="loading-overlay" id="loading-overlay">
                    <div class="spinner"></div>
                </div>

                <div class="blog-grid" id="blog-grid">
                    @forelse($blogs as $blog)
                        @include('blogs.partials.card', ['blog' => $blog])
                    @empty
                        <div class="empty-state" id="empty-state">
                            <div class="empty-icon">🔍</div>
                            <h3>No posts found</h3>
                            <p>Try adjusting your filters or search term.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="pagination-wrap" id="pagination-wrap">
                    {{ $blogs->links('blogs.partials.pagination') }}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/filter.js') }}"></script>
@endpush
