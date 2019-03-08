<?php

require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findById(1);
$article->insert();
die();

$articles = \App\Models\Article::getAllLast(3);

include __DIR__ . '/templates/news.php';
