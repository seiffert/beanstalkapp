<?php

require_once __DIR__ . '/../autoload.php';

$factory = new \Beanstalk\BeanstalkFactory();
$beanstalk = $factory->create([
    'username' => 'seiffert',
    'accessToken' => '1d35889c5e26548aff763a37616c93a954463c7f1e15520468d4',
    'account' => 'seiffert',
    'debug' => true
]);

$repository = $beanstalk->createRepository(new \Beanstalk\Command\CreateRepository('test2', 'Test 2', 'orange', 'git'));

if ($repository instanceof \Beanstalk\Model\Repository) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
