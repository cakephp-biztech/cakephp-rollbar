<?php

namespace CakeRollbar;

use CakeRollbar\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Core\BasePlugin;
use Cake\Error\Middleware\ErrorHandlerMiddleware as CakeErrorHandlerMiddleware;

/**
 * Plugin for CakeRollbar
 */
class Plugin extends BasePlugin
{
    /**
     * {@inheritDoc}
     */
    public function middleware($middleware)
    {
        $middleware = parent::middleware($middleware);

        $middleware->insertAfter(
            CakeErrorHandlerMiddleware::class,
            new ErrorHandlerMiddleware()
        );

        return $middleware;
    }
}
