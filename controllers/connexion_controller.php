<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../config/database.php';

// Message d'erreur
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (!empty($login) && !empty($password)) {
        // Vérifie si l'utilisateur existe
        $stmt = $mysqli->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        // Vérifie le mot de passe
        if ($user && password_verify($password, $user['password'])) {
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


require __DIR__ . '/../views/header.php';
require __DIR__ . '/../views/connexion.php';
require __DIR__ . '/../views/footer.php';
