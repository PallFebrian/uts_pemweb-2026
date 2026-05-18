<?php

namespace App\Livewire\Pages;

use App\Models\Project;
use Livewire\Component;

class ProjectShowPage extends Component
{
    public Project $project;

    public function mount(Project $project): void
    {
        abort_unless($project->is_published, 404);

        $this->project = $project;
    }

    public function render()
    {
        $relatedProjects = Project::query()
            ->where('is_published', true)
            ->whereKeyNot($this->project->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('livewire.pages.project-show-page', [
            'relatedProjects' => $relatedProjects,
        ]);
    }
}