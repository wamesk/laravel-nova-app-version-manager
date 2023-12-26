# Laravel Nova App Version Manager

## Installation

```shell
composer require wamesk/laravel-nova-app-version-manager
```

Add **LaravelNovaAppVersionManagerProvider.php** in app.php.

```php
'providers' => [
    ...
    LaravelNovaAppVersionManager\LaravelNovaAppVersionManagerProvider::class,
    ...
],
```

Next step is to publish all translations and nova resource. So you can change them to fit your needs.

```shell
php artisan vendor:publish --provider="Wame\LaravelNovaAppVersionManager\LaravelNovaAppVersionManagerProvider"
```

## Translations

You can find translations here.

You can see now it has limited translations being the folders like "en"

You can create new translations by creating another folder with app_version.php inside.

Also, you can edit existing translations if you need.

```
resourses/
    └── lang/
        └── vendor/
            └── laravel-app-version/
                ├── sk/
                │   └── app_version.php
                ├── cz/
                │   └── app_version.php
                └── en/
                    └── app_version.php
```
