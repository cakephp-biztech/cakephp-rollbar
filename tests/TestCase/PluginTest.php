<?php

namespace CakeRollbar\Test\TestCase;

use CakeRollbar\Error\Middleware\ErrorHandlerMiddleware as CakeRollbarErrorHandlerMiddleware;
use CakeRollbar\Plugin;
use CakeRollbar\TestApp\Application;
use Cake\Error\Middleware\ErrorHandlerMiddleware as CakeErrorHandlerMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PluginTest extends TestCase
{
    use IntegrationTestTrait;

    public function testBootstrap()
    {
        $plugin = new Plugin();
        $app = new Application(CONFIG);

        $plugin->bootstrap($app);
        $totalPlugins = $app->getPlugins();

        $this->assertCount(1, $totalPlugins);
        $this->assertSame('CakeRollbar', $totalPlugins->get('CakeRollbar')->getName());
    }

    public function testMiddleware()
    {
        $app = new Application(CONFIG);
        $middleware = new MiddlewareQueue();
        $appMiddleware = $app->middleware($middleware);

        $plugin = new Plugin();
        $pluginMiddleware = $plugin->middleware($appMiddleware);

        $this->assertSame(CakeErrorHandlerMiddleware::class, get_class($pluginMiddleware->get(0)));
        $this->assertSame(CakeRollbarErrorHandlerMiddleware::class, get_class($pluginMiddleware->get(1)));
    }
}
