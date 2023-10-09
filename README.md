# Peminba

Aplikasi peminjaman barang jurusan menggunakan Framework Laravel 10. Aplikasi ini memiliki 3 role, yaitu _Administrator Jurusan_, _Petugas Jurusan_ dan _Mahasiswa_.
Beberapa CRUD menggunakan AJAX untuk pengambilan data agar mengurangi penggunaan perpindahan halaman.

Setiap role memiliki tampilan halaman yang berbeda-beda sesuai dengan hak akses masing-masing.

### Demo

-   https://demo.peminba.mrizkimaulidan.my.id/login

### Prasyarat

Berikut beberapa hal yang perlu diinstal terlebih dahulu:

-   Composer (https://getcomposer.org/)
-   PHP ^8.1
-   MySQL 15.x
-   XAMPP

Jika Anda menggunakan XAMPP, untuk PHP dan MySQL sudah menjadi 1 (bundle) di dalam aplikasi XAMPP.

### Fitur

-   CRUD Komoditas
-   CRUD Program Studi
-   CRUD Kelas
-   CRUD Mata Kuliah
-   Informasi peminjaman barang dari mahasiswa
-   CRUD Mahasiswa
-   CRUD Administrator
-   Pengaturan Profil

### Preview Gambar

_Tampilan Login_
![Image 1](https://i.imgur.com/IVw0yEt.png)

_Beranda_
![Image 2](https://i.imgur.com/jE1zjU6.png)

_Daftar Komoditas_
![Image 3](https://i.imgur.com/XJyjXtY.png)

_Daftar Program Studi_
![Image 4](https://i.imgur.com/tT27eOD.png)

_Daftar Kelas_
![Image 5](https://i.imgur.com/a8mVjTg.png)

_Daftar Mata Kuliah_
![Image 6](https://i.imgur.com/tPHMiDC.png)

_Daftar Peminjaman Hari Ini_
![Image 7](https://i.imgur.com/8CPC8CI.png)

_Daftar Riwayat Peminjaman_
![Image 8](https://i.imgur.com/uCj0WZd.png)

_Daftar Laporan Peminjaman_
![Image 9](https://i.imgur.com/o62NK8n.png)

_Daftar Mahasiswa_
![Image 10](https://i.imgur.com/sysJ3Ty.png)

_Daftar Administrator_
![Image 11](https://i.imgur.com/hShsruk.png)

_Pengaturan Profil_
![Image 12](https://i.imgur.com/SCQQjom.png)

### Langkah-langkah instalasi

-   Clone repository ini

HTTPS:

```
git clone https://github.com/mrizkimaulidan/peminba.git
```

SSH:

```
git clone git@github.com:mrizkimaulidan/peminba.git
```

-   Install seluruh packages yang dibutuhkan

```
composer install
```

-   Siapkan database dan atur file `.env` sesuai dengan konfigurasi Anda
-   Ubah value `APP_NAME=` pada file `.env` menjadi nama aplikasi yang anda inginkan
-   Jika sudah, migrate seluruh migrasi dan seeding data

```
php artisan migrate:fresh --seed
```

-   Jalankan local server

```
php artisan serve
```

-   User default aplikasi untuk login

##### Administrator Jurusan

```
Email       : admin@mail.com
Password    : secret
```

##### Petugas Jurusan

```
Email       : petugas@mail.com
Password    : secret
```

##### Mahasiswa

```
Email       : mahasiswa@mail.com
Password    : secret
```

### Dibuat dengan

-   [Laravel](https://laravel.com) - Web Framework

### Kontribusi

Silahkan request melalui kolom `Pull Requests` jika ingin melakukan kontribusi

### Lisensi

Aplikasi ini boleh untuk dibagi dan diubah. Mohon tidak untuk diperjualbelikan!

**@Muhammad Rizki Maulidan** - [@mrizkimaulidan](https://github.com/mrizkimaulidan)
