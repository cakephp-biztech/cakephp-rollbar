<?php

use CakeRollbar\CakeRollbar;
use CakeRollbar\Error\HttpErrorHandler;
use CakeRollbar\Log\Engine\RollbarLog;
use Cake\Core\Configure;
use Cake\Log\Log;

require __DIR__ . '/constants.php';

$isCli = PHP_SAPI === 'cli';

if ($isCli) {
    // TODO: Add console error handler
    // (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new HttpErrorHandler(Configure::read('Error')))->register();
}

$errorLogConfig = Log::getConfig('error');
$errorLogConfig['className'] = RollbarLog::class;
Log::drop('error');
Log::setConfig('error', $errorLogConfig);

CakeRollbar::init();
