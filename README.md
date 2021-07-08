# TestimonialCrud

An admin interface for [Laravel Backpack](laravelbackpack.com) to easily add, edit or remove Testimonials.

## Install

1. In your terminal:

``` bash
$ composer require smartystudio/testimonialcrud
```

2. If your Laravel version does not have package autodiscovery then add the service provider to your config/app.php file:

```php
Cviebrock\EloquentSluggable\ServiceProvider::class,
SmartyStudio\TestimonialCrud\TestimonialCRUDServiceProvider::class,
```

3. Publish & run the migration file

```bash
$ php artisan vendor:publish --provider="SmartyStudio\TestimonialCrud\TestimonialCRUDServiceProvider" # publish migration file
$ php artisan migrate # create the testimonial table
```

4. [Optional] Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:

```html
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('testimonial') }}"><i class="nav-icon la la-bullhorn"></i><span>Testimonials</span></a></li>
```

5. Add a **TestimonialComposer** in App\Providers\AppServiceProvider.php:

```php
use SmartyStudio\TestimonialCrud\app\Http\View\Composers\TestimonialComposer;
```

6. Add the line below after the first curly brackets of boot() method in App\Providers\AppServiceProvider.php file:

```php
view()->composer('folder_name.*', TestimonialComposer::class);
```

**folder_name** - this is the folder with the front-end template files where the testimonials should appear

## How to use the package

* First create a testimonial
* Add title
* Add content
* Add client
* Add client url (optional)
* Upload an image
* Save the testimonial

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
// TODO
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email us instead of using the issue tracker.

## Credits

- Martin Nestorov - Web Developer @ Smarty Studio MBN Ltd.
- All Contributors

## License

The SmartyStudio\TestimonialCRUD is open-source software licensed under the MIT license.