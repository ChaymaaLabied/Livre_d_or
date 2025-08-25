<?php
function inscrireUtilisateur($mysqli, $data)
{
    $login = htmlspecialchars(trim($data['login']));
    $password = htmlspecialchars(trim($data['password']));
    $conf_password = htmlspecialchars(trim($data['conf_password']));

    // Vérification mots de passe
    if ($password !== $conf_password) {
        return "Les mots de passe ne correspondent pas.";
    }

    // Échapper le login pour SQL
    $login = mysqli_real_escape_string($mysqli, $login);

    // Vérifier si le login existe déjà
    $check = $mysqli->query("SELECT * FROM utilisateurs WHERE login = '$login'");
    if ($check->num_rows > 0) {
        return "Ce login est déjà pris.";
    }

    // Hash du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertion
    $mysqli->query("INSERT INTO utilisateurs (login, password) VALUES ('$login', '$passwordHash')");
    return true;
}
