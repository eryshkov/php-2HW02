<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">

    <title>Site</title>
</head>
<body>
<div class="container">
    <div class="row" id="menu">
        <div class="col">
            <a href="/" class="btn btn-outline-success">Новости</a>
            <a href="/tests/" class="btn btn-outline-success">Тесты</a>
            <a href="/news_admin.php" class="btn btn-outline-success">Админ-Новости</a>
        </div>
    </div>
    <?php
    foreach ($articles as $article) {
        ?>
        <div class="row mb-1">
            <div class="col-auto">
                <a class="btn btn-outline-info" href="/news_admin.php?edit=<?php echo $article->id; ?>">✎</a>
            </div>
            <div class="col-auto">
                <a class="btn btn-outline-danger" href="/news_admin.php?del=<?php echo $article->id; ?>">X</a>
            </div>
            <div class="col">
                <a href="/article.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>