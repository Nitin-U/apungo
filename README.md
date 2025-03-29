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


# Git Workflow Guide

This document outlines the Git workflow for our project. All developers should follow these steps to maintain a clean and structured repository.

## **Branching Strategy**

- `main` → **Stable, production-ready branch** (only merge tested code here).
- `development` → **Testing branch where features are merged and deployed for review**.
- `feature/*` → **Individual branches for each new feature or bug fix**.

## **1️⃣ One-Time Setup (Creating `develop` Branch)**

```sh
# Switch to main branch and pull latest changes
git checkout main
git pull origin main

# Create develop branch from main
git checkout -b development
git push -u origin development
```

## **2️⃣ Developer Workflow (Creating & Working on a Feature Branch)**

Always create the branch from development

```sh
# Switch to development
git checkout development
git pull origin development  # Always Ensure latest updates

# Create a new feature branch
git checkout -b feature-branch-name (anmol01)
git push -u origin feature-branch-name (anmol01)
```

### **Working on the Feature**
```sh
# Add changes
git add .

# Commit with a meaningful message
git commit -m "Implemented feature XYZ"

# Push changes
git push origin feature-branch-name (anmol01)
```

## **3️⃣ Merging Feature Branch into `develop` (For Testing & Deployment)**

```sh
# Switch to development
git checkout development
git pull origin development

# If Development branch is already updated, you can merge your branch

# Merge Branch
git merge feature-branch-name (anmol01)

# Push changes
git push origin development

# If changes are seen in development i.e other branches are merged. Follow mentioned steps

# Checkout to your current feature branch
git checkout feature-branch-name (anmol01)

# rebase development
git rebase origin development

# rebase development
git rebase origin development

# Checkout to development
git pull origin development

# Finally merge branch
git merge feature-branch-name (anmol01)

```

## **4️⃣ Resolving Merge Conflicts in Feature Branch)**

If there are merge conflicts while merging your feature branch with development, follow these steps:
```sh
# Switch to feature branch
git checkout feature-branch-name (anmol01)

# Pull the latest develop branch to see conflicts
git pull origin development
```
Now, open the conflicting files in your editor and manually resolve conflicts. After resolving:
```sh
# Mark conflicts as resolved
git add .

# Commit the resolved changes
git commit -m "Resolved merge conflicts with development"

# Push the updated feature branch
git push origin feature-branch-name  (anmol01)
```

## **4️⃣ Deploy & Test From `develop`**
- Deploy the `develop` branch to a staging environment.
- Perform testing and quality assurance.
- If everything is good, proceed to merge `develop` into `main`.

## **5️⃣ Merging `develop` into `main` (For Production Release)**

```sh
# Switch to main
git checkout main
git pull origin main

# Merge develop into main
git merge develop

# Push changes to remote main branch
git push origin main
```

### **Tag a Release (Optional but Recommended)**
```sh
git tag -a v1.0 -m "Release version 1.0"
git push origin v1.0
```

## **6️⃣ Keep `develop` Up to Date After Releasing to `main`**
```sh
# Switch to develop
git checkout develop
git pull origin develop

# Merge main back into develop
git merge main

# Push changes
git push origin develop
```

---

## **📌 Summary of Git Commands**

| Action | Command |
|--------|---------|
| **Create `development` branch (one-time)** | `git checkout -b development` → `git push -u origin development` |
| **Create a feature branch** | `git checkout -b feature-branch-name` → `git push -u origin feature-branch-name` |
| **Commit & Push changes** | `git add .` → `git commit -m "Message"` → `git push origin feature-branch-name` |
| **Merge feature into `develop`** | `git checkout development` → `git pull origin development` → `git merge feature-branch-name` → `git push origin development` |
| **Merge `develop` into `main` (after testing)** | `git checkout main` → `git pull origin main` → `git merge development` → `git push origin main` |
| **Delete feature branch** | `git branch -d feature-branch-name` → `git push origin --delete feature-branch-name` |
| **Tag a release (optional)** | `git tag -a v1.0 -m "Release version 1.0"` → `git push origin v1.0` |

---

## **🚀 Best Practices**
✅ **Always pull the latest changes (`git pull origin development`) before starting work.**  
✅ **Use descriptive branch names** (e.g., `feature-authentication`, `bugfix-login`).  
✅ **Write clear commit messages** (e.g., `Fix: User login validation`).  
✅ **Always merge into `develop` first for testing before merging into `main`.**  
✅ **Delete merged branches to keep the repo clean.**  

---

By following this workflow, we ensure a smooth and efficient development process while maintaining stability in `main`. Happy coding! 🚀



