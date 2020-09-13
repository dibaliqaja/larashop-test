## Larashop Test
Larashop test is a simple project for an online shop website that is created to fulfill the initial coding test with a given requirement.

### Features
> Fitur Customer yang harus dipenuhi
- Bisa melakukan registrasi pada website tsb, dengan mengisi alamat email dan password 
✅
- Password harus minimal 8 karakter random (alphanumeric) 
✅
- Setelah proses registrasi, sistem akan mengirimkan email verifikasi akun ke alamat email yg didaftarkan. Customer klik link yg terdapat pada email dan akun akan terverifikasi. 
✅
- Bisa melakukan reset password. Dilakukan dengan mengisi alamat email yg didaftarkan sebelumnya. Jika tidak terdaftar, maka tampilkan pesan “Alamat email tidak terdaftar”. Jika terdaftar, maka sistem akan mengirimkan email instruksi reset password berisi link untuk melakukan reset password. Saat klik link tsb akan membuka window baru berisi form utk mengisi password baru dan retype password baru. Setelah diisi, maka password baru dapat digunakan untuk login, dan password lama tidak dapat digunakan untuk login. 
✅
- Bisa melihat detail produk dan menambahkan ke keranjang belanja. 
✅
- Saat checkout, bisa mengisi alamat tujuan pengiriman dan ketika klik tombol “Pesan” maka tampil informasi bahwa pesanan berhasil, dan sistem akan otomatis mengirimkan email ringkasan transaksi ke customer dan ke admin. 
✅
- Customer dapat upload foto bukti konfirmasi pembayaran. 
✅

> Fitur Admin yang harus dipenuhi
- Bisa login ke CMS menggunakan alamat email dan password. 
✅
- Password harus minimal 8 karakter random (alphanumerik). 
✅
- Bisa kelola (CRUD) Produk, dengan data: Nama produk, deskripsi produk, harga. 
✅
- Bisa menerima notifikasi saat ada order masuk. Notifikasi cukup di admin tanpa harusmengirimkan email ke admin. 
✅
- Bisa melihat foto2 bukti pembayaran yg sudah diupload. 
✅
- Bisa melihat detail order dan bisa mengganti status dari “Pending” menjadi “Delivered”. 
✅

### Requirements
- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### Installation
1. Clone GitHub repo for this project locally
```bash
$ git clone https://github.com/dibaliqaja/larashop-test.git
```
2. Change directory in project which already clone
```bash
$ cd larashop-test
```
3. Install Composer dependencies
```bash
$ composer install
```
4. Install NPM dependencies
```bash
$ npm install
```
5. Create a copy of your .env file
```bash
$ cp .env.example .env
```
6. Generate an app encryption key
```bash
$ php artisan key:generate
```
7. Create an empty database for our application
8. In the .env file, add database information to allow Laravel to connect to the database
9. Migrate the database
```bash
$ php artisan migrate
```
10. Seed the database
```bash
$ php artisan db:seed
```
10. Running project
```bash
$ php artisan serve
```

### User Credentials in Seeder

**Admin:** admin@larashop.net  
**Password:** 11111111

**User:** adi@larashop.net
**Password:** 1111111
<br>
--or--
<br>
Register yourself with your data for customer

### Screenshots


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
