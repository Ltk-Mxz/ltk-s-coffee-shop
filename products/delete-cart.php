<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    // Redirection vers la page d'accueil
    header('location: http://localhost/coffee-ltk');
    exit;
}

if (!isset($_SESSION['user_id'])) {
    // Redirection si l'utilisateur n'est pas connecté
    header("location: " . APPURL . "");
}

// Suppression de tous les articles du panier de l'utilisateur
$deleteAll = $conn->query("DELETE FROM panier WHERE id_utilisateur='$_SESSION[user_id]'");
$deleteAll->execute();

// Message de confirmation (optionnel)
$_SESSION['message'] = "Votre panier a été vidé avec succès";

// Redirection vers la page du panier
header("location: cart.php");
