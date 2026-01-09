# Abyta Florist 🌸

Abyta Florist adalah website berbasis **Laravel** yang digunakan untuk **jual beli produk buket bunga**. Website ini dikembangkan untuk membantu salah satu mahasiswi dalam memasarkan dan mengelola penjualan rangkaian bunga secara online.

---

## Deskripsi Aplikasi

Aplikasi Abyta Florist menyediakan fitur:
- Katalog produk buket bunga
- Keranjang belanja
- Proses pemesanan (checkout)
- Manajemen produk (CRUD)

Website ini dibangun menggunakan konsep **Model-View-Controller (MVC)** pada Laravel dan dikembangkan sesuai tahapan **Rekayasa Perangkat Lunak (RPL)**.

---

## Teknologi yang Digunakan

- Laravel (Framework PHP)
- Composer
- MySQL (Database)
- phpMyAdmin (Database Management)
- Blade Template Engine
- Git & GitHub
- GitHub Actions (CI/CD)

---

## Fitur Utama

### Manajemen Produk (CRUD)
Aplikasi menyediakan fitur **Create, Read, Update, Delete (CRUD)** untuk data produk buket bunga. Pengelolaan data dilakukan menggunakan **Eloquent Model** dan **Controller Laravel**.

### Keranjang & Checkout
Pengguna dapat menambahkan produk ke keranjang, melihat isi keranjang, serta melakukan pemesanan. Data keranjang dikelola menggunakan **session Laravel**.

---

## Database & Migration

Aplikasi menggunakan **database MySQL** yang dikelola melalui **phpMyAdmin**.  
Struktur database dibuat dan dikelola menggunakan **Laravel Migration**, sehingga memudahkan pengembangan dan menjaga konsistensi data.

Beberapa tabel utama:
- products
- carts
- cart_items
- orders

---

## Proses Pengembangan & CI/CD

Project ini menerapkan **Continuous Integration (CI)** menggunakan **GitHub Actions**.

Alur pengembangan:
1. Pengembangan dilakukan di branch `testing`
2. Setiap push ke branch `testing` menjalankan workflow CI
3. Jika CI berhasil, perubahan siap di-merge ke branch `main`
4. Jika terjadi error, perbaikan dilakukan di branch `testing`

Pendekatan ini membantu menjaga kestabilan aplikasi dan kualitas kode.

---

## Branch Repository

- `main` → Versi stabil
- `testing` → Pengujian dan integrasi fitur
