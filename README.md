### Laravel version 9.34
### php version 8.1.11
### Composer version 2.4.2 

``` composer install ```

``` php artisan migrate ```

``` php artisan db:seed ```

``` ./vendor/phpunit/phpunit/phpunit ```

Modify .env and set MAIL_MAILER=log to print emails in the log.

Do a GET call on ```/api/users/mail``` and check the log.
