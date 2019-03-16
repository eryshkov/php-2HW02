<?php

require __DIR__ . '/../autoload.php';

$articles = \App\Models\Article::getAllLast();

include __DIR__ . '/../templates/news_admin.php';
