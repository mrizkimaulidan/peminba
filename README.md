# Peminba

Sebuah aplikasi peminjaman barang jurusan untuk memenuhi tugas mata kuliah Basis Data Tingkat Lanjut.

Sedang dalam pembuatan..

```bash
$ git clone https://github.com/mrizkimaulidan/peminba.git
```

```bash
$ cd peminba
```

```bash
$ composer i
```

```bash
$ cp .env .env.example
```

Setup the database based on your own.

```bash
$ php artisan migrate --seed
```

Generate ide helper:

```bash
$ php artisan ide-helper:generate
```

```bash
$ php artisan serve
```

Development menggunakan Laravel Sail:

```bash
$ ./vendor/bin/sail up
```
