<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../models/utilisateurs_model.php';

$message = null;

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = inscrireUtilisateur($mysqli, $_POST);

    if ($result === true) {
        // Redirige vers le controller de connexion
        header("Location: connexion_controller.php");
        exit;
    } else {
        $message = $result;
    }
}

require __DIR__ . '/../views/header.php';
require __DIR__ . '/../views/inscription.php';
require __DIR__ . '/../views/footer.php';
