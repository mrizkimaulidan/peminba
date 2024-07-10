# Peminba

Aplikasi peminjaman barang jurusan menggunakan Framework Laravel 10. Aplikasi ini memiliki 3 role, yaitu _Administrator Jurusan_, _Petugas Jurusan_, dan _Mahasiswa_.

Beberapa CRUD menggunakan AJAX untuk pengambilan data agar mengurangi penggunaan perpindahan halaman. Setiap role memiliki tampilan halaman yang berbeda-beda sesuai dengan hak akses masing-masing.

### Demo

- Demo Aplikasi (https://demo.peminba.mrizkimaulidan.my.id/login)

### Prasyarat

Berikut beberapa hal yang perlu diinstal terlebih dahulu:

- Composer (https://getcomposer.org/)
- PHP ^8.1
- MySQL 15.x
- NodeJS ^20.x (https://nodejs.org/)
- XAMPP (https://www.apachefriends.org/)

Jika Anda menggunakan XAMPP, PHP, dan MySQL sudah menjadi satu paket di dalam aplikasi XAMPP.

### Fitur

- CRUD Komoditas
- CRUD Program Studi
- CRUD Kelas
- Informasi peminjaman barang dari mahasiswa
- CRUD Administrator
- CRUD Petugas
- CRUD Mahasiswa
- Pengaturan Profil

### Preview Gambar

**Tampilan Login**
![Image 1](https://i.imgur.com/yZedz59.png)

**Beranda**
![Image 2](https://i.imgur.com/PYaECYV.png)

**Daftar Komoditas**
![Image 3](https://i.imgur.com/QiGUFAw.png)

**Daftar Program Studi**
![Image 4](https://i.imgur.com/nWGga19.png)

**Daftar Kelas**
![Image 5](https://i.imgur.com/9WFsQ94.png)

**Daftar Peminjaman Hari Ini**
![Image 6](https://i.imgur.com/k9mYfTP.png)

**Daftar Riwayat Peminjaman**
![Image 7](https://i.imgur.com/TTmCGB5.png)

**Daftar Laporan Peminjaman**
![Image 8](https://i.imgur.com/EkgmF6t.png)

**Daftar Administrator**
![Image 9](https://i.imgur.com/Orxeb1C.png)

**Daftar Petugas**
![Image 10](https://i.imgur.com/6JKU7E6.png)

**Daftar Mahasiswa**
![Image 11](https://i.imgur.com/sg3patg.png)

**Pengaturan Profil**
![Image 12](https://i.imgur.com/49qmxoF.png)

### Langkah-langkah Instalasi

1. Clone repository ini dengan memilih tipe protokol HTTPS atau SSH. Jika belum memiliki setup SSH, bisa menggunakan HTTPS.

**HTTPS:**

```bash
$ git clone https://github.com/mrizkimaulidan/peminba.git
```

**SSH:**

```bash
$ git clone git@github.com:mrizkimaulidan/peminba.git
```

2. Instal seluruh packages yang dibutuhkan.

```bash
$ npm install
```

```bash
$ composer install
```

3. Siapkan database dan atur value pada file `.env` sesuai dengan konfigurasi Anda.


```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

4. Ubah value  `APP_NAME=` pada file `.env` menjadi nama aplikasi yang Anda inginkan.

```bash
APP_NAME=
```

5. Migrate seluruh migrasi dan seeding data palsu.

```bash
$ php artisan migrate:fresh --seed
```

6. Generate IDE Helper (opsional jika ingin melakukan development)

```bash
$ php artisan ide-helper:generate
```

```bash
$ php artisan ide-helper:models
```

7. Jalankan local server

```bash
$ php artisan serve
```

```bash
INFO  Server running on [http://127.0.0.1:8000].  

Press Ctrl+C to stop the server
```

### User default aplikasi untuk login

**Admin Jurusan**

```bash
Email   : admin@mail.com
Pass    : secret
```

**Petugas Jurusan**

```bash
Email   : petugas@mail.com
Pass    : secret
```

**Mahasiswa**

```bash
Email   : mahasiswa@mail.com
Pass    : secret
```

### Dibuat dengan

- Laravel (https://laravel.com/)

### Kontribusi

Silakan request melalui kolom `Pull Requests` jika ingin melakukan kontribusi.

### Lisensi

Aplikasi ini boleh untuk dibagi dan diubah. Mohon tidak untuk diperjualbelikan!

Muhammad Rizki Maulidan - [@mrizkimaulidan](https://github.com/mrizkimaulidan)
