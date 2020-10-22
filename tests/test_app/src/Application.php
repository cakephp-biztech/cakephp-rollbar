<?php

namespace CakeRollbar\TestApp;

use Cake\Core\Configure;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\RoutingMiddleware;

class Application extends BaseApplication
{
    public function middleware($middlewareQueue)
    {
        $middlewareQueue
            ->add(new ErrorHandlerMiddleware(Configure::read('Error.exceptionRenderer')))
            ->add(new RoutingMiddleware($this));

        return $middlewareQueue;
    }
}
