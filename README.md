<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### E-Commerce Website (RESTful API)
- Open any terminal or command line in the directory which you use for development (the directory which you run the Apache server on)
- Run `git clone https://github.com/Kareem-Tarek/E-commerce-basic.git`
- Run `cd E-commerce-basic`
- Run `composer install` or `composer update`
- Run `cp .env.example .env`
- Run `php artisan key:generate`
- Create database in mysql and then open the ".env" file and in line 14 change the database name to the one that you created in mysql
- Run `php artisan migrate:fresh --seed` (this commannd is important to run. In order to migrate the tables from Laravel project to the DB server in mysql with a fake dummy data which is handled by the DB seeder from Laravel)
- Run `php artisan serve` and wait for 5 to 10 seconds untl the server runs (this command will run the project on the localhost server with a default port 8000 like in the following "localhost:8000/")
- Also run (Start) the Apache server (such as..Laragon, XAMPP, etc.) on your computer
- Copy the link (localhost:8000/) and paste it in any browser's URL then the project will open on the home page and will be ready to use

  Thank You <3.
