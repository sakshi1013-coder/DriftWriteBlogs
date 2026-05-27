<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JobYaari - Your trusted source for government job updates, exam results, admit cards, syllabus, and recruitment news.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'JobYaari – Sarkari Job Updates')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

<!-- ── Navigation ──────────────────────────────────────────────────────────── -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ route('blogs.index') }}" class="nav-logo">
            <span class="logo-icon">📋</span>
            <span class="logo-text">Job<span class="logo-accent">Yaari</span></span>
        </a>

        <div class="nav-search" id="nav-search-form">
            <form action="{{ route('blogs.index') }}" method="GET" class="search-form">
                <div class="search-input-wrap">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <input type="text" name="search" id="global-search" placeholder="Search jobs, results, admit cards..."
                        value="{{ request('search') }}" class="search-input" autocomplete="off">
                </div>
            </form>
        </div>

        <div class="nav-actions">
            <a href="{{ route('admin.login') }}" class="btn-nav-admin">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
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

    <!-- Mobile menu -->
    <div class="mobile-menu" id="mobile-menu">
        <form action="{{ route('blogs.index') }}" method="GET" class="mobile-search-form">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="mobile-search-input">
            <button type="submit" class="mobile-search-btn">Search</button>
        </form>
    </div>
</nav>

<!-- ── Main Content ────────────────────────────────────────────────────────── -->
<main class="main-content">
    @if(session('success'))
        <div class="flash-message flash-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22,4 12,14.01 9,11.01"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

<!-- ── Footer ─────────────────────────────────────────────────────────────── -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <a href="{{ route('blogs.index') }}" class="footer-logo">
                <span>📋</span> Job<span class="logo-accent">Yaari</span>
            </a>
            <p class="footer-tagline">Your trusted partner for government job updates, exam results, and career news across India.</p>
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
        <p>© {{ date('Y') }} JobYaari. Built with ❤️ for job seekers of India.</p>
    </div>
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

@stack('scripts')
</body>
</html>
