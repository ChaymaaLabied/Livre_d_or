<main>
    <h2>Inscription</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?= $message ?></p>
    <?php endif; ?>

    <form action="../controllers/inscription_controller.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" name="login" id="login" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <label for="conf_password">Confirmer le mot de passe :</label>
        <input type="password" name="conf_password" id="conf_password" required>

        <button type="submit">S’inscrire</button>
    </form>

</main>