<?php
require "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Mettre à jour le statut de la dernière commande de l'utilisateur
        $update = $conn->prepare("UPDATE commandes 
            SET statut_commande = 'Payée' 
            WHERE id_utilisateur = :user_id 
            ORDER BY id_commande DESC LIMIT 1");

        $update->execute([
            ':user_id' => $_SESSION['user_id']
        ]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // En cas d'erreur, on continue quand même
        echo json_encode(['success' => false]);
    }
}
