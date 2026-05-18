<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'photo_url',
        'email',
        'phone',
        'location',
        'bio',
        'stack',
        'github_url',
        'linkedin_url',
        'website_url',
        'is_active',
    ];

    protected $casts = [
        'stack' => 'array',
        'is_active' => 'boolean',
    ];
}