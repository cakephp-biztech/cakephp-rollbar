<?php

namespace CakeRollbar\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public function testItThrowsNotice()
    {
        $this->get('/pages/sum');
    }
}
