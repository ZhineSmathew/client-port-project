# ClientPort Management System

A scalable and maintainable Laravel 12 project for managing Admin and Client users with secure authentication using laravel/ui with Bootstrap scaffolding , profile management, image handling, and value assignment functionality.

---

## Requirements

- PHP 8.0
- Composer
- Laravel 12
- MySQL
- Node.js & NPM

---

## Installation Steps

1. **Clone the repository**

   git clone git@github.com:ZhineSmathew/client-port-project.git

   cd client-management
   
2, **Environment setup**

    composer install

    cp .env.example .env

    php artisan key:generate

3, **Configure database**

    DB_DATABASE=clientport

4, **Migration**

    php artisan migrate --seed // Run migrations and seeders

    Email: adminUser@example.com
    Password: password


✅ Features

Admin Panel

    Manage client users (CRUD)

    Assign custom values (text or number) to one or multiple client users

    View and update admin profile

Client Portal

    Register and log in

    Manage their own profile

    View assigned values (displayed using Bootstrap cards)

Shared Functionality

    Profile includes email, phone, password (with confirmation), and image upload

    Image upload includes validation for size and resolution

    Proper validation for all inputs

    Use of:

        ENUM for user type

        Seeder for default admin credentials

        Model relationships for admin-user-value linkage
