<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$branches = $beanstalk->findBranches(556269);

if (0 < count($branches) && $branches[0] instanceof \Beanstalk\Model\Branch && 'master' === $branches[0]->getName()) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
