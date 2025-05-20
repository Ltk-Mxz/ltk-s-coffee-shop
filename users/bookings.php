<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SESSION['user_id'])) {
	header("location: " . APPURL . "");
}

// Updated PDO connection with correct database name
$conn = new PDO("mysql:host=localhost;dbname=coffee-ltk", "root", ""); // Correct DSN

$query = $conn->query("SELECT * FROM reservations");
$query->execute();
$bookings = $query->fetchAll(PDO::FETCH_OBJ);

$bookings = $conn->query("SELECT * FROM reservations WHERE id_utilisateur='$_SESSION[user_id]'");
$bookings->execute();

$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Tes Reservations</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Acceuil</a></span> <span>Tes Reservations</span></p>
				</div>

			</div>
		</div>
	</div>
</section>
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<?php if (count($allBookings) > 0) : ?>
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>Prenom</th>
									<th>Nom</th>
									<th>Date</th>
									<th>Heure</th>
									<th>Telephone</th>
									<th>Message</th>
									<th>Statut</th>
									<th>Write Review</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allBookings as $booking) : ?>
									<tr class="text-center">
										<td class="product-remove"><?php echo $booking->prenom; ?></td>

										<td class="image-prod"><?php echo $booking->nom; ?></td>

										<td class="product-name">
											<h3><?php echo $booking->date_reservation; ?></h3>
										</td>

										<td class="price"><?php echo $booking->heure_reservation; ?></td>

										<td>
											<?php echo $booking->telephone; ?>
										</td>

										<td class="total"><?php echo $booking->message_reservation; ?></td>
										<td class="total"><?php echo $booking->statut_reservation; ?></td>
										<?php if ($booking->statut_reservation == "Terminée") : ?>
											<td class="total"><a class="btn btn-primary" href="<?php echo APPURL; ?>/reviews/write-review.php">Écrire un avis</a></td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					<?php else : ?>
						<p>you do not have any bookings for now </p>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
</section>

<?php require "../includes/footer.php"; ?>