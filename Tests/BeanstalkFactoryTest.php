<?php

namespace Beanstalk\Tests;

use Beanstalk\BeanstalkFactory;

class BeanstalkFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $this->markTestSkipped();

        $factory = new BeanstalkFactory();

        $factory->create([]);
    }
}
