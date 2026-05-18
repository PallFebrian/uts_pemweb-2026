<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'stack',
        'repository_url',
        'demo_url',
        'erd_image',
        'status',
        'progress',
        'featured',
        'is_published',
        'started_at',
    ];

    protected $casts = [
        'stack' => 'array',
        'progress' => 'integer',
        'featured' => 'boolean',
        'is_published' => 'boolean',
        'started_at' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function (Project $project) {
            if ($project->isDirty('title') && blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }
}