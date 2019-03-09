<?php

require __DIR__ . '/autoload.php';

$config = \App\Config::load();
var_dump($config->data['db']['host']);
$config2 = \App\Config::load();

if ($config === $config2) {
    echo 'Singletone works';
} else {
    echo 'Singletone error';
}
die();

$articles = \App\Models\Article::getAllLast(3);

include __DIR__ . '/templates/news.php';
