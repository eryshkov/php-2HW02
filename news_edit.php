<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    if (false === $article) {
        header('Location:' . '/news_admin.php');
        exit();
    }
}

include __DIR__ . '/templates/news_edit.php';