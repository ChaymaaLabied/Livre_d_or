<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../models/utilisateurs.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = inscrireUtilisateur($mysqli, $_POST);
    if ($result === true) {
        header("Location: index.php?page=connexion");
        exit;
    } else {
        $message = $result;
    }
}

require __DIR__ . '/../views/header.php';
require __DIR__ . '/../views/inscription.php';
require __DIR__ . '/../views/footer.php';
