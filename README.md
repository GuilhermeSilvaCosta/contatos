# contatos

> Cadastro de contatos com laravel

## Build Setup

``` bash
# install dependencies
composer update

# make .env
cp .env.example .env

# make app key
php artisan key:generate

# create database "contatos_laravel" (postgres) and run migrates
php artisan migrate

# run seeds
php artisan db:seed

# run server
php artisan serve
```

Checar o seed para verificar o login

Preencher as variaveis para envio de e-mail:

MAIL_DRIVER=smtp 
MAIL_HOST="your host" 
MAIL_PORT="your port" 
MAIL_USERNAME="your user" 
MAIL_PASSWORD="your pass" 
MAIL_ENCRYPTION=null