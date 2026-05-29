<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="<?= url('assets/css/styles.css') ?>">
</head>
<body>
    <?php include __DIR__ . '/../layout/header.php' ?>
    <main>
        <article>
            <?php 
                $articleController->showPost($id);
            ?>
        </article>
    </main>
    <?php include __DIR__ . '/../layout/footer.php' ?>
</body>
</html>