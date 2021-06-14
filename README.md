# Movie-Chainer  
## App de relation Film/Contact/Job style "credits"

[![N|Solid](https://assets.chooseyourboss.com/companies/logos/000/007/912/square/moviechainer.png?1526570152)](https://moviechainer.com/)

Demo : https://movie-chainer.vassili-joffroy.fr/
email : p2m@moviechainer.com
password : password

## Tech

- Tailwind CSS
- Laravel/PHP
- JQuery
- Select2
- Ajax
- Mysql

## Installation

Movie-Chainer requires PHP 7.4+ to run.

```sh
git clone https://github.com/vassilidev/movie-chainer.git
cd movie-chainer
composer install
cp .env.example .env #edit this new file with your configuration
php artisan key:generate
php artisan migrate:fresh --seed

#Optional optimisation
composer install --optimize-autoloader --no-dev
php artisan optimize
```
