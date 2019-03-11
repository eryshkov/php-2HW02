<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['action'])) {
    switch (true) {
        case 'del' === $_GET['action']:
            if (isset($_GET['id'])) {
                $article = \App\Models\Article::findById($_GET['id']);
                if (false !== $article) {
                    $article->delete();
                }
            }
            break;
    }
}

$articles = \App\Models\Article::getAllLast();

include __DIR__ . '/templates/news_admin.php';
