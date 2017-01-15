POSTOPEK ZA NAMESTITEV APLIKACIJE NA HEROKU.COM

Zahteve:
-laravel projekt
-git
-heroku cli
-heroku account


Postopek:

$cd hello_laravel_heroku
$git init
$git add .
$git commit -m "new laravel project"
$echo web: vendor/bin/heroku-php-apache2 public/ > Procfile
$git add .
$git commit -m "Procfile for Heroku"
$heroku create
$php artisan key:generate --show
$heroku config:set APP_KEY=<KAR VRNE PREJŠNJA VRSTICA>
$git push heroku master


Povezava z podatkovno bazo:
-Nekje postavite podatkovno bazo in v .env vpišite naslov, ime, up.ime, geslo.
-Nato v tej baz izvedite .sql skripto priloženo v install direktoriju.
-Spremembe še pošljite na Heroku:
git add .
git commit -m "DB credentials"
git push heroku master
