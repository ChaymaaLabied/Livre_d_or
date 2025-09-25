<?php
session_start();
require __DIR__ . '/../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    if (!empty($login) && !empty($password)) {
        // Vérifie si l'utilisateur existe je crois que block dois etre dns le model 
        $stmt = $mysqli->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // si la Connexion réussie alorrs on stocke l’utilisateur en session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login']
            ];
            header("Location: ../index.php");
            exit;
        } else {
            $message = "Login ou mot de passe incorrect.";
        }

        $stmt->close();
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}

// Si erreur alors afficher le formulaire avec le message
require __DIR__ . '/../views/connexion.php';
