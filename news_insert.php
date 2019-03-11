<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['action']) && 'new' === $_GET['action']) {
    $article = \App\Models\Article::findById($_GET['id']);
    if (false !== $article) {
        $article->delete();
    }
}

$articles = \App\Models\Article::getAllLast();

include __DIR__ . '/templates/news_admin.php';
