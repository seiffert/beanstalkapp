<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$beanstalk->updateUser(TEST_USER_ID, new \Beanstalk\Command\UpdateUser(null, 'Test Name', null, null));

$user = $beanstalk->findUser(TEST_USER_ID);
if ($user && 'Test Name' === $user->getName()) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}

$beanstalk->updateUser(
    TEST_USER_ID,
    new \Beanstalk\Command\UpdateUser(null, TEST_USER_NAME, null, null)
);
