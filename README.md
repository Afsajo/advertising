
# Hi Bos, I'm Azlansaja! 👋


# Project CV. Fajar Advertising

Panduan Instalasi Website Ke Hosting.



## Persiapan

1. Buat Akun Github
2. Fork (Copy) Project ini ke akun Github Anda

*Sebab Link ini akan dijadikan Private

4. Login ke Akun Hosting Anda dan Gunakan Terminal

## Terminal
4. Masuk Ke lokasi Root HOSTING Anda [Lokasi bebas, usahkan jangan di folder public_html ya!], contoh
```bash
  cd repository
```
*Artinya anda masuk ke folder root dengan nama repository, ini adalah lokasi kita untuk simpan file project ini.

*Jika folder repository tidak ada, silahkan dibuat terlebih dahulu

5. Clone (Download) project ini ke lokasi root dengan nama repository
```bash
  git clone https://github.com/Azlan-saja/advertising.git
```

6. Setelah clone selesai, masuk ke folder proyek Anda
```bash
  cd advertising
```
7. Jalankan perintah berikut untuk meng-install dependency Composer
```bash
  composer install
```
8. Konfigurasi Environment dengan Salin file .env.example menjadi .env, perintahnya
```bash
  cp .env.example .env
```
9. Generate kunci application Laravel, dengan perintah
```bash
  php artisan key:generate
```
10. Konfigurasi Database dengan cara edit file .env untuk menyesuaikan konfigurasi database sesuai dengan pengaturan server hosting Anda. Misalnya:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database

```
*Tambahan Edit di file .env [Sesuaikan]
```bash
APP_NAME=Advertising
APP_DEBUG=false
APP_URL=https://advertising.com
APP_LOCALE=id
```

11. Restore database, dengan perintah
```bash
  php artisan migrate
```
12. Isi data sample untuk login admin dan member, dengan perintah
```bash
  php artisan db:seed
```
*Login Sample 
```bash
*Member
  Username : member
  Password : password  

*Admin
  Username : admin
  Password : password  

```
13. Jalan perintah ini dengan tujuan Gambar produk dan download Laporan berfungsi dengan baik.
```bash
  php artisan storage:link
```

## LANJUTAN
14. Didalam folder repository, cari folder public.
15. Copy semua isi an dan tempelkan ke folder public_html
16. Buka file index.php dan edit menjadi seperti ini.

*Sebelum Edit
```bash
 
// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
```
*Setelah Edit
```bash
 
// Register the Composer autoloader...
require __DIR__.'/../repository/advertising/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../repository/advertising/bootstrap/app.php')
    ->handleRequest(Request::capture());
```
16. Silahkan Akses Web Anda
*Contoh
```bash
  https://advertising.com
```

## Penutup
Semoga Berjalan Lancar Bos.
