<?php
namespace CakeRollbar\Error;

use CakeRollbar\CakeRollbar;
use Cake\Error\BaseErrorHandler;

class HttpErrorHandler extends BaseErrorHandler
{
    /**
     * {@inheritDoc}
     */
    protected function _displayError($error, $debug)
    {
        CakeRollbar::logError($error);
    }

    /**
     * {@inheritDoc}
     */
    protected function _displayException($exception)
    {
        // Nothing to do here, since `_displayException` is abstract method we have to implement this into this class
        // Everything related to exceptions are handled by `ErrorHandlerMiddleware` as of CakePHP 3.*
    }
}
