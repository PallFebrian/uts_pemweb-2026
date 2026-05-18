<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['email' => 'pallfebrian9@gmail.com'],
            [
                'name' => 'Naufal Febrian',
                'title' => 'Web Developer',
                'photo_url' => null,
                'email' => 'pallfebrian9@gmail.com',
                'phone' => '0813-8518-5263',
                'location' => 'Tangerang, Indonesia',
                'bio' => 'Saya adalah mahasiswa Teknik Informatika yang fokus membangun aplikasi web menggunakan Laravel, Livewire, Blade, Filament, MariaDB, dan Docker.',
                'stack' => [
                    'Laravel',
                    'Filament v3',
                    'Livewire',
                    'Blade',
                    'MariaDB',
                    'Docker',
                ],
                'github_url' => 'https://github.com/PallFebrian',
                'linkedin_url' => null,
                'website_url' => null,
                'is_active' => true,
            ]
        );
    }
}