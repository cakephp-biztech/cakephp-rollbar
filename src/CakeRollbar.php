<?php
namespace CakeRollbar;

use Cake\Core\Configure;
use Rollbar\Payload\Level;
use Rollbar\Rollbar;

class CakeRollbar
{
    /**
     * Initialize rollbar configuration
     *
     * @return void
     */
    public static function init()
    {
        if (empty(Configure::read('Rollbar.access_token'))) {
            throw new \Exception('You must have to pass your Rollbar access_token', 1);
        }

        Rollbar::init(Configure::read('Rollbar'));
    }

    /**
     * Logs error into Rollbar.
     *
     * @param  array $error An array of error data.
     * @return void
     */
    public static function logError($error)
    {
        $level = static::mapLevel($error['error']);

        Rollbar::log($level, $error['description'], $error);
    }

    /**
     * Logs exception into Rollbar.
     *
     * @param  string $level Log level.
     * @param  string $message Exception message.
     * @param  array $context Context data of exception.
     * @return void
     */
    public static function logException($level, $message, $context)
    {
        Rollbar::log($level, $message, $context);
    }

    /**
     * Maps error logging level with Rollbar.
     *
     * @param  string $level Error level.
     * @return string
     */
    private static function mapLevel($level)
    {
        if ($level === 'Notice') {
            return Level::WARNING;
        }

        return Level::ERROR;
    }
}
