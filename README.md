# Kentico Cloud sample Laravel PHP web application

This is a sample website written in PHP7 using [Laravel](https://laravel.com) framework and [Kentico Cloud Delivery SDK for PHP](https://github.com/Kentico/delivery-sdk-php). You can register your account for free at [https://app.kenticocloud.com](https://app.kenticocloud.com).

## Application setup

There should be PHP7.1 and higher and composer installed in your environment. Once these prerequisities are met, you run the application as follows:

1. Clone this repository.
2. `cd` in the project folder and run `composer update` and `php artisan serve` commands.
3. Access `127.0.0.1:8000` (default) to browse the application.

Alternatively you can also deploy your application to your apache server just by clonning the repository, running composer update and accessing corresponding address on your server.

### Connecting your project

If you want to change the source Kentico Cloud project, follow these steps:

1. In Kentico Cloud, choose Project settings from the app menu.
2. Under Development, choose API keys.
3. Copy your Project ID.
4. Open `app\Providers\AppServiceProvider.php` file in the sample application folder.
5. Find `new DeliveryClient('975bf280-fd91-488c-994c-2f04416e5ee3');` and replace guid with your Project ID.
6. In the same file, find `share('engage_project_id', 'ace71be0-4898-4e7f-b0b6-f416080e5b8b')` and replace it with your Project ID as well.
7. Save the file.

When you run the sample application now, content is retrieved from your project.

## Content administration

1. Navigate to https://app.kenticocloud.com in your browser.
2. Sign in with your credentials.
3. Manage content in the content administration interface of your sample project.

You can learn more about content editing with Kentico Cloud in the documentation.

## Content delivery

You can retrieve content either through the Kentico Cloud Delivery SDKs or the Kentico Cloud Delivery API:

* For published content, use `https://deliver.kenticocloud.com/PROJECT_ID/items`.
* For unpublished content, use `https://preview-deliver.kenticocloud.com/PROJECT_ID/items`.

For more info about the API, see the [API reference](https://developer.kenticocloud.com/reference).

You can find the Delivery and other SDKs at https://github.com/Kentico.

## Tracking visitors and their activity

By default you can see sample visitor data in Kentico Cloud, even if you already feed the single-page application with your own content. Tracking real visitors needs to be set up separately and here's how to.

Tracking via tracking code on all public pages is enabled by default and can be configured in files `app\Providers\AppServiceProvider.php` and `resources\views\layouts\app.blade.php`.

If you want to update project that will track events from your pages, you have to replace guid in `app\Providers\AppServiceProvider.php` on line containing `share('engage_project_id', 'guid')` with your Project ID.

To remove tracking code altogether, remove following code from `resources\views\layouts\app.blade.php`:

```html
    <script type="text/javascript">
        !function(){var a='https://engage-ket.kenticocloud.com/js',b=document,c=b.createElement('script'),d=b.getElementsByTagName('script')[0];c.type='text/javascript',c.async=!0,c.defer=!0,c.src=a+'?d='+document.domain,d.parentNode.insertBefore(c,d)}(),window.ket=window.ket||function(){(ket.q=ket.q||[]).push(arguments)};
        ket('start', '{{ $engage_project_id }}');
    </script>
```

When you have tracking enabled and visit any of publicly facing pages, you should be able to see your visit in Analytics of Kentico Cloud. You can also create a new dynamic segment of people who did the custom activity you created and see that the segment is not empty. It should contain you as anonymous visitor. You can learn more about creating segments with Kentico Cloud in the [documentation](https://help.kenticocloud.com/contact-tracking-and-content-personalization/segments/creating-segments-of-your-visitors).

### Known issue with some versions of PHP, Laravel and sunra's HTML dom parser

When using this sample application with some versions of PHP (reproduced on v7.1.13, 7.1.18 and 7.2), one of the dependencies ([sunra/php-simple-html-dom-parser](https://github.com/sunra/php-simple-html-dom-parser/)) tends to get stuck in an endless loop of calls to its own destructor. We worked-around this issue by renaming destructors in fetched dependencies every time they are changed. For futher reference, please see the [issue in package's repository repository](https://github.com/sunra/php-simple-html-dom-parser/issues/60).

## Author

We would like to express our thanks to [Stephen Rushing](https://github.com/stephenr85) who created this sample application.