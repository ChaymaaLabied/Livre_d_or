<?php
require __DIR__ . '/views/header.php';
?>

<main>
    <h1>Bienvenue sur le Livre d'Or</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <p>Bonjour, <strong><?= htmlspecialchars($_SESSION['user']['login']) ?></strong> ! Vous êtes connecté.</p>
        <p>
            Vous pouvez aller directement sur le
            <a href="controllers/livredor_controller.php">Livre d'or</a>
            pour voir ou poster des commentaires.
        </p>
    <?php else: ?>
        <p>
            Vous pouvez
            <a href="controllers/inscription_controller.php">vous inscrire</a>
            ou
            <a href="controllers/connexion_controller.php">vous connecter</a>
            pour laisser un message.
        </p>
    <?php endif; ?>
</main>

<?php
require __DIR__ . '/views/footer.php';
?>