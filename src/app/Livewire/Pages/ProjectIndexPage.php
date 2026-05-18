<?php

namespace App\Livewire\Pages;

use App\Models\Project;
use Livewire\Component;

class ProjectIndexPage extends Component
{
    public string $search = '';

    public string $status = 'all';

    public function render()
    {
        $projects = Project::query()
            ->where('is_published', true)
            ->when($this->search !== '', function ($query) {
                $query->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('short_description', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->get();

        return view('livewire.pages.project-index-page', [
            'projects' => $projects,
        ]);
    }
}