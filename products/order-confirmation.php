<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SESSION['user_id'])) {
    header("location: " . APPURL . "");
    exit;
}
?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Confirmation de commande</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="<?php echo APPURL; ?>">Accueil</a></span>
                        <span>Confirmation</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="alert alert-success">
                    <h4 class="mb-4">Merci pour votre commande!</h4>
                    <p>Votre paiement a été traité avec succès.</p>
                    <p>Un email de confirmation vous sera envoyé prochainement.</p>
                    <p>Numéro de commande: #<?php echo date('Ymd') . rand(1000, 9999); ?></p>
                </div>
                <div class="mt-4">
                    <a href="<?php echo APPURL; ?>" class="btn py-3 px-5 text-white mr-3"
                        style="background-color: #000000;">
                        Retour à l'accueil
                    </a>
                    <a href="generate-receipt.php" class="btn py-3 px-5 text-white"
                        style="background-color: #000000;">
                        Télécharger le reçu
                    </a>
                    <!-- NEW: Button to view the receipt -->
                    <a href="receipt.php" target="_blank" class="btn py-3 px-5 text-white ml-3"
                        style="background-color: #000000;">
                        Voir le reçu
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "../includes/footer.php"; ?>