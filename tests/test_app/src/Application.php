<?php

namespace CakeRollbar\TestApp;

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

class Application extends BaseApplication
{
    public function middleware($middlewareQueue)
    {
        return $middlewareQueue;
    }
}
