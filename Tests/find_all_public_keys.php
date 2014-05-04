<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$keys = $beanstalk->findAllPublicKeys();

if (0 < count($keys) && $keys[0] instanceof \Beanstalk\Model\PublicKey) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
