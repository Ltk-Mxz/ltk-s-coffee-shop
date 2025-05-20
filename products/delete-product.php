<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SESSION['user_id'])) {
    // Redirection si l'utilisateur n'est pas connecté
    header("location: " . APPURL . "");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Suppression d'un article spécifique du panier
    $delete = $conn->query("DELETE FROM panier WHERE id_panier='$id'");
    $delete->execute();

    // Message de confirmation (optionnel)
    $_SESSION['message'] = "L'article a été retiré du panier";

    // Redirection vers la page du panier
    header("location: cart.php");
}
