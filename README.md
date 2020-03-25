# This is a lightweight javascript toast component for laravel
It is using native javascript, Does not depend on any other component.

# Installation
### The recommended approach is to install the project through [Composer](https://getcomposer.org/).
```php
composer require laijim/simple-toast
```

### Add service provider declare to the providers array in config/app.php
```php
Laijim\SimpleToast\SimpleToastServiceProvider::class,
```

### (optional) Add facade declare to the facades array in config/app.php
```php
'SimpleToast' => Laijim\SimpleToast\Facades\SimpleToast::class,
```

# publish resource
```php
php artisan simple-toast:publish
```

#Instantiate

Controller:

```php
\SimpleToast::toast("Hi there!");
return view('test');
```

View (test.blade.php):

```html
<!doctype html>
<html>
<head></head>
<body>
</body>
@include('simpleToast::html')
</html>
```


> **Warning:** 
> Only modern browsers are supported.
