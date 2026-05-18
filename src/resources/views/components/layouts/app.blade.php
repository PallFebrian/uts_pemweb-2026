<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Portfolio') }}</title>

    @php
        $siteProfile = \App\Models\Profile::query()
            ->where('is_active', true)
            ->first();

        $siteName = $siteProfile?->name ?? 'Portfolio';
        $words = collect(explode(' ', trim($siteName)))->filter()->values();

        $initials = $words->count() >= 2
            ? strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1))
            : strtoupper(substr($siteName, 0, 2));
    @endphp

    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <style>
        :root {
            --primary: #7c3aed;
            --primary-dark: #5b21b6;
            --primary-soft: #f3edff;
            --blue: #2563eb;

            --bg-page:
                radial-gradient(circle at 8% 8%, rgba(124, 58, 237, .10), transparent 26%),
                radial-gradient(circle at 90% 14%, rgba(37, 99, 235, .10), transparent 28%),
                #ffffff;

            --text: #111827;
            --muted: #667085;
            --border: #e5e7eb;
            --surface: rgba(255, 255, 255, .82);
            --surface-solid: #ffffff;
            --header-bg: rgba(255, 255, 255, .82);
            --nav-text: #475467;
            --shadow: 0 20px 50px rgba(17, 24, 39, .08);
            --shadow-soft: 0 12px 28px rgba(17, 24, 39, .05);
            --dark-btn: #111827;
            --dark-btn-text: #ffffff;
        }

        html.dark {
            --bg-page:
                radial-gradient(circle at 8% 8%, rgba(124, 58, 237, .18), transparent 28%),
                radial-gradient(circle at 90% 14%, rgba(37, 99, 235, .14), transparent 30%),
                #0b1020;

            --text: #f3f4f6;
            --muted: #9ca3af;
            --border: #243041;
            --surface: rgba(17, 24, 39, .78);
            --surface-solid: #111827;
            --header-bg: rgba(11, 16, 32, .82);
            --nav-text: #d1d5db;
            --shadow: 0 24px 60px rgba(0, 0, 0, .35);
            --shadow-soft: 0 14px 32px rgba(0, 0, 0, .22);
            --dark-btn: #f3f4f6;
            --dark-btn-text: #111827;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: var(--bg-page);
            transition: background .25s ease, color .25s ease;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        .site-header {
            width: 100%;
            position: sticky;
            top: 0;
            z-index: 50;
            background: var(--header-bg);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(229, 231, 235, .12);
        }

        .navbar {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 21px;
            font-weight: 900;
            letter-spacing: -.04em;
            color: var(--text);
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            border: 3px solid var(--text);
            display: grid;
            place-items: center;
            font-size: 16px;
            font-weight: 900;
            letter-spacing: -.05em;
            background: var(--surface-solid);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-menu a {
            position: relative;
            padding: 10px 16px;
            color: var(--nav-text);
            font-size: 15px;
            font-weight: 800;
            border-radius: 999px;
            transition: .2s ease;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--primary);
            background: var(--primary-soft);
        }

        .nav-menu a.active::after {
            content: "";
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: -16px;
            height: 3px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--primary), var(--blue));
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .theme-toggle {
            width: 46px;
            height: 46px;
            border: 1px solid var(--border);
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: var(--surface-solid);
            color: var(--text);
            cursor: pointer;
            box-shadow: var(--shadow-soft);
            transition: .2s ease;
        }

        .theme-toggle:hover {
            transform: translateY(-2px);
        }

        .nav-action {
            min-height: 48px;
            padding: 0 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--dark-btn);
            color: var(--dark-btn-text);
            font-size: 15px;
            font-weight: 900;
            box-shadow: 0 14px 26px rgba(17, 24, 39, .16);
        }

        .btn {
            min-height: 48px;
            padding: 0 22px;
            border: 0;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 900;
            transition: .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-dark {
            background: var(--dark-btn);
            color: var(--dark-btn-text);
            box-shadow: 0 14px 26px rgba(17, 24, 39, .14);
        }

        .btn-light {
            background: var(--surface-solid);
            color: var(--text);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-soft);
        }

        .footer {
            padding: 28px 0;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 14px;
            background: var(--surface-solid);
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer strong {
            color: var(--text);
        }

        @media (max-width: 900px) {
            .navbar {
                min-height: auto;
                padding: 16px 0;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-menu {
                width: 100%;
                overflow-x: auto;
                padding-bottom: 6px;
            }

            .nav-right {
                width: 100%;
            }

            .theme-toggle,
            .nav-action {
                flex: 1;
            }
        }
    </style>

    @livewireStyles
</head>
<body>
    <header class="site-header">
        <nav class="container navbar">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark">{{ $initials }}</span>
                <span>{{ $siteName }}</span>
            </a>

            <div class="nav-menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('home') }}#tentang">Tentang</a>
                <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">Proyek</a>
                <a href="{{ route('home') }}#keahlian">Keahlian</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
            </div>

            <div class="nav-right">
                <button type="button" id="themeToggle" class="theme-toggle" aria-label="Toggle theme">
                    <span id="themeIcon">🌙</span>
                </button>

                <a href="{{ route('contact') }}" class="nav-action">
                    Hubungi Saya
                </a>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <strong>{{ $siteName }}</strong>
            <span>© {{ date('Y') }} Portfolio UTS Pemrograman Web.</span>
        </div>
    </footer>

    <script>
        (function () {
            const html = document.documentElement;
            const toggle = document.getElementById('themeToggle');
            const icon = document.getElementById('themeIcon');

            function updateIcon() {
                icon.textContent = html.classList.contains('dark') ? '☀️' : '🌙';
            }

            updateIcon();

            toggle.addEventListener('click', function () {
                html.classList.toggle('dark');

                if (html.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }

                updateIcon();
            });
        })();
    </script>

    @livewireScripts
</body>
</html>