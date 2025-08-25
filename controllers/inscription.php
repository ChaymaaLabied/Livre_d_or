<?php
require '../config/database.php';
require '../models/utilisateurs.php';
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

require '../views/header.php';
require '../views/inscription.php';
require '../views/footer.php';
