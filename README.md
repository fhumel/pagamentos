# Payments

Project made for testing the laravel framework with the docker in a transaction application.

  - Docker
  - Lumen
  - PHP
  - MYSQL
  - Composer
  
#### Doc
[click](api.md)
  
### Requires

 - [Composer](https://getcomposer.org/download/)
 - [Docker](https://docs.docker.com/engine/install/)

### Installation

Clone project https://github.com/fhumel/payments.git

Install the dependencies of composer

```sh
$ cd payments
$ cd api
$ composer install
$ chmod 777 -R storage
$ php artisan migrate
$ php artisan key:generate 
$ php artisan cache:clear
```

For laravel...
copy .env.example para .env and config ports and mysql

For docker... 
config ports and mysql on docker-composer.yml

#### Building for source
### Docker

For production release:
```sh
$ cd payments
$ docker-compose build && docker-compose up -d
$ docker-compose up -d --force-recreate
$ docker ps
```
Add line in /etc/hosts

127.0.0.1       mysql

Verify the deployment by navigating to your server address in your preferred browser.

```sh
$ 127.0.0.1:8088
```

### Scripts

Code Style:

PSR-12: composer cs-psr12-check

Code Quality

MassDetector: composer codequality
Larastan: composer codequality-stan

#### Improvement Proposals
Create interface for controller
User authentications for use in transactions
Queues in s3 for transactions
Unit tests.

License
----

MIT


**Free Software, Hell Yeah!**

