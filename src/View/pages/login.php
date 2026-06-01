<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= url('assets/css/styles.css') ?>">
</head>
<body>
    <main id="login-container">
        <h1 id="title-page">Login - Enter</h1>
        <section id="login-section">
            <p>Enter your credentials to access the admin area.</p>
            <form action="<?= url($_SERVER['PHP_SELF']) ?>" method="POST" id="login-form">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
    
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
    
                <button type="submit">Login</button>
            </form>
        </section>
    </main>
</body>
</html>