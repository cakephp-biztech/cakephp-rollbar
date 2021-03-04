# Rollbar plugin for CakePHP 3.x

CakePHP plugin integration for Rollbar error tracking tool.

## Requirements

- CakePHP 3.5 or greater
- PHP 5.6 or greater
- And [Rollbar](https://rollbar.com/) account

## Installation

1. You can install this plugin into your CakePHP application using [composer](https://getcomposer.org)

    ```
    composer require cakephp-biztech/cake-rollbar
    ```

2. After installation, [load the plugin](https://book.cakephp.org/3/en/plugins.html#loading-a-plugin)
    ```php
    // src/Application.php
    Plugin::load('CakeRollbar');
    ```
    Or, you can load the plugin using the shell command:
    ```sh
    bin/cake plugin load CakeRollbar
    ```

## Setup

Create a new Rollbar project and get `post_server_item` access token by going to your project's settings. And set below config array into your `config/app.php` file.

```php
// config/app.php
return [
    'Rollbar' => [
        'access_token' => env('ROLLBAR_POST_SERVER_ITEM_ACCESS_TOKEN', null),
        'environment' => env('APP_ENV'),
    ]
];
```

All set! :tada:

This plugin will capture and send all the notices, errors, exceptions, etc. to Rollbar for you to solve them.
