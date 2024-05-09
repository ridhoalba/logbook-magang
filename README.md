# Panduan Cloning dan Menjalankan Proyek Laravel

Ini adalah panduan langkah-demi-langkah untuk mengkloning proyek Laravel ini dari repositori GitHub dan menjalankannya di lingkungan lokal Anda.

## Persyaratan

Sebelum Anda memulai, pastikan komputer Anda memenuhi persyaratan berikut:

-   PHP telah terinstal di komputer Anda (disarankan PHP versi 8.2 atau yang lebih baru).
-   Composer telah terinstal di komputer Anda.
-   Database seperti MySQL, PostgreSQL, atau SQLite telah diatur.

## Langkah-langkah

### 1. Clone Repositori

Buka terminal atau command prompt, lalu jalankan perintah berikut untuk mengkloning repositori proyek Laravel dari GitHub:

```bash
git clone https://github.com/ridhoalba/logbook-magang.git
```

### 2. Instal Dependensi

Masuk ke direktori proyek yang baru saja Anda klone:

```bash
cd logbook-magang
```

Kemudian, jalankan perintah berikut untuk menginstal semua dependensi PHP menggunakan Composer:

```bash
composer install
```

### 3. Konfigurasi Lingkungan

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Buka file `.env` dengan editor teks Anda dan sesuaikan pengaturan database sesuai dengan lingkungan Anda.

### 4. Generate Key Aplikasi

Jalankan perintah berikut untuk menghasilkan kunci aplikasi baru:

```bash
php artisan key:generate
```

### 5. Persiapan Database

Jalankan perintah migrasi untuk membuat tabel-tabel yang diperlukan di database:

```bash
php artisan migrate --seed
```

### 6. Jalankan Server Lokal

Terakhir, jalankan perintah berikut untuk menjalankan server lokal:

```bash
php artisan serve
```

Buka browser Anda dan akses proyek Laravel melalui URL yang ditampilkan pada terminal.
