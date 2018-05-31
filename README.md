# Kentico Cloud sample Laravel PHP web application

This is a sample website written in PHP7 using [Laravel](https://laravel.com) framework and [Kentico Cloud Delivery SDK for PHP](https://github.com/Kentico/delivery-sdk-php).

You can register your account for free at [https://app.kenticocloud.com](https://app.kenticocloud.com).

## Application setup

There should be PHP7.1 and higher and composer installed in your environment. Once these prerequisities are met, you run the application as follows:

1. Clone this repository
2. `cd` in the project folder and run `composer update` and `php artisan serve` commands.
3. Access `127.0.0.1:8000` (default) to browse the application.

### Known issue in PHP v7.1.13

When using this sample application with PHP v7.1.13, one of the dependencies ([sunra/php-simple-html-dom-parser](https://github.com/sunra/php-simple-html-dom-parser/)) tends to get stuck in an endless loop of calls to its own destructor. It is possible to get around this issue by deleting *__destruct()* method in *simple_html_dom.php:140*, but we do not recommend it.

We recommend not using PHP v7.1.13 with this application.

## Author

We would like to express our thanks to [Stephen Rushing](https://github.com/stephenr85) who created this sample application.