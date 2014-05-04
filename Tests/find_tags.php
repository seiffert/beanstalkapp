<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$tags = $beanstalk->findTags(556269);

if (0 < count($tags) && $tags[0] instanceof \Beanstalk\Model\Tag && 'First' === $tags[0]->getName()) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
