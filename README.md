# KQHAH Therapy Store

A Laravel-based e-commerce platform with product browsing, shopping cart management, checkout, order tracking, transaction capture, QR/order scanning, and an authenticated administration area.

## Overview

This project replaces a generic storefront flow with a custom Laravel application for managing products, pricing, customer orders, checkout activity, and administrative operations.

The application includes a public shopping experience and a protected admin area for day-to-day store management.

## Features

- Product browsing by category
- Individual product detail pages
- Shopping cart management
- Checkout and order creation
- Customer transaction ID capture
- Order confirmation flow
- QR/order scan route
- Admin authentication
- Admin dashboard
- Product creation, editing and deletion
- Pricing management
- Order listing and order detail views
- Order status updates
- Admin profile management

## Tech Stack

- **PHP 8.1+**
- **Laravel 10**
- **Blade**
- **MySQL / relational database support**
- **Laravel Eloquent ORM**
- **Laravel authentication middleware**
- **Composer**
- **Vite / frontend asset tooling**

## Application Structure

```text
app/                 # Controllers, models and application logic
bootstrap/           # Laravel bootstrap files
config/              # Application configuration
database/            # Migrations, factories and seeders
public/              # Public web assets
resources/           # Blade views and frontend resources
routes/               # Web routes
storage/              # Runtime application storage
```

## Core Routes

The storefront includes routes for the home page, category products, product details, cart operations, checkout, order creation and transaction capture.

The protected `/admin` area includes dashboard, profile, orders, pricing and product-management routes.

## Getting Started

Clone the repository:

```bash
git clone https://github.com/Kyomuhendo-Isihaka/kqhahtherapy.git
cd kqhahtherapy
```

Install PHP dependencies:

```bash
composer install
```

Create your environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database credentials in `.env`, then run:

```bash
php artisan migrate
php artisan serve
```

If frontend dependencies are required:

```bash
npm install
npm run dev
```

## What This Project Demonstrates

This project demonstrates full-stack Laravel development across customer-facing commerce workflows and authenticated administration. It shows practical experience with routing, controllers, CRUD operations, order workflows, authentication, relational data and deployment-ready Laravel project structure.

## Developer

**Isihaka Kyomuhendo**  
Software Developer • Backend Engineer • Mobile App Developer

GitHub: [@Kyomuhendo-Isihaka](https://github.com/Kyomuhendo-Isihaka)

---

> Building practical software for real-world operations.