@php
    $name = $profile?->name ?? 'Belum Ada Nama';
    $firstName = explode(' ', trim($name))[0] ?? 'Developer';

    $rawTitle = $profile?->title ?? 'Web Developer';
    $title = trim(str_ireplace('Junior', '', $rawTitle));
    $title = $title !== '' ? $title : 'Web Developer';

    $bio = $profile?->bio ?? 'Bio belum diisi dari admin panel.';
    $stack = collect($profile?->stack ?? [])->filter()->values()->toArray();

    $skillCount = count($stack);
    $projectTotal = $projectCount ?? 0;
    $projectActive = $activeProjectCount ?? 0;
    $projectCompleted = $completedProjectCount ?? 0;
    $progressAverage = $averageProgress ?? 0;
@endphp

<div>
    <style>
        .hero {
            min-height: calc(100vh - 76px);
            display: flex;
            align-items: center;
            padding: 54px 0 38px;
            overflow: hidden;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr .92fr;
            align-items: center;
            gap: 54px;
        }

        .hero-left {
            position: relative;
            z-index: 2;
        }

        .kicker {
            width: fit-content;
            margin-bottom: 22px;
            padding: 9px 15px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            border-radius: 999px;
            background: rgba(124, 58, 237, .10);
            color: #344054;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        html.dark .kicker {
            color: #d1d5db;
            background: rgba(124, 58, 237, .18);
        }

        .kicker-dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: #22c55e;
            box-shadow: 0 0 0 5px rgba(34, 197, 94, .14);
        }

        .hero-title {
            margin: 0;
            max-width: 610px;
            font-size: clamp(44px, 5.2vw, 72px);
            line-height: 1.04;
            letter-spacing: -.07em;
            font-weight: 950;
            color: var(--text);
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary), var(--blue));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-desc {
            max-width: 560px;
            margin: 24px 0 0;
            color: var(--muted);
            font-size: 19px;
            line-height: 1.75;
        }

        .hero-actions {
            margin-top: 30px;
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .available-row {
            margin-top: 34px;
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .available-text {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        .mini-stack {
            display: flex;
            align-items: center;
            gap: 9px;
            flex-wrap: wrap;
        }

        .mini-stack-item {
            height: 38px;
            min-width: 38px;
            padding: 0 11px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: var(--surface-solid);
            color: var(--muted);
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 8px 18px rgba(17, 24, 39, .04);
        }

        .visual-wrap {
            position: relative;
            min-height: 440px;
        }

        .visual-glow {
            position: absolute;
            inset: 10px -50px auto auto;
            width: 520px;
            height: 390px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(124, 58, 237, .18), transparent 65%);
            filter: blur(4px);
        }

        .purple-loop {
            position: absolute;
            border-radius: 999px;
            border: 46px solid rgba(124, 58, 237, .82);
        }

        .loop-top {
            width: 260px;
            height: 260px;
            top: -10px;
            right: 8px;
            transform: rotate(28deg);
        }

        .loop-left {
            width: 245px;
            height: 245px;
            left: -8px;
            top: 180px;
            transform: rotate(-16deg);
        }

        .code-card {
            position: absolute;
            top: 74px;
            right: 28px;
            width: min(470px, 100%);
            min-height: 295px;
            border-radius: 24px;
            background: #0f172a;
            color: #d0d5dd;
            overflow: hidden;
            transform: rotate(-5deg);
            box-shadow: 0 35px 80px rgba(17, 24, 39, .24);
        }

        .code-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(124, 58, 237, .28), transparent 45%);
            pointer-events: none;
        }

        .code-top {
            position: relative;
            z-index: 2;
            height: 56px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #98a2b3;
            font-size: 13px;
            font-weight: 900;
        }

        .dots {
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 999px;
        }

        .red { background: #ef4444; }
        .yellow { background: #f59e0b; }
        .green { background: #22c55e; }

        .code-content {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 132px 1fr;
            gap: 16px;
            padding: 12px 20px 24px;
        }

        .code-menu {
            padding-right: 12px;
            border-right: 1px solid rgba(255, 255, 255, .08);
        }

        .code-menu div {
            padding: 9px 10px;
            border-radius: 10px;
            color: #98a2b3;
            font-size: 13px;
            font-weight: 800;
        }

        .code-menu .active {
            background: rgba(124, 58, 237, .22);
            color: white;
        }

        .code-lines {
            font-family: Consolas, Monaco, monospace;
            font-size: 13px;
            line-height: 1.9;
            white-space: nowrap;
        }

        .num {
            color: #667085;
            margin-right: 14px;
        }

        .purple { color: #c084fc; }
        .blue { color: #60a5fa; }
        .orange { color: #fbbf24; }

        .floating-stat {
            position: absolute;
            z-index: 5;
            right: 0;
            bottom: 18px;
            width: 190px;
            padding: 24px;
            border-radius: 24px;
            border: 1px solid var(--border);
            background: var(--surface-solid);
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
        }

        .floating-icon {
            width: 44px;
            height: 44px;
            margin-bottom: 14px;
            display: grid;
            place-items: center;
            border-radius: 999px;
            background: rgba(124, 58, 237, .11);
            color: var(--primary);
            font-weight: 900;
            font-size: 20px;
        }

        .floating-stat strong {
            display: block;
            font-size: 44px;
            line-height: 1;
            letter-spacing: -.06em;
            color: var(--text);
        }

        .floating-stat span {
            color: var(--muted);
            font-weight: 800;
        }

        .orb {
            position: absolute;
            z-index: 4;
            width: 42px;
            height: 42px;
            border-radius: 999px;
            box-shadow: 0 18px 34px rgba(17, 24, 39, .14);
        }

        .orb-blue {
            left: 145px;
            bottom: 75px;
            background: linear-gradient(135deg, #60a5fa, #2563eb);
        }

        .orb-yellow {
            left: 265px;
            bottom: 36px;
            background: linear-gradient(135deg, #fde047, #f59e0b);
        }

        .stats-section {
            padding: 0 0 64px;
        }

        .stats-card {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background: var(--surface-solid);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .stat-item {
            padding: 24px 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            border-right: 1px solid var(--border);
        }

        .stat-item:last-child {
            border-right: 0;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            flex: 0 0 auto;
            display: grid;
            place-items: center;
            border-radius: 999px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 22px;
        }

        .stat-value {
            margin: 0;
            font-size: 30px;
            line-height: 1;
            font-weight: 950;
            letter-spacing: -.05em;
            color: var(--text);
        }

        .stat-label {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        .section {
            padding: 60px 0;
            border-top: 1px solid var(--border);
        }

        .section-title {
            margin-bottom: 26px;
        }

        .section-title small {
            display: block;
            margin-bottom: 8px;
            color: var(--primary);
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .section-title h2 {
            max-width: 680px;
            margin: 0;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.15;
            letter-spacing: -.05em;
            color: var(--text);
        }

        .section-title p {
            max-width: 720px;
            margin: 12px 0 0;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.7;
        }

        .two-col {
            display: grid;
            grid-template-columns: .95fr 1.05fr;
            gap: 22px;
        }

        .clean-card {
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: var(--surface-solid);
            box-shadow: 0 12px 28px rgba(17, 24, 39, .04);
        }

        .skill-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .skill-item {
            min-height: 66px;
            padding: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface-solid);
            font-weight: 900;
            color: var(--text);
        }

        .skill-logo {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 12px;
            font-weight: 950;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .project-card {
            overflow: hidden;
            background: var(--surface-solid);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 12px 28px rgba(17, 24, 39, .04);
        }

        .project-preview {
            height: 160px;
            padding: 18px;
            background:
                radial-gradient(circle at top right, rgba(124, 58, 237, .32), transparent 42%),
                linear-gradient(135deg, #111827, #1f2937);
        }

        .browser-mock {
            height: 100%;
            padding: 14px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, .16);
            background: rgba(255, 255, 255, .08);
        }

        .mock-line {
            height: 10px;
            margin-bottom: 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .25);
        }

        .mock-box {
            height: 30px;
            margin-bottom: 9px;
            border-radius: 9px;
            background: rgba(255, 255, 255, .13);
        }

        .project-body {
            padding: 20px;
        }

        .project-meta {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .status-pill {
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 12px;
            font-weight: 900;
        }

        .progress-text {
            font-size: 13px;
            font-weight: 950;
            color: var(--text);
        }

        .progress-track {
            height: 8px;
            margin-bottom: 14px;
            border-radius: 999px;
            overflow: hidden;
            background: #eef2f7;
        }

        html.dark .progress-track {
            background: #1f2937;
        }

        .progress-fill {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--primary), var(--blue));
        }

        .project-body h3 {
            margin: 0;
            font-size: 20px;
            letter-spacing: -.035em;
            color: var(--text);
        }

        .project-body p {
            margin: 10px 0 16px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
        }

        .tag-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 18px;
        }

        .tag {
            padding: 6px 9px;
            border-radius: 999px;
            background: #f2f4f7;
            color: #475467;
            font-size: 12px;
            font-weight: 800;
        }

        html.dark .tag {
            background: #1f2937;
            color: #d1d5db;
        }

        .detail-link {
            color: var(--primary);
            font-size: 14px;
            font-weight: 950;
        }

        .cta {
            margin-top: 28px;
            padding: 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
            background: var(--text);
            color: white;
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        .cta h2 {
            margin: 0 0 6px;
            font-size: 32px;
            letter-spacing: -.05em;
        }

        .cta p {
            margin: 0;
            color: rgba(255, 255, 255, .72);
        }

        .cta .btn {
            background: white;
            color: #111827;
        }

        @media (max-width: 1000px) {
            .hero {
                min-height: auto;
            }

            .hero-grid,
            .two-col {
                grid-template-columns: 1fr;
            }

            .visual-wrap {
                min-height: 430px;
            }

            .code-card {
                right: 80px;
            }

            .stats-card {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-item {
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .stat-item:nth-child(3),
            .stat-item:nth-child(4) {
                border-bottom: 0;
            }

            .projects-grid,
            .skill-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .hero {
                padding-top: 36px;
            }

            .hero-title {
                font-size: 42px;
            }

            .hero-desc {
                font-size: 16px;
            }

            .hero-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .visual-wrap {
                min-height: auto;
                padding-top: 28px;
            }

            .code-card {
                position: relative;
                top: auto;
                right: auto;
                width: 100%;
                transform: none;
            }

            .code-content {
                grid-template-columns: 1fr;
            }

            .code-menu {
                display: none;
            }

            .purple-loop,
            .orb {
                display: none;
            }

            .floating-stat {
                position: relative;
                right: auto;
                bottom: auto;
                width: 100%;
                margin-top: 16px;
            }

            .stats-card,
            .projects-grid,
            .skill-grid {
                grid-template-columns: 1fr;
            }

            .stat-item,
            .stat-item:nth-child(3),
            .stat-item:nth-child(4) {
                border-bottom: 1px solid var(--border);
            }

            .stat-item:last-child {
                border-bottom: 0;
            }

            .cta {
                align-items: stretch;
                flex-direction: column;
            }
        }
    </style>

    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-left">
                    <div class="kicker">
                        <span class="kicker-dot"></span>
                        Hai, Saya {{ $firstName }} 👋
                    </div>

                    <h1 class="hero-title">
                        Saya {{ $name }} <br>
                        <span class="gradient-text">{{ $title }}</span>.
                    </h1>

                    <p class="hero-desc">
                        {{ $bio }}
                    </p>

                    <div class="hero-actions">
                        <a href="{{ route('projects.index') }}" class="btn btn-dark">
                            Lihat Proyek Saya
                            <span>→</span>
                        </a>

                        <a href="#tentang" class="btn btn-light">
                            Tentang Saya
                        </a>
                    </div>

                    <div class="available-row">
                        <div class="available-text">
                            <span class="kicker-dot"></span>
                            {{ $profile?->location ? 'Lokasi: ' . $profile->location : 'Data profil dari database' }}
                        </div>

                        <div class="mini-stack">
                            @forelse (array_slice($stack, 0, 5) as $item)
                                <span class="mini-stack-item">
                                    {{ strtoupper(substr($item, 0, 2)) }}
                                </span>
                            @empty
                                <span class="mini-stack-item">DB</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="visual-wrap">
                    <div class="visual-glow"></div>

                    <div class="purple-loop loop-top"></div>
                    <div class="purple-loop loop-left"></div>

                    <div class="code-card">
                        <div class="code-top">
                            <div class="dots">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>

                            <span>portfolio.blade.php</span>
                        </div>

                        <div class="code-content">
                            <div class="code-menu">
                                <div>📁 app</div>
                                <div>📁 livewire</div>
                                <div class="active">⚡ home</div>
                                <div>🎨 style</div>
                            </div>

                            <div class="code-lines">
                                <div><span class="num">1</span><span class="purple">Profile</span>::active()</div>
                                <div><span class="num">2</span>Nama: {{ $name }}</div>
                                <div><span class="num">3</span>Title: <span class="blue">{{ $title }}</span></div>
                                <div><span class="num">4</span>Skill: {{ $skillCount }}</div>
                                <div><span class="num">5</span>Project: {{ $projectTotal }}</div>
                                <div><span class="num">6</span>Progress: {{ $progressAverage }}%</div>
                                <div><span class="num">7</span><span class="orange">Database Content</span></div>
                            </div>
                        </div>
                    </div>

                    <span class="orb orb-blue"></span>
                    <span class="orb orb-yellow"></span>

                    <div class="floating-stat">
                        <div class="floating-icon">↗</div>
                        <strong>{{ $projectCompleted }}+</strong>
                        <span>Project Selesai</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="stats-card">
                <div class="stat-item">
                    <div class="stat-icon">📁</div>
                    <div>
                        <h3 class="stat-value">{{ $projectTotal }}+</h3>
                        <p class="stat-label">Project Database</p>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon">⚡</div>
                    <div>
                        <h3 class="stat-value">{{ $projectActive }}+</h3>
                        <p class="stat-label">Project Aktif</p>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon">🧩</div>
                    <div>
                        <h3 class="stat-value">{{ $skillCount }}+</h3>
                        <p class="stat-label">Stack Keahlian</p>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon">📊</div>
                    <div>
                        <h3 class="stat-value">{{ $progressAverage }}%</h3>
                        <p class="stat-label">Rata-rata Progress</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="section">
        <div class="container">
            <div class="two-col">
                <div class="clean-card">
                    <div class="section-title">
                        <small>Tentang Saya</small>

                        <h2>
                            {{ $title }}
                        </h2>

                        <p>
                            {{ $bio }}
                        </p>
                    </div>
                </div>

                <div id="keahlian" class="clean-card">
                    <div class="section-title">
                        <small>Keahlian</small>

                        <h2>
                            Stack {{ $firstName }}
                        </h2>
                    </div>

                    <div class="skill-grid">
                        @forelse ($stack as $item)
                            <div class="skill-item">
                                <span class="skill-logo">{{ strtoupper(substr($item, 0, 2)) }}</span>
                                <span>{{ $item }}</span>
                            </div>
                        @empty
                            <div class="skill-item">
                                <span class="skill-logo">DB</span>
                                <span>Isi stack dari Admin Panel</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="padding-top: 40px;">
        <div class="container">
            <div class="section-title">
                <small>Showcase Project</small>

                <h2>
                    Project unggulan dari database.
                </h2>

                <p>
                    Semua data project di bawah ini berasal dari tabel projects dan bisa diubah melalui Filament Admin Panel.
                </p>
            </div>

            <div class="projects-grid">
                @forelse ($featuredProjects as $project)
                    @php
                        $statusLabel = [
                            'planning' => 'Planning',
                            'in_progress' => 'In Progress',
                            'completed' => 'Completed',
                        ][$project->status] ?? $project->status;
                    @endphp

                    <article class="project-card">
                        <div class="project-preview">
                            <div class="browser-mock">
                                <div class="mock-line" style="width: 52%;"></div>
                                <div class="mock-box"></div>
                                <div class="mock-box" style="width: 78%;"></div>
                                <div class="mock-box" style="width: 62%;"></div>
                            </div>
                        </div>

                        <div class="project-body">
                            <div class="project-meta">
                                <span class="status-pill">{{ $statusLabel }}</span>
                                <span class="progress-text">{{ $project->progress }}%</span>
                            </div>

                            <div class="progress-track">
                                <div class="progress-fill" style="width: {{ $project->progress }}%;"></div>
                            </div>

                            <h3>{{ $project->title }}</h3>

                            <p>{{ $project->short_description }}</p>

                            <div class="tag-row">
                                @forelse (($project->stack ?? []) as $item)
                                    <span class="tag">{{ $item }}</span>
                                @empty
                                    <span class="tag">Belum ada stack</span>
                                @endforelse
                            </div>

                            <a href="{{ route('projects.show', $project) }}" class="detail-link">
                                Lihat Detail →
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="clean-card">
                        <h3>Project belum tersedia.</h3>
                        <p>Tambahkan project dari Filament Admin Panel.</p>
                    </div>
                @endforelse
            </div>

            <div class="cta">
                <div>
                    <h2>{{ $profile?->email ?? 'Kontak belum diisi' }}</h2>
                    <p>{{ $profile?->phone ?? 'Nomor telepon belum diisi dari admin panel.' }}</p>
                </div>

                <a href="{{ route('contact') }}" class="btn">
                    Kirim Pesan →
                </a>
            </div>
        </div>
    </section>
</div>