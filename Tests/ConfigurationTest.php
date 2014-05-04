<?php

namespace Beanstalk\Tests;

use Beanstalk\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testMissingMandatoryOptions()
    {
        $this->setExpectedException('Beanstalk\Exception\ConfigurationException');
        new Configuration([]);
    }

    public function testSuccess()
    {
        $username = 'tester';
        $account = 'test';
        $accessToken = 'foobar';

        $config = new Configuration(['username' => $username, 'account' => $account, 'accessToken' => $accessToken]);

        $this->assertSame($username, $config->getUsername());
        $this->assertSame($account, $config->getAccount());
        $this->assertSame($accessToken, $config->getAccessToken());
    }
}
