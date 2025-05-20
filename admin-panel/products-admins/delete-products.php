<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMINURL . "/admins/login-admins.php");
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // delete the image
    $select = $conn->query("SELECT * FROM produits WHERE id_produit='$id'");
    $select->execute();
    $image = $select->fetch(PDO::FETCH_OBJ);
    unlink("images/" . $image->image_produit);

    // Delete related rows in panier to prevent foreign key constraint violation
    $deletePanier = $conn->query("DELETE FROM panier WHERE id_produit='$id'");
    $deletePanier->execute();

    // Delete the product
    $delete = $conn->query("DELETE FROM produits WHERE id_produit='$id'");
    $delete->execute();

    header("location: show-products.php");
}
