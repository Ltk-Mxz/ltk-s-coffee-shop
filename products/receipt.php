<?php
session_start();
require "../config/config.php";
if (!isset($_SESSION['user_id'])) {
    header("location: ../index.php");
    exit;
}

// Updated user query with correct column name (nom_utilisateur)
$userStmt = $conn->prepare("SELECT nom_utilisateur, email FROM utilisateurs WHERE id_utilisateur = :user_id");
$userStmt->execute([':user_id' => $_SESSION['user_id']]);
$userData = $userStmt->fetch(PDO::FETCH_OBJ);
if (!$userData) {
    die('Utilisateur non trouvé.');
}

// Retrieve order items from panier
$productsStmt = $conn->prepare("SELECT nom_produit, quantite, prix FROM panier WHERE id_utilisateur = :user_id");
$productsStmt->execute([':user_id' => $_SESSION['user_id']]);
$products = $productsStmt->fetchAll(PDO::FETCH_OBJ);

// Compute totals
$total = 0;
foreach ($products as $product) {
    $total += $product->quantite * $product->prix;
}
$livraison = 1000;
$reduction = 500;
$grandTotal = $total + $livraison - $reduction;

// Generate an order number (for display only)
$orderNumber = date('Ymd') . rand(1000, 9999);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Reçu de Commande</title>
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/style.css">
    <!-- ...existing code (Bootstrap CSS inclusion if needed)... -->
</head>

<body>
    <?php require "../includes/header.php"; ?>
    <section class="container" style="margin-top: 100px;">
        <div class="card">
            <div class="card-header text-center">
                <h2 style="color: #000;">Récapitulatif de votre commande</h2>
            </div>
            <div class="card-body">
                <p><strong>Numéro de commande:</strong> #<?php echo $orderNumber; ?></p>
                <p><strong>Date:</strong> <?php echo date('d/m/Y'); ?></p>
                <h3>Informations Client</h3>
                <p><strong>Nom:</strong> <?php echo htmlspecialchars($userData->nom_utilisateur); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($userData->email); ?></p>
                <h3>Détails de la commande</h3>
                <table border="1" cellpadding="10" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product->nom_produit); ?></td>
                                <td><?php echo $product->quantite; ?></td>
                                <td><?php echo number_format($product->prix, 2); ?> FCFA</td>
                                <td><?php echo number_format($product->quantite * $product->prix, 2); ?> FCFA</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div style="margin-top:20px;">
                    <p><strong>Sous-total:</strong> <?php echo number_format($total, 2); ?> FCFA</p>
                    <p><strong>Livraison:</strong> <?php echo number_format($livraison, 2); ?> FCFA</p>
                    <p><strong>Réduction:</strong> -<?php echo number_format($reduction, 2); ?> FCFA</p>
                    <hr>
                    <p><strong>Total:</strong> <?php echo number_format($grandTotal, 2); ?> FCFA</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="generate-receipt.php" class="btn btn-primary" style="background-color: #000; color: #fff; padding: 10px 20px; text-decoration: none;">
                    Télécharger le reçu (PDF)
                </a>
            </div>
        </div>
    </section>
    <?php require "../includes/footer.php"; ?>
</body>

</html>