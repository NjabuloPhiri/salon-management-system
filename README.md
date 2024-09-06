# Salon Management System

This is a Salon Management System built with PHP and Laravel, using SQLite for the database. This README will guide you through setting up the project, configuring HERD and TablePlus for Laravel development, and running the system in development mode.

## Table of Contents

1. Prerequisites
2. Installation
3. Configuring HERD
4. Configuring TablePlus
5. Running the Application
6. Seeding the Database

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP 8.0 or higher
- Composer
- SQLite
- HERD (for local development)
- TablePlus (for database management)

## Installation

1. **Clone the repository:**
    
    ```bash
    git clone https://github.com/yourusername/salon-management-system.git
    cd salon-management-system
    ```
    
2. **Install dependencies:**
    
    ```bash
    composer install
    ```
    
3. **Create a copy of the `.env` file:**
    
    ```bash
    copy .env.example .env
    ```
    
4. **Generate an application key:**
    
    ```bash
    php artisan key:generate
    ```
    

## Configuring HERD

HERD is a specialized local development environment for Laravel applications.

1. **Install HERD:**
    
     
    
    Follow the installation instructions from the .
    
2. **Initialize a new HERD instance:**
    
    ```bash
    herd init salon-management-system
    ```
    
3. **Start the HERD environment:**
    
    ```bash
    herd start
    ```
    

## Configuring TablePlus

TablePlus is a modern, native tool for database management.

1. **Download and install TablePlus:**
    
     
    
    Visit the TablePlus website to download and install the application.
    
2. **Connect to your SQLite database:**
    
    - Open TablePlus.
    - Click on `Create a new connection`.
    - Select `SQLite`.
    - Browse to the location of your SQLite database file (usually `database/database.sqlite`).    

## Seeding the Database

To populate your database with initial data, you can use Laravel’s seeding feature.

1. **Create a seeder:**
    
    ```bash
    php artisan make:seeder UserSeeder
    ```
    
2. **Define your seeder:**
    
     
    
    Open the newly created seeder file in `database/seeders/UserSeeder.php` and define the data you want to seed.
    

    
    ```php
    use Illuminate\Database\Seeder;
    use App\Models\User;
    
    class UserSeeder extends Seeder
    {
        public function run()
        {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
    ```
    
    AI-generated code. Review and use carefully. .
    
3. **Run the seeder:**
    
    ```bash
    php artisan db:seed --class=UserSeeder
    ```

## Running the Application

1. **Migrate the database:**
    
    ```bash
    php artisan migrate
    ```
    
2. **Seed the database:**
    
    ```bash
    php artisan db:seed
    ```
    
3. **Run the development server:**
    
    ```bash
    php artisan serve
    ```
    
    Your application should now be running at `http://localhost:8000`. Alternatively, you may open your browser, type `salon-management-system.test`, and press "Enter".
