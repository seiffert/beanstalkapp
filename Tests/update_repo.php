<?php

require_once __DIR__ . '/../autoload.php';

$factory = new \Beanstalk\BeanstalkFactory();
$beanstalk = $factory->create([
    'username' => 'seiffert',
    'accessToken' => '1d35889c5e26548aff763a37616c93a954463c7f1e15520468d4',
    'account' => 'seiffert'
]);

$beanstalk->updateRepository(556269, new \Beanstalk\Command\UpdateRepository('Test', 'red'));

print_r($beanstalk->findAllRepositories());

$beanstalk->updateRepository(556269, new \Beanstalk\Command\UpdateRepository('test-repository', 'blue'));
