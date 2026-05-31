Nama  : Muhammad Naufal Febrian
NIM   : 20240801068
Email : pallfebrian9@gmail.com

# Website Portofolio UTS

Website portofolio personal berbasis web yang dibuat untuk memenuhi project UTS mata kuliah Pemrograman Web.

Project ini dibuat menggunakan Laravel, Livewire, Blade, Filament v3, MariaDB, dan Docker.

Website ini menerapkan konsep dinamis, yaitu data yang tampil di halaman frontend diambil dari database dan dapat dikelola melalui Filament Admin Panel.

## Fitur Utama

- Landing page dinamis
- Halaman profile / about
- Halaman daftar project
- Halaman detail project
- Form kontak
- Admin panel
- CRUD profile
- CRUD project
- CRUD pesan kontak
- Progress project dinamis
- ERD project dinamis

## Konsep Dinamis

Data website tidak ditulis langsung secara statis di Blade.

Konten seperti nama, bio, tech stack, project, progress, kontak, dan ERD diambil dari database.

Admin dapat mengubah data melalui Filament Admin Panel tanpa perlu mengedit source code.

Layout website tetap dibuat menggunakan Blade dan CSS.

## Tech Stack

- Laravel
- Filament v3
- Livewire
- Blade
- MariaDB
- Docker

## Route Website

- `/` untuk landing page
- `/projects` untuk daftar project
- `/projects/{slug}` untuk detail project
- `/contact` untuk form kontak
- `/admin` untuk admin panel

## Cara Menjalankan

Jalankan container:

```bash
dcu