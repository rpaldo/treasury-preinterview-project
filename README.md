# Treasury Pre-Interview Exam

# Steps for Testing

1. Install PHP(8.1), Laravel(4.2.10) and MySQL(8.0.29)
2. Rename .env.example file to .env
3. Create a database in mysql and set DB details in .env file
4. Open command line tool, navigate to project folder and perform below commands.
    1. Generate app key. `php artisan key:generate`
    2. Install composer libraries. `composer install`
    3. Run `php artisan migrate:fresh --seed` to create the tables and sample data for roles, admin and posts.
    4. Below are the initial users (Both user uses `password` as password)
        1. Admin: admin@test.com
        2. User: user@test.com
