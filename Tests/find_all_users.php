<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$users = $beanstalk->findAllUsers();

if (0 < count($users) && $users[0] instanceof \Beanstalk\Model\User) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
