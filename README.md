# Nova Tabs Field
[![Latest Version on Github](https://img.shields.io/packagist/v/lampdev/tabs.svg?style=flat)](https://packagist.org/packages/lampdev/tabs)

Simple [Laravel Nova](https://nova.laravel.com) Tabs field.

### Detail View

![Detail View GIF](docs/detail.gif)

## Installation

Install the package in a Laravel Nova project via Composer:

```bash
composer require lampdev/tabs
```

## Usage

The `Tabs` field provides a convenient interface to display tabs.

```php
use Lampdev\Tabs\Tabs;

public function fields(Request $request)
{
    return [
        ....

        Tabs::make('Name', [
            'Test 1' => 'message from test 1',
            'Test 2' => 'message from test 2',
            'Test 3' => 'message from test 3'
        ]),
    ];
}
```
