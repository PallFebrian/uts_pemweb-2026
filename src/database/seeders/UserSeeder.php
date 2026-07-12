<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Cari akun admin lama atau akun admin baru.
        $admin = User::query()
            ->whereIn('email', [
                'admin@admin.com',
                'pallfebrian9@gmail.com',
            ])
            ->first();

        // Buat user baru kalau belum ada.
        if (! $admin) {
            $admin = new User();
        }

        $admin->name = 'Muhammad Naufal Febrian';
        $admin->email = 'pallfebrian9@gmail.com';
        $admin->password = Hash::make('UasNaufal2026!');
        $admin->save();

        // Pastikan role admin tidak dobel.
        $admin->syncRoles(['super_admin']);

        // Akun user biasa.
        $user = User::updateOrCreate(
            [
                'email' => 'user@admin.com',
            ],
            [
                'name' => 'User Account',
                'password' => Hash::make('password'),
            ]
        );

        $user->syncRoles(['user']);
    }
}