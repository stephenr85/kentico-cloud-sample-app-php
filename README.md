# Kentico Cloud sample Laravel PHP web application

This is a sample website written in PHP7 using [Laravel](https://laravel.com) framework and [Kentico Cloud Delivery SDK for PHP](https://github.com/Kentico/delivery-sdk-php).

You can register your account for free at [https://app.kenticocloud.com](https://app.kenticocloud.com).

## Application setup

There should be PHP7.1 and higher and composer installed in your environment. Once these prerequisities are met, you run the application as follows:

1. Clone this repository
2. `cd` in the project folder and run `composer update` and `php artisan serve` commands.
3. Access `127.0.0.1:8000` (default) to browse the application.

Alternatively you can also deploy your application to your apache server just by clonning the repository, running composer update and accessing corresponding address on your server.

### Known issue with some versions of PHP, Laravel and sunra's HTML dom parser

When using this sample application with some versions of PHP (reproduced on v7.1.13, 7.1.18 and 7.2), one of the dependencies ([sunra/php-simple-html-dom-parser](https://github.com/sunra/php-simple-html-dom-parser/)) tends to get stuck in an endless loop of calls to its own destructor. We worked-around this issue by renaming destructors in fetched dependencies every time they are changed. For futher reference, please see [issue #60 in sunra/php-simple-html-dom-parser repository](https://github.com/sunra/php-simple-html-dom-parser/issues/60).

## Author

We would like to express our thanks to [Stephen Rushing](https://github.com/stephenr85) who created this sample application.