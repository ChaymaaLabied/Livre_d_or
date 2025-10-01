<main>
    <h2>Connexion</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?= $message ?></p>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>controllers/connexion_controller.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" name="login" id="login" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Se connecter</button>
    </form>
</main>