<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'name' => 'Dosen Penguji',
            'email' => 'dosen@example.com',
            'subject' => 'Review Website Portofolio',
            'message' => 'Website portofolio sudah terhubung dengan database dan panel admin.',
            'is_read' => false,
        ]);
    }
}