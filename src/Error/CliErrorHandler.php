<?php
namespace CakeRollbar\Error;

use Cake\Error\BaseErrorHandler;

class CliErrorHandler extends BaseErrorHandler
{
    public function _displayError($error, $debug)
    {
        debug('There has been an error from cli!');exit;
    }

    public function _displayException($exception)
    {
        debug('There has been an exception from cli!');exit;
    }
}
