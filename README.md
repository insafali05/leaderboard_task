# Laravel Leaderboard System

This Laravel application provides a dynamic leaderboard system that tracks user activity points and ranks users based on selected filters: Today, This Month, or This Year.

## Features

-   Leaderboard filtering by day, month, or year.
-   Dynamic AJAX updates (no page refresh).
-   Search by User ID.
-   Rank calculation and highlighting of the searched user.
-   Clean UI with Bootstrap.

## Technologies Used

-   Laravel 8+
-   PHP 7.4+
-   MySQL
-   jQuery AJAX
-   Bootstrap 5

## Setup Instructions

1. **Clone the repository:**

    ```bash
    git clone https://github.com/insafali05/leaderboard_task.git
    cd leaderboard_task
    ```

2. **Install dependencies:**
   composer install
   npm install && npm run dev

3. **Configure .env:**
   cp .env.example .env
   php artisan key:generate

4. **Run migrations and seeders:**
   php artisan migrate
   php artisan db:seed

5.  4. **Serve the app::**
       php artisan serve
