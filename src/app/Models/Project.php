<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'stack',
        'repository_url',
        'demo_url',
        'status',
        'progress',
        'featured',
        'is_published',
        'started_at',
    ];

    protected $casts = [
        'stack' => 'array',
        'featured' => 'boolean',
        'is_published' => 'boolean',
        'started_at' => 'date',
    ];

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (blank($project->slug) && filled($project->title)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}