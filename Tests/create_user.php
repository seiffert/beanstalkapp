<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$user = $beanstalk->createUser(
    new \Beanstalk\Command\CreateUser('testuser', 'test@example.com', 'Tester Test', 'Password')
);

if ($user instanceof \Beanstalk\Model\User) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}

$beanstalk->deleteUser($user->getId());
