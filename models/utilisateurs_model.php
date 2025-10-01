<?php
// Inscrit un utilisateur
function inscrireUtilisateur($mysqli, $data)
{
    $login = trim($data['login']);
    $password = trim($data['password']);
    $conf_password = trim($data['conf_password']);

    if ($password !== $conf_password) {
        return "Les mots de passe ne correspondent pas.";
    }

    // Vérifie si le login existe déjà
    $stmt = $mysqli->prepare("SELECT id FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        return "Ce login est déjà pris.";
    }
    $stmt->close();

    // Hash le mot de passe et insère en BDD
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $passwordHash);

    if (!$stmt->execute()) {
        return "Erreur SQL : " . $stmt->error;
    }

    $stmt->close();
    return true;
}

// Récupère un utilisateur par son login
function getUtilisateurByLogin($mysqli, $login)
{
    $stmt = $mysqli->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}
