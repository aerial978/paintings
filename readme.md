# Paintings project

This website is a portfolio allowing a painter to present and share his works. It was designed with the Symfony framework.

[![](https://img.shields.io/badge/website-000?style=for-the-badge&logo=ko-fi&logoColor=white)]()

## Features

* Blog news
* Portfolio
* Contact
* Admin panel (CRUD)
* Authentication

## Tech Stack

* Frontend : HTML5, CSS3, Bootstrap 5.3
* Backend : PHP 8.1, Symfony 6.1

## Launch

*  Wampserver 64bit 3.2.6
*  MySQL 5.7.36
*  github/aerial978

## Set Up

*   Librairies Installation

```bash
  composer install
```

Git clone the project

```bash
  https://github.com/aerial978/paintings.git
```

Database

*   Update .env file with your database configuration

```bash
  DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name
```

*   Create database

```bash
  php bin/console doctrine:database:create
```

*   Create database structure

```bash
  php bin/console make:migration
```

*   Database up-to-date

```bash
  php bin/console doctrine:migrations:migrate
```

*   Insert data fixtures

```bash
  php bin/console doctrine:fixtures:load
```
## Usage

### Admin

#### Admin URL : paintings/admin
#### Admin access : 
  *  email : user@test.com
  *  password : password


