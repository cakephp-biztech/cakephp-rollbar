<?php

namespace CakeRollbar\Error\Middleware;

use Cake\Error\Middleware\ErrorHandlerMiddleware as CakeErrorHandlerMiddleware;
use Cake\Log\Log;

/**
 * Plugin for CakeRollbar
 */
class ErrorHandlerMiddleware extends CakeErrorHandlerMiddleware
{
    /**
     * {@inheritdoc}
     */
    protected function logException($request, $exception)
    {
        if (!$this->getConfig('log')) {
            return;
        }

        foreach ((array)$this->getConfig('skipLog') as $class) {
            if ($exception instanceof $class) {
                return;
            }
        }

        Log::error(
            $this->getMessage($request, $exception),
            compact('request', 'exception')
        );
    }
}
