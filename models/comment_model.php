<?php
// Récupère tous les commentaires du plus récent au plus ancien
function getCommentaires($mysqli)
{
    $stmt = $mysqli->prepare("
        SELECT c.commentaire, c.date, u.login
        FROM commentaires c
        JOIN utilisateurs u ON c.id_utilisateur = u.id
        ORDER BY c.date DESC
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $commentaires = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $commentaires;
}

// Ajoute un commentaire
function ajouterCommentaire($mysqli, $id_utilisateur, $texte)
{
    $stmt = $mysqli->prepare("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, NOW())");
    $stmt->bind_param("si", $texte, $id_utilisateur);
    $stmt->execute();
    $stmt->close();
}
