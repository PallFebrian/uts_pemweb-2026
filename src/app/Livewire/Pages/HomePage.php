<?php

namespace App\Livewire\Pages;

use App\Models\Profile;
use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class HomePage extends Component
{
    public function render()
    {
        $profile = Profile::query()
            ->where('is_active', true)
            ->first();

        $featuredProjects = Project::query()
            ->published()
            ->featured()
            ->latest()
            ->limit(3)
            ->get();

        $publishedProjectsQuery = Project::query()->published();

        return view('livewire.pages.home-page', [
            'profile' => $profile,
            'featuredProjects' => $featuredProjects,
            'projectCount' => (clone $publishedProjectsQuery)->count(),
            'activeProjectCount' => (clone $publishedProjectsQuery)->where('status', 'in_progress')->count(),
            'completedProjectCount' => (clone $publishedProjectsQuery)->where('status', 'completed')->count(),
            'averageProgress' => (int) round((clone $publishedProjectsQuery)->avg('progress') ?? 0),
        ]);
    }
}