<?php

require_once __DIR__ . '/../autoload.php';

$factory = new \Beanstalk\BeanstalkFactory();
$beanstalk = $factory->create([
    'username' => 'seiffert',
    'accessToken' => '1d35889c5e26548aff763a37616c93a954463c7f1e15520468d4',
    'account' => 'seiffert'
]);

$branches = $beanstalk->findBranches(556269);

if (0 < count($branches) && $branches[0] instanceof \Beanstalk\Model\Branch && 'master' === $branches[0]->getName()) {
    echo 'OK', PHP_EOL;
} else {
    echo 'NOT OK', PHP_EOL;
}
