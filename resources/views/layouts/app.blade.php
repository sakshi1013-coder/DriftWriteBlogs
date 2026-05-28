<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DriftWrite Blogs – Professional blogging system with AJAX filtering, bookmarks, and rich writing experience.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DriftWrite Blogs – Premium Publishing Platform')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

<!-- Progress Bar Loader -->
<div id="top-loading-bar" class="top-loading-bar"></div>

<!-- ── Navbar ──────────────────────────────────────────────────────────────── -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <!-- Logo -->
        <a href="{{ route('blogs.index') }}" class="nav-logo">
            <svg class="logo-icon-svg" viewBox="0 0 36 36" fill="none">
                <rect width="36" height="36" rx="8" fill="#1a56db"/>
                <path d="M10 12h16M10 18h10M10 24h12" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                <path d="M22 17l4 4-8 8" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Drift<span class="logo-accent">Write</span>
        </a>

        <!-- Search — centered -->
        <div class="nav-search">
            <form action="{{ route('blogs.index') }}" method="GET" class="search-form">
                <div class="search-input-wrap">
                    <svg class="search-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <input type="text" name="search" id="global-search" placeholder="Search posts, bookmarks, guides..."
                        value="{{ request('search') }}" class="search-input" autocomplete="off">
                </div>
            </form>
        </div>

        <!-- Actions -->
        <div class="nav-actions">
            <a href="{{ route('admin.login') }}" class="btn-nav-admin">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                Admin
            </a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <!-- Mobile dropdown -->
    <div class="mobile-menu" id="mobile-menu">
        <form action="{{ route('blogs.index') }}" method="GET" class="mobile-search-form">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="mobile-search-input">
            <button type="submit" class="mobile-search-btn">Search</button>
        </form>
    </div>
</nav>

<!-- ── Flash ────────────────────────────────────────────────────────────────── -->
@if(session('success'))
<div class="flash-message flash-success">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22,4 12,14.01 9,11.01"/>
    </svg>
    {{ session('success') }}
</div>
@endif

<main>
    @yield('content')
</main>

<!-- ── Footer ──────────────────────────────────────────────────────────────── -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <div class="footer-logo">
                <svg width="28" height="28" viewBox="0 0 36 36" fill="none">
                    <rect width="36" height="36" rx="8" fill="#1a56db"/>
                    <path d="M10 12h16M10 18h10M10 24h12" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                Drift<span class="logo-accent">Write</span>
            </div>
            <p class="footer-tagline">Your high-performance blogging space with live filters, draft savings, and offline bookmarks.</p>
        </div>
        <div class="footer-links">
            <h4>Categories</h4>
            <ul>
                <li><a href="{{ route('blogs.index', ['category' => 'admit-card']) }}">Admit Card</a></li>
                <li><a href="{{ route('blogs.index', ['category' => 'result']) }}">Result</a></li>
                <li><a href="{{ route('blogs.index', ['category' => 'recruitment']) }}">Recruitment</a></li>
                <li><a href="{{ route('blogs.index', ['category' => 'syllabus']) }}">Syllabus</a></li>
                <li><a href="{{ route('blogs.index', ['category' => 'answer-key']) }}">Answer Key</a></li>
                <li><a href="{{ route('blogs.index', ['category' => 'exam-date']) }}">Exam Date</a></li>
            </ul>
        </div>
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ route('blogs.index') }}">All Posts</a></li>
                <li><a href="{{ route('admin.login') }}">Admin Panel</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} DriftWrite Blogs. Sleek, fast, and feature-rich.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
