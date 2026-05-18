<div>
    <style>
        .page-hero {
            padding: 70px 0 46px;
            border-bottom: 1px solid var(--border);
        }

        .page-kicker {
            width: fit-content;
            margin-bottom: 18px;
            padding: 9px 15px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            border-radius: 999px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .page-title {
            max-width: 760px;
            margin: 0;
            font-size: clamp(42px, 5vw, 68px);
            line-height: 1.05;
            letter-spacing: -.07em;
            color: var(--text);
        }

        .page-desc {
            max-width: 680px;
            margin: 20px 0 0;
            color: var(--muted);
            font-size: 18px;
            line-height: 1.7;
        }

        .filter-section {
            padding: 34px 0 28px;
        }

        .filter-card {
            padding: 18px;
            display: grid;
            grid-template-columns: 1fr 230px;
            gap: 14px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: var(--surface-solid);
            box-shadow: var(--shadow-soft);
        }

        .filter-input,
        .filter-select {
            width: 100%;
            min-height: 52px;
            padding: 0 16px;
            border: 1px solid var(--border);
            border-radius: 14px;
            outline: none;
            background: var(--surface-solid);
            color: var(--text);
            font-weight: 700;
        }

        .filter-input::placeholder {
            color: var(--muted);
        }

        .projects-section {
            padding: 16px 0 72px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .project-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--surface-solid);
            box-shadow: var(--shadow-soft);
            transition: .2s ease;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
        }

        .project-preview {
            height: 180px;
            padding: 18px;
            background:
                radial-gradient(circle at top right, rgba(124, 58, 237, .38), transparent 42%),
                linear-gradient(135deg, #111827, #1f2937);
        }

        .browser-mock {
            height: 100%;
            padding: 14px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, .16);
            background: rgba(255, 255, 255, .08);
        }

        .mock-line {
            height: 10px;
            margin-bottom: 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .26);
        }

        .mock-box {
            height: 31px;
            margin-bottom: 9px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .13);
        }

        .project-body {
            padding: 22px;
        }

        .project-meta {
            margin-bottom: 13px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .status-pill {
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(124, 58, 237, .10);
            color: var(--primary);
            font-size: 12px;
            font-weight: 900;
        }

        .progress-text {
            color: var(--text);
            font-size: 13px;
            font-weight: 950;
        }

        .progress-track {
            height: 8px;
            margin-bottom: 16px;
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

        .project-title {
            margin: 0;
            color: var(--text);
            font-size: 22px;
            line-height: 1.25;
            letter-spacing: -.04em;
        }

        .project-desc {
            margin: 11px 0 18px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .tag-row {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag {
            padding: 6px 10px;
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

        .empty-card {
            grid-column: 1 / -1;
            padding: 34px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: var(--surface-solid);
            color: var(--muted);
            text-align: center;
            box-shadow: var(--shadow-soft);
        }

        .empty-card h3 {
            margin: 0 0 8px;
            color: var(--text);
            font-size: 24px;
            letter-spacing: -.04em;
        }

        @media (max-width: 1000px) {
            .projects-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .filter-card,
            .projects-grid {
                grid-template-columns: 1fr;
            }

            .page-hero {
                padding-top: 48px;
            }
        }
    </style>

    <section class="page-hero">
        <div class="container">
            <div class="page-kicker">Showcase Project</div>

            <h1 class="page-title">
                Project yang pernah dan sedang saya kerjakan.
            </h1>

            <p class="page-desc">
                Semua data project ini dikelola secara dinamis melalui Filament Admin Panel.
                Status dan progress project bisa diperbarui langsung dari backend.
            </p>
        </div>
    </section>

    <section class="filter-section">
        <div class="container">
            <div class="filter-card">
                <input
                    type="text"
                    wire:model.live.debounce.400ms="search"
                    class="filter-input"
                    placeholder="Cari project..."
                >

                <select wire:model.live="status" class="filter-select">
                    <option value="all">Semua Status</option>
                    <option value="planning">Planning</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </div>
    </section>

    <section class="projects-section">
        <div class="container">
            <div class="projects-grid">
                @forelse ($projects as $project)
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
                                <div class="mock-line" style="width: 48%;"></div>
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

                            <h2 class="project-title">{{ $project->title }}</h2>

                            <p class="project-desc">
                                {{ $project->short_description }}
                            </p>

                            <div class="tag-row">
                                @foreach (($project->stack ?? []) as $item)
                                    <span class="tag">{{ $item }}</span>
                                @endforeach
                            </div>

                            <a href="{{ route('projects.show', $project) }}" class="detail-link">
                                Lihat Detail →
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="empty-card">
                        <h3>Project tidak ditemukan.</h3>
                        <p>Coba ubah keyword pencarian atau filter status.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>