#prefereed aliases: artisan = php artisan, touch = echo.>
#in-path resources = php/lib, maridb/lib, composer, npm

aliases
cdwww
composer create-project --prefer-dist laravel/laravel laravel-brdi-cinemaorder
cd laravel laravel-brdi-cinemaorder
php artisan -V
#10.35.0

mysql -u root -p
create database laravel_brdi_cinemaorder;
ctrl-c 

#(setting up .env database connection variables)

php artisan migrate

#1071 error - change /app/Providers/AppServiceProvider.php 

php artisan migrate

php artisan make:model Order --migration

#(orders - migration  change)
#(edit app/Models/Order.php)

php artisan migrate

php artisan make:controller OrderController --resource

#(add the route resource in routes/web.php)
#(edit app/Http/Controllers/OrderController.php)

touch "resources/views/base.blade.php"
mkdir "resources/views/orders"
touch "resources/views/orders/index.blade.php"


php artisan make:seeder OrderSeeder

#edit database/seeders/DatabaseSeeder
#edit database/seeders/OrderSeeder

php artisan db:seed --class=OrderSeeder

npm install

touch "resources/views/orders/reservation.blade.php"
#edit it

#edit .env, config/mail
php artisan make:mail OrderMail

#edit /app/Mail/OrderMail
#create a new repo on github

git init

#edit readme.md

git add .
git commit -m "initial commit"
git branch -M main
git remote add origin https://github.com/gerzsony/laravel-brdi-cinemaorder.git
git push -u origin main

