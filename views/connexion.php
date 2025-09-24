<?php require __DIR__ . '/header.php'; ?>

<main class="container">
    <h2>Connexion</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="post" action="../controllers/connexion.php">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</main>

<?php require __DIR__ . '/footer.php'; ?>