<?php

namespace Rollbar\Test;

use Cake\TestSuite\IntegrationTestCase;
use Rollbar\Plugin;
use TestApp\Application;

class PluginTest extends IntegrationTestCase
{
    public function testBootstrap()
    {
        $plugin = new Plugin();
        $app = new Application(CONFIG);

        $plugin->bootstrap($app);
        $totalPlugins = $app->getPlugins();

        $this->assertCount(1, $totalPlugins);
        $this->assertSame('Rollbar', $totalPlugins->get('Rollbar')->getName());
    }
}
