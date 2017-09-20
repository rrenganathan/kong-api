<?php

namespace Smalot\Kong\Tests\Units;

use mageekguy\atoum;

/**
 * Class ServiceFactory
 *
 * @package Smalot\Kong\Tests\Units
 */
class ServiceFactory extends atoum\test
{

    public function testFactory()
    {
        $factory = new \Smalot\Kong\ServiceFactory();

        $service = $factory->get('api');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Api');
        $service = $factory->get('certificate');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Certificate');
        $service = $factory->get('consumer');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Consumer');
        $service = $factory->get('plugin');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Plugin');
        $service = $factory->get('sni');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Sni');
        $service = $factory->get('target');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Target');
        $service = $factory->get('upstream');
        $this->assert->object($service)->isInstanceOf('\Smalot\Kong\Services\Upstream');
    }

    public function testFactoryFail()
    {
        $factory = new \Smalot\Kong\ServiceFactory();

        $this->assert->exception(
          function () use ($factory) {
              $factory->get('wrong-service');
          }
        )->hasMessage(
          'The service "wrong-service" is not available. Pick one among "api", "certificate", "consumer", "plugin", "sni", "target", "upstream".'
        );
    }
}
