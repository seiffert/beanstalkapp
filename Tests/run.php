<?php

$dh = opendir(__DIR__);

while (false !== $file = readdir($dh)) {
    if (0 !== strpos($file, '.')
        && !in_array($file, ['config.php', 'config.php.dist', 'run.php', 'setup_beanstalk.php'])) {

        try {
            echo '#### ', $file, PHP_EOL;
            require_once __DIR__ . DIRECTORY_SEPARATOR . $file;
            echo PHP_EOL, PHP_EOL;
        } catch (Exception $e) {
            echo 'ERROR: ', $e->getMessage(), PHP_EOL;
            echo $e->getTraceAsString(), PHP_EOL, PHP_EOL;
        }
    }
}

closedir($dh);
