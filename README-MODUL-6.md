# LaporBanjir — Modul 4 dilanjutkan ke Modul 6

Project ini mempertahankan tampilan LaporBanjir Modul 4 dan menambahkan authentication manual sesuai Modul 6.

## Fitur yang ditambahkan
- Register petugas dengan validasi nama, email unik, password minimal 8 karakter, dan konfirmasi password.
- Login menggunakan `Auth::attempt()`, opsi Ingat Saya, serta regenerasi session setelah login.
- Logout menggunakan method POST, invalidate session, dan regenerasi token CSRF.
- Middleware `auth` melindungi halaman Daftar Laporan (`/laporan`) dan Profil Petugas (`/profil`).
- Form pelaporan (`/laporbanjir`) tetap dapat dibuka tanpa login.
- Profil menampilkan nama, email, dan waktu pembuatan akun.
- `PetugasSeeder` membuat lima akun petugas dummy ber-password hash dan satu akun admin BPBD.
- Navbar menampilkan menu sesuai status login dengan directive `@auth` dan `@else`.

## Menjalankan project
1. Ekstrak folder project dan buka terminal pada folder `prak4pabw`.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env` jika file `.env` belum tersedia.
4. Sesuaikan koneksi database di `.env` dengan konfigurasi Modul 4. Untuk MySQL/XAMPP, contohnya:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_modul4
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Ganti `nama_database_modul4` dengan nama database yang benar-benar digunakan project.
5. Jalankan `php artisan key:generate` jika `APP_KEY` masih kosong.
6. Pastikan MySQL berjalan, lalu jalankan `php artisan migrate`. Jangan gunakan `migrate:fresh` pada database berisi data penting karena perintah itu menghapus tabel dan membuatnya kembali.
7. Jalankan `php artisan db:seed` untuk mengisi data laporan contoh dan akun petugas. `PetugasSeeder` aman dijalankan berulang untuk akun petugas karena memakai `updateOrCreate`.
8. Jalankan `php artisan serve`, lalu buka alamat yang tampil di terminal.

## Akun untuk pengujian
- Admin BPBD: `admin@bpbd.go.id`
- Password admin: `admin123`
- Akun dummy: `petugas1@bpbd.test` sampai `petugas5@bpbd.test`
- Password akun dummy: `password`

Password hanya untuk praktikum lokal. Jangan gunakan kredensial contoh ini di aplikasi produksi.

## Urutan pengujian
1. Buka `/laporbanjir` saat belum login; form harus tetap bisa diakses.
2. Buka `/laporan` saat belum login; aplikasi harus mengarahkan pengguna ke `/login`.
3. Login menggunakan akun admin atau akun dummy; daftar laporan seharusnya dapat dibuka.
4. Buka `/profil`; pastikan nama, email, dan waktu pembuatan akun ditampilkan.
5. Coba login dengan password salah; pesan kesalahan harus muncul.
6. Klik Logout; setelah logout, buka `/laporan` lagi dan pastikan diarahkan kembali ke login.
7. Periksa tabel `users` di phpMyAdmin; kolom `password` harus berisi hash, bukan password asli.

## Catatan
Folder `vendor` dan `node_modules` tidak disertakan dalam ZIP agar ukuran project lebih kecil. Instal dependensi dengan `composer install` dan `npm install` bila dibutuhkan. Tampilan LaporBanjir menggunakan CSS lokal di `public/css/laporbanjir.css`, sehingga halaman utama dan authentication tidak bergantung pada Vite untuk styling.
