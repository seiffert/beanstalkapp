<?php

require_once __DIR__ . '/config.php';

$factory = new \Beanstalk\BeanstalkFactory();

return $factory->create([
    'username' => BEANSTALK_USERNAME,
    'accessToken' => BEANSTALK_ACCESS_TOKEN,
    'account' => BEANSTALK_ACCOUNT,
    'debug' => DEBUG,
]);
