<div>
    <style>
        .detail-hero {
            padding: 70px 0 42px;
            border-bottom: 1px solid var(--border);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
            color: var(--primary);
            font-size: 14px;
            font-weight: 950;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr .9fr;
            align-items: center;
            gap: 52px;
        }

        .detail-title {
            margin: 0;
            max-width: 720px;
            color: var(--text);
            font-size: clamp(42px, 5vw, 68px);
            line-height: 1.05;
            letter-spacing: -.07em;
        }

        .detail-desc {
            max-width: 650px;
            margin: 20px 0 0;
            color: var(--muted);
            font-size: 18px;
            line-height: 1.75;
        }

        .detail-actions {
            margin-top: 28px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .detail-visual {
            position: relative;
            min-height: 360px;
        }

        .detail-loop {
            position: absolute;
            width: 260px;
            height: 260px;
            right: 10px;
            top: 10px;
            border: 48px solid rgba(124, 58, 237, .78);
            border-radius: 999px;
        }

        .detail-code-card {
            position: absolute;
            right: 28px;
            top: 74px;
            width: min(470px, 100%);
            min-height: 260px;
            padding: 22px;
            border-radius: 24px;
            background: #0f172a;
            box-shadow: 0 35px 80px rgba(17, 24, 39, .24);
            transform: rotate(-4deg);
            overflow: hidden;
        }

        .detail-code-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(124, 58, 237, .30), transparent 45%);
            pointer-events: none;
        }

        .code-top {
            position: relative;
            z-index: 2;
            margin-bottom: 20px;
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

        .code-line {
            position: relative;
            z-index: 2;
            margin-bottom: 12px;
            height: 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .14);
        }

        .content-section {
            padding: 60px 0;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 28px;
            align-items: flex-start;
        }

        .content-card,
        .side-card {
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--surface-solid);
            box-shadow: var(--shadow-soft);
        }

        .content-card {
            padding: 32px;
        }

        .content-card h2,
        .side-card h3 {
            margin: 0 0 16px;
            color: var(--text);
            letter-spacing: -.04em;
        }

        .content-card p {
            margin: 0;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .side-card {
            padding: 24px;
        }

        .info-list {
            display: grid;
            gap: 16px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }

        .info-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .info-label {
            color: var(--muted);
            font-weight: 800;
        }

        .info-value {
            color: var(--text);
            font-weight: 950;
            text-align: right;
        }

        .progress-track {
            height: 10px;
            margin: 14px 0 20px;
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

        .tag-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag {
            padding: 7px 10px;
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

        .related-section {
            padding: 0 0 70px;
        }

        .related-title {
            margin: 0 0 22px;
            color: var(--text);
            font-size: 34px;
            letter-spacing: -.05em;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .related-card {
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: var(--surface-solid);
            box-shadow: var(--shadow-soft);
        }

        .related-card h3 {
            margin: 0 0 10px;
            color: var(--text);
            font-size: 20px;
            letter-spacing: -.04em;
        }

        .related-card p {
            margin: 0 0 16px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
        }

        .related-card a {
            color: var(--primary);
            font-size: 14px;
            font-weight: 950;
        }

        @media (max-width: 1000px) {
            .detail-grid,
            .content-grid {
                grid-template-columns: 1fr;
            }

            .detail-code-card {
                left: 0;
                right: auto;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .detail-hero {
                padding-top: 46px;
            }

            .detail-visual {
                min-height: auto;
                padding-top: 28px;
            }

            .detail-loop {
                display: none;
            }

            .detail-code-card {
                position: relative;
                top: auto;
                right: auto;
                width: 100%;
                transform: none;
            }

            .content-card,
            .side-card {
                padding: 22px;
            }
        }
    </style>

    @php
        $statusLabel = [
            'planning' => 'Planning',
            'in_progress' => 'In Progress',
            'completed' => 'Completed',
        ][$project->status] ?? $project->status;
    @endphp

    <section class="detail-hero">
        <div class="container">
            <a href="{{ route('projects.index') }}" class="back-link">
                ← Kembali ke Project
            </a>

            <div class="detail-grid">
                <div>
                    <h1 class="detail-title">
                        {{ $project->title }}
                    </h1>

                    <p class="detail-desc">
                        {{ $project->short_description }}
                    </p>

                    <div class="detail-actions">
                        @if ($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-dark">
                                Lihat Demo ↗
                            </a>
                        @endif

                        @if ($project->repository_url)
                            <a href="{{ $project->repository_url }}" target="_blank" class="btn btn-light">
                                Repository
                            </a>
                        @endif
                    </div>
                </div>

                <div class="detail-visual">
                    <div class="detail-loop"></div>

                    <div class="detail-code-card">
                        <div class="code-top">
                            <div class="dots">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>

                            <span>project-detail.blade.php</span>
                        </div>

                        <div class="code-line" style="width: 72%;"></div>
                        <div class="code-line" style="width: 92%;"></div>
                        <div class="code-line" style="width: 55%;"></div>
                        <div class="code-line" style="width: 80%;"></div>
                        <div class="code-line" style="width: 66%;"></div>
                        <div class="code-line" style="width: 88%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="content-grid">
                <article class="content-card">
                    <h2>Deskripsi Project</h2>

                    <p>
                        {{ $project->description ?: $project->short_description }}
                    </p>
                </article>

                <aside class="side-card">
                    <h3>Informasi Project</h3>

                    <div class="info-list">
                        <div>
                            <div class="info-item">
                                <span class="info-label">Status</span>
                                <span class="info-value">{{ $statusLabel }}</span>
                            </div>

                            <div class="info-item">
                                <span class="info-label">Progress</span>
                                <span class="info-value">{{ $project->progress }}%</span>
                            </div>

                            <div class="progress-track">
                                <div class="progress-fill" style="width: {{ $project->progress }}%;"></div>
                            </div>

                            <div class="info-item">
                                <span class="info-label">Mulai</span>
                                <span class="info-value">
                                    {{ $project->started_at ? $project->started_at->format('d M Y') : '-' }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <h3>Tech Stack</h3>

                            <div class="tag-row">
                                @forelse (($project->stack ?? []) as $item)
                                    <span class="tag">{{ $item }}</span>
                                @empty
                                    <span class="tag">Laravel</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @if ($relatedProjects->isNotEmpty())
        <section class="related-section">
            <div class="container">
                <h2 class="related-title">Project lainnya.</h2>

                <div class="related-grid">
                    @foreach ($relatedProjects as $related)
                        <article class="related-card">
                            <h3>{{ $related->title }}</h3>
                            <p>{{ $related->short_description }}</p>

                            <a href="{{ route('projects.show', $related) }}">
                                Lihat Detail →
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>