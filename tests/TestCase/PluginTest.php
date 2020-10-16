<?php

namespace CakeRollbar\Test\TestCase;

use CakeRollbar\Plugin;
use CakeRollbar\TestApp\Application;
use Cake\TestSuite\IntegrationTestCase;

class PluginTest extends IntegrationTestCase
{
    public function testBootstrap()
    {
        $plugin = new Plugin();
        $app = new Application(CONFIG);

        $plugin->bootstrap($app);
        $totalPlugins = $app->getPlugins();

        $this->assertCount(1, $totalPlugins);
        $this->assertSame('CakeRollbar', $totalPlugins->get('CakeRollbar')->getName());
    }
}
