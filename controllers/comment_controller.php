<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../models/comment_model.php';

if (!isset($_SESSION['user'])) {
    header("Location: connexion_controller.php");
    exit;
}

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texte = trim($_POST['commentaire']);
    if (!empty($texte)) {
        ajouterCommentaire($mysqli, $_SESSION['user']['id'], $texte);
        header("Location: livredor_controller.php");
        exit;
    } else {
        $message = "Le commentaire ne peut pas être vide.";
    }
}

require __DIR__ . '/../views/header.php';
require __DIR__ . '/../views/commentaire.php';
require __DIR__ . '/../views/footer.php';
