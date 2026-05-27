<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – JobYaari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="login-body">
    <div class="login-bg">
        <div class="login-orb login-orb-1"></div>
        <div class="login-orb login-orb-2"></div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">📋 Job<span>Yaari</span></div>
                <h1 class="login-title">Welcome Back</h1>
                <p class="login-subtitle">Sign in to manage your blog posts</p>
            </div>

            @if($errors->any())
                <div class="login-error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('error'))
                <div class="login-error">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="login-form">
                @csrf
                <div class="form-field">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrap">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input type="email" id="email" name="email" class="form-input"
                            placeholder="admin@jobyaari.com"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="form-field">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrap">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input type="password" id="password" name="password" class="form-input"
                            placeholder="••••••••" required>
                        <button type="button" class="toggle-password" id="toggle-password" aria-label="Toggle password">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Remember me</span>
                    </label>
                </div>

                <button type="submit" class="btn-login" id="login-btn">
                    <span class="btn-login-text">Sign In to Dashboard</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </button>
            </form>

            <div class="login-hint">
                <p>Default credentials: <code>admin@jobyaari.com</code> / <code>Admin@123</code></p>
            </div>

            <div class="login-back">
                <a href="{{ route('blogs.index') }}">← Back to Website</a>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('toggle-password').addEventListener('click', function() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    });
    </script>
</body>
</html>
