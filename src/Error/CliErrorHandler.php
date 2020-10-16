<?php
namespace CakeRollbar\Error;

use Cake\Error\BaseErrorHandler;

class CliErrorHandler extends BaseErrorHandler
{
    /**
     * {@inheritDoc}
     */
    protected function _displayError($error, $debug)
    {
        debug('There has been an error from cli!');
    }

    /**
     * {@inheritDoc}
     */
    protected function _displayException($exception)
    {
        debug('There has been an exception from cli!');
    }
}
