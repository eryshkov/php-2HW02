<?php

require __DIR__ . '/autoload.php';

$articles = \App\Models\Article::findAll();

include __DIR__ . '/templates/news_admin.php';
