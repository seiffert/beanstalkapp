<?php

require_once __DIR__ . '/../autoload.php';
$beanstalk = require __DIR__ . '/setup_beanstalk.php';

$beanstalk->updateRepository(TEST_REPOSITORY_ID, new \Beanstalk\Command\UpdateRepository('Test', 'red'));

$repositories = $beanstalk->findAllRepositories();
if (0 < count($repositories) && 'red' === $repositories[0]->getColorLabel() && 'Test' === $repositories[0]->getTitle()) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}

$beanstalk->updateRepository(
    TEST_REPOSITORY_ID,
    new \Beanstalk\Command\UpdateRepository(TEST_REPOSITORY_TITLE, TEST_REPOSITORY_COLOR)
);
