<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$repository = $beanstalk->createRepository(new \Beanstalk\Command\CreateRepository('test2', 'Test 2', 'orange', 'git'));

if ($repository instanceof \Beanstalk\Model\Repository) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
