<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(
            ['slug' => 'sistem-informasi-pemesanan-layanan'],
            [
                'title' => 'Sistem Informasi Pemesanan Layanan',
                'short_description' => 'Aplikasi web untuk mengelola layanan, request pelanggan, dan status pemesanan secara dinamis.',
                'description' => 'Project ini dibuat menggunakan Laravel, Livewire, Blade, Filament v3, MariaDB, dan Docker. Admin dapat mengelola data layanan, melihat permintaan pelanggan, serta memperbarui status progress project melalui panel backend.',
                'stack' => [
                    'Laravel',
                    'Filament v3',
                    'Livewire',
                    'Blade',
                    'MariaDB',
                    'Docker',
                ],
                'repository_url' => 'https://github.com/username/nama-repository',
                'demo_url' => null,
                'status' => 'in_progress',
                'progress' => 70,
                'featured' => true,
                'is_published' => true,
                'started_at' => now()->subMonths(2)->toDateString(),
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'website-portofolio-uts'],
            [
                'title' => 'Website Portofolio UTS',
                'short_description' => 'Website portofolio personal responsif dengan halaman Home, Project, Contact, dan backend admin.',
                'description' => 'Website ini dibuat untuk memenuhi project UTS Pemrograman Web. Data profil, project, dan pesan kontak dikelola secara dinamis melalui database dan Filament Admin Panel.',
                'stack' => [
                    'Laravel',
                    'Filament v3',
                    'Livewire',
                    'Blade',
                    'MariaDB',
                    'Docker',
                ],
                'repository_url' => 'https://github.com/username/portfolio-uts',
                'demo_url' => null,
                'status' => 'completed',
                'progress' => 100,
                'featured' => true,
                'is_published' => true,
                'started_at' => now()->subWeeks(1)->toDateString(),
            ]
        );
    }
}