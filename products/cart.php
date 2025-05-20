<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SESSION['user_id'])) {
	header("location: " . APPURL . "");
}

// Updated query: join table produits to get image_produit and other product info
$cart_query = $conn->prepare("
    SELECT panier.*, produits.image_produit, produits.nom_produit 
    FROM panier 
    JOIN produits ON panier.id_produit = produits.id_produit 
    WHERE panier.id_utilisateur = :user_id
");
$cart_query->execute([':user_id' => $_SESSION['user_id']]);
$allProducts = $cart_query->fetchAll(PDO::FETCH_OBJ);


//cart total

$cartTotal = $conn->query("SELECT SUM(quantite*prix) AS total FROM panier WHERE id_utilisateur='$_SESSION[user_id]'");
$cartTotal->execute();

$allCartTotal = $cartTotal->fetch(PDO::FETCH_OBJ);


//procced to checkout

if (isset($_POST['checkout'])) {

	$_SESSION['total_price'] = $_POST['total_price'];

	header("location: checkout.php");
}

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Panier</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Accueil</a></span> <span>Panier</span></p>
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
					<?php if (count($allProducts) > 0) : ?>
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Produit</th>
									<th>Prix</th>
									<th>Quantité</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allProducts as $product) : ?>
									<tr class="text-center">
										<td class="product-remove"><a href="delete-product.php?id=<?php echo $product->id_panier; ?>"><span class="icon-close"></span></a></td>

										<td class="image-prod">
											<div class="img" style="background-image:url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $product->image_produit; ?>);"></div>
										</td>

										<td class="product-name">
											<h3><?php echo $product->nom_produit; ?></h3>
											<p><?php echo $product->description_produit; ?></p>
										</td>

										<td class="price"><?php echo $product->prix; ?></td>

										<td>
											<div class="input-group mb-3">
												<input disabled type="text" name="quantite" class="quantity form-control input-number" value="<?php echo $product->quantite; ?>" min="1" max="100">
											</div>
										</td>

										<td class="total">FCFA <?php echo $product->prix * $product->quantite; ?></td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>

						<!-- Déplacer la div row justify-content-end à l'intérieur du if -->
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Total du Panier</h3>
					<p class="d-flex">
						<span>Sous-total</span>
						<span>FCFA <?php echo $allCartTotal->total; ?></span>
					</p>
					<p class="d-flex">
						<span>Livraison</span>
						<span>FCFA 1000</span>
					</p>
					<p class="d-flex">
						<span>Réduction</span>
						<span>FCFA 500</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>FCFA <?php echo $allCartTotal->total + 1000 - 500; ?></span>
					</p>
				</div>
				<form method="POST" action="cart.php">
					<input type="hidden" name="total_price" value="<?php echo $allCartTotal->total + 5000 - 1500; ?>">
					<button style="background-color: black;" name="checkout" type="submit"
						class="btn btn-primary py-3 px-5 text-white">
						Procéder au Paiement
					</button>
				</form>
			</div>
		</div>
	<?php else : ?>
		<p class="text-center">Votre panier est vide, ajoutez des produits</p>
	<?php endif; ?>
	</div>
	</div>
	</div>
</section>

<?php require "../includes/footer.php"; ?>