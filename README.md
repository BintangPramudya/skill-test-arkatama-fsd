# 🐾 PetCare+ — Aplikasi Klinik Hewan

PetCare+ adalah aplikasi manajemen klinik hewan sederhana yang dibangun menggunakan **Laravel 11** dan **Filament v4**.  
Aplikasi ini dibuat untuk memenuhi **Skill Test Full Stack Developer – PT Arkatama Multi Solusindo** dengan fokus pada **CRUD**, **validasi data**, dan **logika backend**.

---

## 🚀 Tech Stack

- **Laravel 11**
- **Filament v4** (Admin Panel)
- **PHP 8.2+**
- **Database**: SQLite (development) / MySQL / PostgreSQL
- **Tailwind CSS** (via Filament)

---

## 📌 Fitur Utama

### 🧑 Pemilik Hewan
- CRUD data pemilik
- Nomor telepon dapat diverifikasi
- Hanya pemilik dengan nomor terverifikasi yang dapat dipilih saat input data hewan

---

### 🐶 Data Hewan (Fokus Utama Skill Test)
- Input data hewan menggunakan **1 input teks**
- Dropdown pemilik **hanya menampilkan pemilik dengan nomor terverifikasi**
- Sistem parsing otomatis sesuai format input

#### 📄 Format Input Hewan
NAMA JENIS USIA BERAT
Contoh:
Milo Kucing 2 tahun 4,5kg
Milo Kucing 2th 4.5kg
Milo Kucing 2TH 4,5KG


#### ⚙️ Pengolahan Data Otomatis
- Nama dan jenis hewan disimpan dalam **UPPERCASE**
- Usia dibersihkan dari satuan dan disimpan sebagai **integer**
- Berat dibersihkan dari satuan dan disimpan sebagai **decimal**
- Input dengan spasi berlebih tetap diproses dengan aman
- Data tidak valid akan menampilkan pesan error yang jelas

---

### 🔢 Kode Registrasi Hewan
Setiap hewan memiliki kode unik dengan format:

HHMMXXXXYYYY



Keterangan:
- **HHMM** → Jam dan menit saat data disimpan
- **XXXX** → ID pemilik (4 digit, left padded)
- **YYYY** → Nomor urut hewan

Contoh:
103000120002



---

### 🔐 Validasi Data Hewan
- Hewan dengan **nama dan jenis yang sama** tidak boleh dimiliki oleh pemilik yang sama
- Kode hewan bersifat **unik**
- Validasi dilakukan di backend dan database
- Pesan error ditampilkan secara user-friendly (tanpa error 500)

---

### 🩺 Data Pemeriksaan (Point Plus)
- CRUD data pemeriksaan hewan
- Relasi dengan:
  - Hewan
  - Jenis Perawatan (Vaksin, Grooming, Pemeriksaan)
- Input tanggal pemeriksaan dan catatan
- Menampilkan relasi hewan dan pemilik di tabel

---

## 📊 Dashboard
Dashboard admin menampilkan ringkasan data:
- Total Pemilik
- Total Hewan
- Total Pemeriksaan
- Chart sederhana **(Bar Chart)** jumlah pemeriksaan berdasarkan jenis perawatan

Dashboard dibuat ringkas dan relevan tanpa over-engineering.

---

## 🗄️ Struktur Database

### Tabel:
- `owners`##
- `pets`
- `treatments`
- `checkups`

### Relasi:
- 1 Owner → Banyak Pet
- 1 Pet → Banyak Checkup
- 1 Checkup → 1 Treatment

---

## ⚙️ Instalasi & Menjalankan Project

```bash
git clone https://github.com/USERNAME/skill-test-arkatama-fsd.git
cd skill-test-arkatama-fsd
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


## Buat Akun Filamtn untuk Login
php artisan make:filament-user

