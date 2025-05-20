<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Products
$products = $conn->query("SELECT COUNT(*) AS count_products FROM produits");
$products->execute();

$productsCount = $products->fetch(PDO::FETCH_OBJ);

// Orders
$orders = $conn->query("SELECT COUNT(*) AS count_orders FROM commandes");
$orders->execute();

$ordersCount = $orders->fetch(PDO::FETCH_OBJ);


// Bookings
$bookings = $conn->query("SELECT COUNT(*) AS count_bookings FROM reservations");
$bookings->execute();

$bookingsCount = $bookings->fetch(PDO::FETCH_OBJ);


// Admins
$admins = $conn->query("SELECT COUNT(*) AS count_admins FROM administrateurs");
$admins->execute();

$adminsCount = $admins->fetch(PDO::FETCH_OBJ);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->query("DELETE FROM administrateurs WHERE id_admin='$id'");
    $delete->execute();

    header("location: admins.php");
}
?>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Produits</h5>
                <p class="card-text">Nombre de produits: <?php echo $productsCount->count_products; ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Commandes</h5>

                <p class="card-text">Nombre de commandes: <?php echo $ordersCount->count_orders; ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Réservations</h5>

                <p class="card-text">Nombre de réservations: <?php echo $bookingsCount->count_bookings; ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Administrateurs</h5>

                <p class="card-text">Nombre d'administrateurs: <?php echo $adminsCount->count_admins; ?></p>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Réservations</h5>
        <p class="card-text">Nombre de réservations : <?php echo $bookingsCount->count_reservations; ?></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Administrateurs</h5>
        <p class="card-text">Nombre d'administrateurs : <?php echo $adminsCount->count_administrateurs; ?></p>
    </div>
</div>

<?php require "layouts/footer.php"; ?>