<?php

namespace CakeRollbar\Log\Engine;

use CakeRollbar\CakeRollbar;
use Cake\Log\Engine\BaseLog;

class RollbarLog extends BaseLog
{
    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        CakeRollbar::logException(
            $level,
            $message,
            $context
        );
    }
}
