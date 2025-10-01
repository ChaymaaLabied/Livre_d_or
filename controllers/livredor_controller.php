<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../models/comment_model.php';

// Récupère tous les commentaires
$commentaires = getCommentaires($mysqli);

// Affichage
require __DIR__ . '/../views/header.php';
require __DIR__ . '/../views/livredor.php';
require __DIR__ . '/../views/footer.php';
