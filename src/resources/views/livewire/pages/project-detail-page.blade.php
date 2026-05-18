@php
    $statusLabel = [
        'planning' => 'Planning',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
    ][$project->status] ?? $project->status;
@endphp

<div>
    <section class="section">
        <div class="container">
            <a href="{{ route('projects.index') }}" class="btn btn-outline">
                Kembali ke Project
            </a>

            <div class="card" style="margin-top: 24px;">
                <span class="badge">Detail Project</span>

                <h1>{{ $project->title }}</h1>

                <div class="project-meta" style="margin-bottom: 16px;">
                    <span class="status status-{{ $project->status }}">
                        {{ $statusLabel }}
                    </span>

                    <strong>Progress: {{ $project->progress }}%</strong>
                </div>

                <div class="progress" style="margin-bottom: 24px;">
                    <div class="progress-bar" style="width: {{ $project->progress }}%;"></div>
                </div>

                <p class="hero-text">
                    {{ $project->short_description }}
                </p>

                <div style="margin-top: 24px;">
                    <h2>Deskripsi</h2>
                    <p>{{ $project->description }}</p>
                </div>

                <div style="margin-top: 24px;">
                    <h2>Tech Stack</h2>

                    <div class="stack-list">
                        @foreach (($project->stack ?? []) as $item)
                            <span class="stack-item">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="actions">
                    @if ($project->repository_url)
                        <a href="{{ $project->repository_url }}" target="_blank" class="btn">
                            Repository GitHub
                        </a>
                    @endif

                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-outline">
                            Live Demo
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>