## A készítés menete

A készítés menetének folyamatát a development.sh tartalmazza

## Telepítés saját gépre

- git repo lehúzása a gépre

- adatbázis létrehozása egy mysql/mariadb szerveren

- .env állományban beállítani az (üres) adatbázis kapcsolati adatait

- .env állományban beállítani a levelezőszerver kapcsolati beállításait

- állományok frissítése

- rendszer elindítása

```
git clone https://github.com/gerzsony/laravel-brdi-cinemaorder.git

mysql -u root -p
create database laravel_brdi_cinemaorder;
ctrl-c 

#setting up .env file (database section) Example is here: 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_brdi_cinemaorder
DB_USERNAME=root
DB_PASSWORD=

#setting up .env file (mail sending section) Example is here: 
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourprovider.com
MAIL_PORT=587
MAIL_USERNAME=yourloginname
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@dev.probaljaki.hu"
MAIL_FROM_NAME="${APP_NAME}"

#filling database
php artisan migrate
php artisan db:seed
npm install

#start application with sail
php artisan serve

#check localhost:8000
```

## Használat

http://localhost:8000/actualevent

## Elérhető API

> GET /eventdata/seats
> 
> POST /eventdata/tmp_reservation
> 
> GET /eventdata/delaftertime
> 
> GET /eventdata/forcedel2seats
