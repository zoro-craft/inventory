# Inventory Management App

A simple Laravel-based inventory management application for managing products and categories with authentication.

## Features

- User authentication and login/logout flows
- Product management (create, edit, view, delete)
- Category management
- Responsive UI with Laravel Blade and Vite
- Docker-friendly setup for containerized deployment

## Tech Stack

- PHP 8.1+
- Laravel 10
- MySQL
- Vite
- Composer
- Docker / Docker Compose

## Project Structure

- app/ — application logic, controllers, models, policies
- database/ — migrations, seeders, and factories
- resources/views/ — Blade templates and UI
- routes/ — web and API route definitions
- public/ — public assets and entry point

## Requirements

Before starting, make sure you have installed:

- PHP 8.1 or higher
- Composer
- Node.js and npm
- MySQL
- Docker and Docker Compose (optional, for containerized setup)

## Installation

1. Clone the repository

    ```bash
    git clone <repository-url>
    cd inventory
    ```

2. Install PHP dependencies

    ```bash
    composer install
    ```

3. Install frontend dependencies

    ```bash
    npm install
    ```

4. Create your environment file

    ```bash
    cp .env.example .env
    ```

5. Generate the application key

    ```bash
    php artisan key:generate
    ```

6. Configure your database in the .env file

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

7. Create the storage symbolic link

    ```bash
    php artisan storage:link
    ```

8. Run the database migrations

    ```bash
    php artisan migrate
    ```

9. Seed the database (optional)
    ```bash
    php artisan db:seed
    ```

## Running the Application

### Local development

Start the Laravel development server:

```bash
php artisan serve
```

Start the Vite dev server:

```bash
npm run dev
```

Then open your browser at:

```text
http://127.0.0.1:8000
```

### Docker

Build and run the container:

```bash
docker compose up -d --build
```

## Environment Variables

The following variables are commonly used:

- APP_NAME
- APP_ENV
- APP_KEY
- APP_URL
- DB_CONNECTION
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

## Contributing

Contributions are welcome. Please open an issue or submit a pull request with your proposed changes.

## License

This project is licensed under the MIT License.
