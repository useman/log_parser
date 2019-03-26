<?php

require __DIR__ . '/vendor/autoload.php';

if (count($argv) < 2) {
    exit('usage: parser.php [file_name]' . PHP_EOL);
}

$config = require(__DIR__ . '/config/app.php');


$app = new App\App($argv[1], $config);

try {
    $app->parse();
}catch (\Exception $e) {
    echo 'Catch error -> ' . $e->getMessage() . PHP_EOL;
    exit($e->getCode());
}

try{
    $data = $app->getData();
}catch (\Exception $e) {
    echo 'Catch error -> ' . $e->getMessage() . PHP_EOL;
    exit($e->getCode());
}

echo $data . PHP_EOL;
