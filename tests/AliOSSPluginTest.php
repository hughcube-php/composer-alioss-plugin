<?php

namespace HughCube\Composer\AliOSSPlugin\Tests;

use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Plugin\PluginInterface;
use HughCube\Composer\AliOSSPlugin\AliOSSPlugin;
use PHPUnit\Framework\TestCase;

class AliOSSPluginTest extends TestCase
{
    public function testInstance()
    {
        $plugin = new AliOSSPlugin();

        $this->assertInstanceOf(PluginInterface::class, $plugin);
        $this->assertInstanceOf(EventSubscriberInterface::class, $plugin);
    }
}
