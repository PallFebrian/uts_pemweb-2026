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
        return view('livewire.pages.home-page', [
            'profile' => Profile::query()
                ->where('is_active', true)
                ->first(),

            'featuredProjects' => Project::query()
                ->published()
                ->featured()
                ->latest()
                ->limit(3)
                ->get(),
        ]);
    }
}