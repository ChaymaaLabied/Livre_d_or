<?php
require __DIR__ . '/../config/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Durée d'expiration : 1 heure (3600 secondes)
$inactive = 3600;

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $inactive) {
    // Déconnexion automatique après inactivité
    session_unset();
    session_destroy();
}

// Met à jour le timestamp de la dernière activité
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>style/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Mon Livre d'or</h1>
        <nav>
            <a href="<?= BASE_URL ?>index.php">Accueil</a>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="<?= BASE_URL ?>controllers/deconnexion_controller.php">Déconnexion</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>controllers/inscription_controller.php">Inscription</a>
                <a href="<?= BASE_URL ?>controllers/connexion_controller.php">Connexion</a>
            <?php endif; ?>

            <a href="<?= BASE_URL ?>controllers/livredor_controller.php">Livre d'or</a>
        </nav>
    </header>