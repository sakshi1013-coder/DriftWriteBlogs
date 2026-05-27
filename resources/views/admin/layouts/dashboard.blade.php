<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin – JobYaari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body">

<div class="admin-wrapper">
    <!-- ── Sidebar ──────────────────────────────────────────────────────── -->
    <aside class="admin-sidebar" id="admin-sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                📋 Job<span>Yaari</span>
            </a>
            <button class="sidebar-close" id="sidebar-close">✕</button>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
            <div class="user-info">
                <p class="user-name">{{ auth()->user()->name }}</p>
                <p class="user-role">Administrator</p>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.blogs.index') }}"
               class="nav-item {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
                </svg>
                Blog Posts
            </a>
            <a href="{{ route('blogs.index') }}" target="_blank" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
                View Site
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ── Main Content ────────────────────────────────────────────────── -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <button class="hamburger-admin" id="hamburger-admin">
                <span></span><span></span><span></span>
            </button>
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
            <div class="topbar-right">
                <a href="{{ route('admin.blogs.create') }}" class="btn-topbar-new">
                    + New Post
                </a>
            </div>
        </header>

        <!-- Alerts -->
        <div class="admin-alerts">
            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                    <button class="alert-close" onclick="this.parentElement.remove()">✕</button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">
                    ❌ {{ session('error') }}
                    <button class="alert-close" onclick="this.parentElement.remove()">✕</button>
                </div>
            @endif
        </div>

        <div class="admin-content">
            @yield('content')
        </div>
    </div>
</div>

<!-- Sidebar overlay for mobile -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function() {
    $('#hamburger-admin').on('click', function() {
        $('#admin-sidebar').addClass('open');
        $('#sidebar-overlay').addClass('active');
    });
    $('#sidebar-close, #sidebar-overlay').on('click', function() {
        $('#admin-sidebar').removeClass('open');
        $('#sidebar-overlay').removeClass('active');
    });
});
</script>
@stack('scripts')
</body>
</html>
