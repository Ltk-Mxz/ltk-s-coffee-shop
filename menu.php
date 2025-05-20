<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php
$desserts = $conn->query("SELECT * FROM produits WHERE type_produit='dessert'");
$desserts->execute();
$allDesserts = $desserts->fetchAll(PDO::FETCH_OBJ);

$drinks = $conn->query("SELECT * FROM produits WHERE type_produit='boisson'");
$drinks->execute();
$allDrinks = $drinks->fetchAll(PDO::FETCH_OBJ);
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Le Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>Le Menu</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-intro">
	<div class="container-wrap">
		<div class="wrap d-md-flex align-items-xl-end">
			<div class="info">
				<div class="row no-gutters">
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-phone"></span></div>
						<div class="text">
							<h3>000 (123) 456 7890</h3>
							<p>A small river named Duden flows by their place and supplies.</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-my_location"></span></div>
						<div class="text">
							<h3>198 West 21th Street</h3>
							<p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-clock-o"></span></div>
						<div class="text">
							<h3>Open Monday-Friday</h3>
							<p>8:00am - 9:00pm</p>
						</div>
					</div>
				</div>
			</div>
			<div class="book p-4">
				<h3>Réserver une Table</h3>
				<form action="booking/book.php" method="POST" class="appointment-form">
					<div class="d-md-flex">
						<div class="form-group">
							<input name="first_name" type="text" class="form-control" placeholder="Prénom">
						</div>
						<div class="form-group ml-md-4">
							<input name="last_name" type="text" class="form-control" placeholder="Nom">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<div class="input-wrap">
								<div class="icon"><span class="ion-md-calendar"></span></div>
								<input name="date" type="text" class="form-control appointment_date" placeholder="Date">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<div class="input-wrap">
								<div class="icon"><span class="ion-ios-clock"></span></div>
								<input name="time" type="text" class="form-control appointment_time" placeholder="Heure">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<input name="phone" type="text" class="form-control" placeholder="Téléphone">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
						</div>
						<?php if (isset($_SESSION['user_id'])) : ?>

							<div class="form-group ml-md-4">
								<input name="submit" type="submit" value="Réserver" class="btn btn-white py-3 px-4">
							</div>
						<?php else : ?>
							<p class="text-white">connectez-vous pour réserver une table</p>
						<?php endif; ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
				<?php foreach ($allDesserts as $dessert) : ?>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $dessert->image_produit; ?>);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?php echo $dessert->nom_produit; ?></span></h3>
								<span class="price">$<?php echo $dessert->prix; ?></span>
							</div>
							<div class="d-block">
								<p><?php echo $dessert->description_produit; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>

			<div class="col-md-6">
				<h3 class="mb-5 heading-pricing ftco-animate">Boissons</h3>
				<?php foreach ($allDrinks as $drink) : ?>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $drink->image_produit; ?>);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?php echo $drink->nom_produit; ?></span></h3>
								<span class="price">$<?php echo $drink->prix; ?></span>
							</div>
							<div class="d-block">
								<p><?php echo $drink->description_produit; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</section>

<section class="ftco-menu mb-5 pb-5">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Découvrir</span>
				<h2 class="mb-4">Nos Produits</h2>
				<p>Loin d'ici, derrière des montagnes imaginaires, vivent des histoires inattendues.</p>
			</div>
		</div>
		<div class="row d-md-flex">
			<div class="col-lg-12 ftco-animate p-md-5">
				<div class="row">
					<div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

							<a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Boissons</a>

							<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
						</div>
					</div>
					<div class="col-md-12 d-flex align-items-center">

						<div class="tab-content ftco-animate" id="v-pills-tabContent">



							<div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
								<div class="row">
									<?php foreach ($allDrinks as $drink) : ?>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a href="products/product-single.php?id=<?php echo $drink->id_produit; ?>" class="menu-img img mb-4" style="background-image: url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $drink->image_produit; ?>);"></a>
												<div class="text">
													<h3><a href="products/product-single.php?id=<?php echo $drink->id_produit; ?>"><?php echo $drink->nom_produit; ?></a></h3>
													<p><?php echo $drink->description_produit; ?></p>
													<p class="price"><span>$<?php echo $drink->prix; ?></span></p>
													<p><a href="products/product-single.php?id=<?php echo $drink->id_produit; ?>" class="btn btn-primary btn-outline-primary">Voir</a></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>

								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
								<div class="row">
									<?php foreach ($allDesserts as $dessert) : ?>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a href="products/product-single.php?id=<?php echo $dessert->id_produit; ?>" class="menu-img img mb-4" style="background-image: url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $dessert->image_produit; ?>);"></a>
												<div class="text">
													<h3><a href="products/product-single.php?id=<?php echo $dessert->id_produit; ?>"><?php echo $dessert->nom_produit; ?></a></h3>
													<p><?php echo $dessert->description_produit; ?></p>
													<p class="price"><span>$<?php echo $dessert->prix; ?></span></p>
													<p><a href="products/product-single.php?id=<?php echo $dessert->id_produit; ?>" class="btn btn-primary btn-outline-primary">Voir</a></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require "includes/footer.php"; ?>