<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    if (false !== $article) {
        $article->delete();
        header('Location:' . '/news_admin.php?info=del_ok');
        exit();
    } else {
        header('Location:' . '/news_admin.php?info=find_err');
        exit();
    }
}

