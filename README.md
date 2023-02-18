# Lyrics API

## Installation

Install dependencies

```shell script
composer install
```

Create end edit .env.local file

```shell script
cp .env .env.local
vim .env.local
```

Generate the database and fixtures

```shell script
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

Start the server

```shell script
symfony server:start
```

## Steps to re-create the project

```shell script
symfony new lyrics-api
```

### Install API Platform

```shell script
composer require api
```

### Install Maker Bundle

```shell script
composer require maker --dev
```

### Create the entity

```shell script
php bin/console make:entity
```

### Create the database schema

```shell script
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### Install Doctrine Fixtures Bundle

```shell script
composer require --dev orm-fixtures
```

### Execute the fixtures

```shell script
php bin/console doctrine:fixtures:load
```
