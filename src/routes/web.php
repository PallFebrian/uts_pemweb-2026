<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\Response;
use App\Livewire\Pages\ContactPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\ProjectDetailPage;
use App\Livewire\Pages\ProjectsPage;
use App\Livewire\Pages\ProjectIndexPage;
use App\Livewire\Pages\ProjectShowPage;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
Route::get('/', HomePage::class)->name('home');
Route::get('/projects', ProjectIndexPage::class)->name('projects.index');
Route::get('/projects/{project:slug}', ProjectShowPage::class)->name('projects.show');
Route::get('/contact', ContactPage::class)->name('contact');