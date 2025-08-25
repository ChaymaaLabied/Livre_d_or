<?php
session_start();
require 'models/utilisateur.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = connecterUtilisateur($mysqli, $_POST);

    if (is_array($result)) {
        // Connexion réussie → stocker les infos en session
        $_SESSION['id'] = $result['id'];
        $_SESSION['login'] = $result['login'];

        header("Location: index.php"); // redirection vers accueil
        exit;
    } else {
        // Erreur → stocker message
        $message = $result;
    }
}

require 'views/header.php';
require 'views/connexion.php';
require 'views/footer.php';
