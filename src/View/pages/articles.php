<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="<?= url('assets/css/styles.css') ?>">
</head>
<body>
    <?php include __DIR__ . '/../layout/header.php' ?>
    <main>
        <h1 id="title-page">Articles!</h1>
        <?php $articleController->paginatedPosts($limit, $offset, $page) ?>
    </main>
    <?php include __DIR__ . '/../layout/footer.php' ?>
</body>
</html>