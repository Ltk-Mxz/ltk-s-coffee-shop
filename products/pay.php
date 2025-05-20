<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: http://localhost/coffee-ltk');
    exit;
}

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
                    <h1 class="mb-3 mt-5 bread">Paiement</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Accueil</a></span> <span>Paiement</span></p>
                </div>


            </div>
        </div>
    </div>

</section>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Montant à payer : FCFA <?php echo $_SESSION['total_price']; ?></h2>
            <button id="simulate-payment" class="btn py-3 px-5 text-white"
                style="background-color: #000000; width: 100%; font-size: 20px;">
                Finaliser le paiement
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('simulate-payment').addEventListener('click', function() {
        this.textContent = 'Traitement en cours...';
        this.disabled = true;

        setTimeout(function() {
            // D'abord on supprime le panier
            fetch('delete-cart.php')
                .then(() => {
                    // Puis on redirige vers la page de confirmation
                    window.location.href = 'order-confirmation.php';
                })
                .catch(() => {
                    // En cas d'erreur, on redirige quand même
                    window.location.href = 'order-confirmation.php';
                });
        }, 1500);
    });
</script>

<?php require "../includes/footer.php"; ?>