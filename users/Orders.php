<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SESSION['user_id'])) {
	header("location: " . APPURL . "");
}

$conn = new PDO("mysql:host=localhost;dbname=coffee-ltk", "root", "");
$query = $conn->query("SELECT * FROM commandes WHERE id_utilisateur='$_SESSION[user_id]'");
$query->execute();
$orders = $query->fetchAll(PDO::FETCH_OBJ);

$allOrders = $orders;
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Vos Commandes</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Accueil</a></span> <span>Vos Commandes</span></p>
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
					<?php if (count($allOrders) > 0) : ?>
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>Prénom</th>
									<th>Nom</th>
									<th>Ville</th>
									<th>Adresse</th>
									<th>Téléphone</th>
									<th>Prix Total</th>
									<th>Statut</th>
									<th>Écrire un avis</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allOrders as $order) : ?>
									<tr class="text-center">
										<td class="product-remove"><?php echo $order->prenom; ?></td>

										<td class="image-prod"><?php echo $order->nom; ?></td>

										<td class="product-name">
											<h3><?php echo $order->ville; ?></h3>
										</td>

										<td class="price"><?php echo $order->adresse; ?></td>

										<td>
											<?php echo $order->telephone; ?>
										</td>

										<td class="total">$<?php echo $order->prix_total; ?></td>
										<td class="total"><?php echo $order->statut_commande; ?></td>
										<?php if ($order->statut_commande == "Livrée") : ?>
											<td class="total"><a class="btn btn-primary" href="<?php echo APPURL; ?>/reviews/write-review.php">Écrire un avis</a></td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					<?php else : ?>
						<p>vous n'avez aucune commande pour le moment</p>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
</section>

<?php require "../includes/footer.php"; ?>