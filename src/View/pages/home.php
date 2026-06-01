<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= url('assets/css/styles.css') ?>">
    <style>
        .read-more {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            color: #c20000;
            text-decoration: none;
            border-radius: 5px;
        }
        .read-more:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../layout/header.php' ?>
    <main>
        <h1 id="title-page">Welcome to my Personal Blog</h1>
        <section>
            <article>
                <h2>Recent Posts</h2>
                <?php 
                    for($x = 6; $x > 0; $x--) {
                        $articleController->showRecentPosts($x);
                    }
                ?>
                <a href="<?= url('articles/') ?>" class="read-more">
                    READ MORE ARTICLES
                </a>
            </article>
        </section>
    </main>
    <?php include __DIR__ . '/../layout/footer.php' ?>
</body>
</html>