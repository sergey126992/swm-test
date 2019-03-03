# Simple API for the list of users

Work with Laravel and PostgreSQL

## Basic functions

* List of Users
* Filters
* Pagination

## Installation

Require this package with git.

```shell
git clone https://github.com/sergey126992/swm-test.git
```

Install with Composer.

```shell
php composer.phar install
```

Create tables with migrate command:

```shell
php artisan migrate
```

Fill tables with fake data

```shell
php artisan db:seed
```

Sample GET request:
```
http://127.0.0.1:8080/api/users?age[from]=18&age[to]=24&gender=male&hobby[]=football&hobby[]=snowboarding

http://127.0.0.1:8080/api/users?geo_location[nw][lat]=52.57&geo_location[nw][lng]=6.06&geo_location[se][lat]=52.13&geo_location[se][lng]=3.76
```

