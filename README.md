<p align="center">
<a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
</a>
<a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
</a>
<a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
</a>
</p>

# Laravel Project Setup Guide

## Prerequisites
Before you begin, ensure you have the following installed on your machine:
- **PHP** (>= 8.x recommended)
- **Composer** (latest version)
- **Node.js** (>= 16.x recommended)
- **MySQL** (or any other database of your choice)
- **Git**

## Installation Steps
### 1. Clone the Repository
```sh
git clone https://github.com/anmolkoirala1313/bin-booking.git
```

### 2. Install Dependencies
```sh
composer install
```
If this fails, try composer update

```sh
composer update
```

### 3. Create Environment File
```sh
cp .env.example .env
```
3.1 Modify the `.env` file and set up your database credentials and other environment variables.

3.2 Go to Database > Seeders > DatabaseSeeder.php

> uncomment the list mentioned below and run the  seeder command from step 4.2.
//            UserSeeder::class,
//            SettingSeeder::class,

### 4. Set Up the Database

4.1 Run the migration first

```sh
php artisan migrate
```
4.2 Run the seeder after migration

```sh
php artisan migrate --seed
```
This command will create the necessary database tables and seed them with default values.

### 5. Data Migration
If you need to refresh the database and reseed it, use the following command. 
Make sure the step 3.2 is completed

```sh
php artisan migrate:fresh --seed
```
This will drop all tables and recreate them with seeded data.

### 6. Storage and Permissions
Ensure storage and bootstrap cache directories are writable:
```sh
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

### 7. Run the Development Server
```sh
php artisan serve
```
This will start the Laravel development server at `http://localhost:8000` or `http://127.0.0.1:8000`.

## Deployment Notes
For production environments:
- Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
- Run `php artisan config:cache` and `php artisan route:cache` for performance improvements.
- Use a queue worker for background jobs.
- Ensure proper file permissions for `storage` and `bootstrap/cache`.

---
Now you're all set! 🚀 If you run into any issues, check the Laravel [documentation](https://laravel.com/docs) or open an issue on GitHub.

