<?php

namespace App\Livewire\Pages;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ProjectsPage extends Component
{
    public string $status = 'all';

    public function render()
    {
        $projects = Project::query()
            ->published()
            ->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->get();

        return view('livewire.pages.projects-page', [
            'projects' => $projects,
        ]);
    }
}