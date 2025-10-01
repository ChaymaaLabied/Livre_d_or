<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../models/utilisateurs_model.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (!empty($login) && !empty($password)) {
        $user = verifierConnexion($mysqli, $login, $password);

        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login']
            ];
            header("Location: ../index.php");
            exit;
        } else {
            $message = "Login ou mot de passe incorrect.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}

// Affichage des vues
require __DIR__ . '/../views/header.php';
require __DIR__ . '/../views/connexion.php';
require __DIR__ . '/../views/footer.php';
