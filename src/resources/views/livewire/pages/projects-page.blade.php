<div>
    <section class="section">
        <div class="container">
            <span class="badge">Showcase / Project</span>

            <h1>Daftar Project</h1>

            <p class="hero-text">
                Halaman ini menampilkan daftar project yang pernah atau sedang dibuat secara dinamis dari database.
            </p>

            <div class="card" style="margin: 24px 0;">
                <div class="form-group" style="margin-bottom: 0;">
                    <label for="status" class="form-label">
                        Filter Status
                    </label>

                    <select id="status" wire:model.live="status" class="form-control">
                        <option value="all">Semua Status</option>
                        <option value="planning">Planning</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-3">
                @forelse ($projects as $project)
                    @php
                        $statusLabel = [
                            'planning' => 'Planning',
                            'in_progress' => 'In Progress',
                            'completed' => 'Completed',
                        ][$project->status] ?? $project->status;
                    @endphp

                    <div class="card project-card">
                        <div class="project-meta">
                            <span class="status status-{{ $project->status }}">
                                {{ $statusLabel }}
                            </span>

                            <strong>{{ $project->progress }}%</strong>
                        </div>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ $project->progress }}%;"></div>
                        </div>

                        <h3>{{ $project->title }}</h3>

                        <p>{{ $project->short_description }}</p>

                        <div class="stack-list">
                            @foreach (($project->stack ?? []) as $item)
                                <span class="stack-item">{{ $item }}</span>
                            @endforeach
                        </div>

                        <a href="{{ route('projects.show', $project) }}" class="btn">
                            Lihat Detail
                        </a>
                    </div>
                @empty
                    <div class="card">
                        <p>Belum ada project dengan status tersebut.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>