<main class="container">
    <h2>Inscription</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="post" action="../controllers/inscription.php">
        <label>Login :</label>
        <input type="text" name="login" required>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>

        <label>Confirmer le mot de passe :</label>
        <input type="password" name="conf_password" required>

        <button type="submit">S'inscrire</button>
    </form>
</main>