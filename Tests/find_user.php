<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$user = $beanstalk->findUser(TEST_USER_ID);

if ($user instanceof \Beanstalk\Model\User) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
