<?php
function inscrireUtilisateur($mysqli, $data)
{
    $login = htmlspecialchars(trim($data['login']));
    $password = htmlspecialchars(trim($data['password']));
    $conf_password = htmlspecialchars(trim($data['conf_password']));

    if ($password !== $conf_password) {
        return "Les mots de passe ne correspondent pas.";
    }

    $login = mysqli_real_escape_string($mysqli, $login);

    $check = $mysqli->query("SELECT * FROM utilisateurs WHERE login = '$login'");
    if ($check->num_rows > 0) {
        return "Ce login est déjà pris.";
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (!$mysqli->query("INSERT INTO utilisateurs (login, password) VALUES ('$login', '$passwordHash')")) {
        return "Erreur SQL : " . $mysqli->error;
    }

    return true;
}
