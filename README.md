# Teinor, technical test

# How to install

Clone the project

```
git clone https://github.com/pau-sanz/teinor_sym.git
```

Install the dependencies

```
composer install
```


Edit .env file

Create the database

```
php bin/console doctrine:database:create
```

Create fake content and tables

```
php bin/console doctrine:migrations:migrate
```
