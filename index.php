<?php

require __DIR__ . '/autoload.php';

$config = new \App\Config();
var_dump($config->data['db']['host']);
die();

$articles = \App\Models\Article::getAllLast(3);

include __DIR__ . '/templates/news.php';
