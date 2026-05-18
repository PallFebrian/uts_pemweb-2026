<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(
            ['slug' => 'web-jasa-suruh-berbasis-web'],
            [
                'title' => 'Web Jasa Suruh Berbasis Web',
                'short_description' => 'Aplikasi web untuk mempermudah pengguna dalam membuat permintaan jasa suruh secara online dengan proses yang cepat, praktis, dan terpantau.',
                'description' => 'Web Jasa Suruh Berbasis Web adalah aplikasi yang dibuat untuk membantu pengguna dalam melakukan pemesanan layanan jasa suruh secara online. Melalui sistem ini, pengguna dapat mengirim permintaan layanan, melihat informasi pesanan, dan memantau status progress secara dinamis. Admin dapat mengelola data project, memperbarui status pengerjaan, mengatur progress, serta menampilkan informasi pendukung seperti ERD melalui Filament Admin Panel.',
                'stack' => [
                    'Laravel',
                    'Filament v3',
                    'Livewire',
                    'Blade',
                    'MariaDB',
                    'Docker',
                ],
                'repository_url' => 'https://github.com/PallFebrian/project_pemweb-2026',
                'demo_url' => null,
                'erd_image' => 'images/ERD_Jasa_Suruh.png',
                'status' => 'in_progress',
                'progress' => 80,
                'featured' => true,
                'is_published' => true,
                'started_at' => now()->toDateString(),
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
                'erd_image' => null,
                'status' => 'completed',
                'progress' => 100,
                'featured' => true,
                'is_published' => true,
                'started_at' => now()->subWeeks(1)->toDateString(),
            ]
        );
    }
}