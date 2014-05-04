<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$repositories = $beanstalk->findAllRepositories();

if (0 < count($repositories) && $repositories[0] instanceof \Beanstalk\Model\Repository) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
