<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$repository = $beanstalk->findRepository(TEST_REPOSITORY_ID);

if ($repository instanceof \Beanstalk\Model\Repository) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
