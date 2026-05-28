<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <?php include __DIR__ . '/../layout/header.php' ?>
    <main>
        <h1 id="title-page">Welcome to my Personal Blog</h1>
        <section>
            <?php include __DIR__ . "/../components/posts.php" ?>
        </section>
    </main>
    <?php include __DIR__ . '/../layout/footer.php' ?>
</body>
</html>