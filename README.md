# E-Commerce Admin Panel

A professional e-commerce administration panel built with Laravel 11, featuring complete CRUD operations, order management, and analytics dashboard.

## Features

- User Authentication System
- Dashboard with Key Metrics and Statistics
- Complete Category Management (CRUD)
- Complete Product Management (CRUD)
- Order Management System
- Advanced Search and Filtering
- Responsive Design with Tailwind CSS
- Data Pagination
- Low Stock Alerts
- Order Status Tracking
 
## Tech Stack

- **Backend:** PHP 8.2+ / Laravel 11
- **Database:** MySQL
- **Frontend:** Blade Templates
- **CSS Framework:** Tailwind CSS
- **Authentication:** Laravel Authentication

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL 5.7 or higher

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd E-Commerce_Admin_Panel
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Setup

Copy the `.env.example` file to `.env` and update database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_admin
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Create Database

Create a MySQL database named `ecommerce_admin`

### 6. Run Migrations and Seed Database

```bash
php artisan migrate --seed
```

This will create sample data including an admin user, categories, products, and orders.

### 7. Create Storage Link

```bash
php artisan storage:link
```

### 8. Start Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Default Login Credentials

```
Email: admin@example.com
Password: password
```

## Key Features

### Dashboard
- Total products, categories, orders, and revenue statistics
- Order distribution by status
- Recent orders list
- Low stock product alerts

### Category Management
- Complete CRUD operations
- Search and filter functionality
- Automatic slug generation
- Product count tracking
- Prevents deletion of categories with associated products

### Product Management
- Complete CRUD operations
- Image upload support
- Automatic SKU generation
- Stock level management
- Advanced filtering (category, status, stock level)
- Prevents deletion of products with existing orders

### Order Management
- View and filter orders
- Update order status
- Add internal notes
- View detailed order information with line items
- Customer information display
- Color-coded status badges

## Database Schema

### Categories
- id, name, slug, description, is_active, timestamps

### Products
- id, category_id, name, slug, description, price, stock, sku, image, is_active, is_featured, timestamps

### Orders
- id, order_number, customer_name, customer_email, customer_phone, shipping_address, subtotal, tax, shipping, total, status, notes, timestamps

### Order Items
- id, order_id, product_id, quantity, price, subtotal, timestamps

## License

This project is open-sourced software licensed under the MIT license.
