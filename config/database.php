<?php
$mysqli = new mysqli("localhost", "root", "", "livreor");
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}
