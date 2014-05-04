<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$tags = $beanstalk->findTags(TEST_REPOSITORY_ID);

if (0 < count($tags) && $tags[0] instanceof \Beanstalk\Model\Tag && TEST_TAG === $tags[0]->getName()) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
