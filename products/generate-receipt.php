<?php
ob_start(); // <-- NEW: Start output buffering immediately
// Désactiver la mise en cache
ini_set('zlib.output_compression', 'Off');

// Start session avant tout
session_start();

// Vérification de l'authentification
if (!isset($_SESSION['user_id'])) {
    header("location: ../index.php");
    exit;
}

// Inclure les fichiers nécessaires
require "../config/config.php";
require_once('../tcpdf/vendor/tecnickcom/tcpdf/tcpdf.php');

// Nettoyer tous les buffers de sortie
while (ob_get_level()) {
    ob_end_clean();
}

try {
    // Clean any previous output
    if (ob_get_length()) {
        ob_clean();
    }

    // Set headers for PDF download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="recu_commande_' . date('Ymd') . rand(1000, 9999) . '.pdf"');
    header('Cache-Control: private, no-cache, no-store, must-revalidate');
    header('Pragma: public');
    header('Expires: 0');

    // Récupération des données utilisateur
    $user_id = $_SESSION['user_id'];
    $user = $conn->prepare("SELECT nom, prenom, email FROM utilisateurs WHERE id_utilisateur = :user_id");
    $user->execute([':user_id' => $user_id]);
    $userData = $user->fetch(PDO::FETCH_OBJ);

    if (!$userData) {
        throw new Exception('Utilisateur non trouvé');
    }

    // Création du PDF
    class MYPDF extends TCPDF
    {
        public function Header()
        {
            $image_file = K_PATH_IMAGES . 'logo.jpg';
            $this->Image($image_file, 10, 10, 30);
            $this->SetFont('helvetica', 'B', 20);
            $this->Cell(0, 15, 'Coffee LTK - Reçu de commande', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        }
    }

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator('Coffee LTK');
    $pdf->SetTitle('Reçu de commande');
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->AddPage();

    // Contenu
    $pdf->SetFont('helvetica', '', 12);

    // Numéro et date de commande
    $orderNumber = date('Ymd') . rand(1000, 9999);
    $pdf->Cell(0, 10, 'Numéro de commande: #' . $orderNumber, 0, 1);
    $pdf->Cell(0, 10, 'Date: ' . date('d/m/Y'), 0, 1);

    // Informations client (avec vérification)
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Informations client:', 0, 1);
    $pdf->Cell(0, 10, 'Nom complet: ' . htmlspecialchars($userData->prenom . ' ' . $userData->nom), 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . htmlspecialchars($userData->email), 0, 1);

    // Détails des produits
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(80, 10, 'Produit', 1);
    $pdf->Cell(30, 10, 'Quantité', 1);
    $pdf->Cell(40, 10, 'Prix unitaire', 1);
    $pdf->Cell(40, 10, 'Total', 1);
    $pdf->Ln();

    // Récupération des produits
    $products_query = $conn->prepare("SELECT nom_produit, quantite, prix FROM panier WHERE id_utilisateur = :user_id");
    $products_query->execute([':user_id' => $user_id]);
    $products = $products_query->fetchAll(PDO::FETCH_OBJ);

    $total = 0;
    $pdf->SetFont('helvetica', '', 12);

    foreach ($products as $product) {
        $subtotal = $product->quantite * $product->prix;
        $pdf->Cell(80, 10, htmlspecialchars($product->nom_produit), 1);
        $pdf->Cell(30, 10, $product->quantite, 1);
        $pdf->Cell(40, 10, number_format($product->prix, 2) . ' FCFA', 1);
        $pdf->Cell(40, 10, number_format($subtotal, 2) . ' FCFA', 1);
        $pdf->Ln();
        $total += $subtotal;
    }

    // Totaux
    $pdf->Ln(10);
    $pdf->Cell(110);
    $pdf->Cell(40, 10, 'Sous-total:', 0);
    $pdf->Cell(40, 10, number_format($total, 2) . ' FCFA', 0);
    $pdf->Ln();
    $pdf->Cell(110);
    $pdf->Cell(40, 10, 'Livraison:', 0);
    $pdf->Cell(40, 10, '5.00 FCFA', 0);
    $pdf->Ln();
    $pdf->Cell(110);
    $pdf->Cell(40, 10, 'Réduction:', 0);
    $pdf->Cell(40, 10, '-1.50 FCFA', 0);
    $pdf->Ln();
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(110);
    $pdf->Cell(40, 10, 'TOTAL:', 0);
    $pdf->Cell(40, 10, number_format(($total + 5 - 1.5), 2) . ' FCFA', 0);

    // Ajout d'un pied de page
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', 'I', 10);
    $pdf->Cell(0, 10, 'Merci de votre confiance !', 0, 1, 'C');

    // Important: aucun echo ou print avant ce point

    // Generate and output PDF
    $pdf->Output('recu_commande_' . $orderNumber . '.pdf', 'I');

    // Arrêter l'exécution immédiatement après l'envoi du PDF
    die();
} catch (Exception $e) {
    // En cas d'erreur, nettoyer le buffer
    while (ob_get_level()) {
        ob_end_clean();
    }
    $_SESSION['error'] = "Erreur lors de la génération du reçu: " . $e->getMessage();
    header("location: ../index.php");
    exit;
}
