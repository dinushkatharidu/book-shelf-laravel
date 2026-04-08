# 📚 My BookShelf - Personal Library Management System

A robust and professional personal library management system built with the **Laravel 11** framework. This application allows users to organize their book collections, categorize them, and manage digital records with ease.

---

## ✨ Features
- **User Authentication:** Secure registration and login system using Laravel Breeze.
- **Complete CRUD:** Create, Read, Update, and Delete book records seamlessly.
- **Image Handling:** Upload and display book cover images stored on the server.
- **Database Relationships:** Implementation of One-to-Many relationships (Categories ↔ Books).
- **Advanced Searching:** Search books by title or author name using a dynamic search bar.
- **Optimized Pagination:** Clean Bootstrap-styled pagination for browsing large collections.
- **Security & Authorization:** Logic ensuring users can only modify their own data.
- **Clean Architecture:** Uses Form Request Validation to keep controllers professional.

---

## 🛠️ Tech Stack
- **Backend:** Laravel 11 (PHP 8.2+)
- **Database:** SQLite (Lightweight & Portable)
- **Frontend:** Blade Templates, Bootstrap 5
- **Tooling:** Composer, NPM, Artisan CLI

---

## 🚀 Installation & Setup
Follow these steps to get the project running on your local machine:

### 1. Clone the Project
git clone https://github.com/your-username/book-shelf-laravel.git
cd book-shelf-laravel

### 2. Install Dependencies
composer install
npm install && npm run dev

### 3. Environment Configuration
cp .env.example .env
php artisan key:generate

### 4. Database Setup (SQLite)
touch database/database.sqlite
(Update your .env file to use DB_CONNECTION=sqlite)

### 5. Run Migrations
php artisan migrate

### 6. Storage Link
php artisan storage:link

### 7. Start the Server
php artisan serve
(Access the app at: http://127.0.0.1:8000)

---

## 📂 Project Structure Highlights
- **Models:** Book, Category, and User with defined Eloquent relationships.
- **Controllers:** BookController handling business logic and data flow.
- **Requests:** StoreBookRequest for specialized data validation.
- **Views:** Organized Blade templates using a main layout file for consistency.

---

## 👤 Author
**Dinushka Tharidu**
Software Engineering Undergraduate at the Open University of Sri Lanka (OUSL).

---

## 📄 License
This project is open-sourced software licensed under the MIT license.
