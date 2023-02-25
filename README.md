## Aplikasi TNGR-DEADLY

## Installation

-   Clone the repository
-   Copy .env.example to .env
-   Set the DB\_ environment variables in .env file
-   Create a database with the name specified in DB_DATABASE
-   `composer install`
-   `php artisan key:generate`
-   `php artisan storage:link`
-   Migrate and seed the database with `php artisan migrate:fresh --seed`
-   You can now log in with user "admin@gmail.com", password "password"

## License

[MIT](https://choosealicense.com/licenses/mit/)
