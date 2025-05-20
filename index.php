<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php
// Mise à jour : utilisation de la table produits pour les boissons
$products = $conn->query("SELECT * FROM produits WHERE type_produit='drink'");
$products->execute();
$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

// Mise à jour : utilisation de la table avis pour les avis
$reviews = $conn->query("SELECT * FROM avis");
$reviews->execute();
$allReviews = $reviews->fetchAll(PDO::FETCH_OBJ);
?>

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Bienvenue</span>
					<h1 class="mb-4">Goût incroyable &amp; endroit magnifique</h1>
					<p class="mb-4 mb-md-5">Laissez-vous séduire par le parfait équilibre entre goût et tradition dans chaque gorgée.</p>
					<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Commander maintenant</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Voir le menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Bienvenue</span>
					<h1 class="mb-4">Goût incroyable &amp; endroit magnifique</h1>
					<p class="mb-4 mb-md-5">Un café d'exception, préparé avec soin pour éveiller vos sens à chaque instant.</p>
					<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Commander maintenant</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Voir le menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Bienvenue</span>
					<h1 class="mb-4">Crémeux, chaud et prêt à être servi</h1>
					<p class="mb-4 mb-md-5">Découvrez l'arôme envoûtant de nos cafés soigneusement sélectionnés et préparés avec passion.</p>
					<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Commander maintenant</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Voir le menu</a></p>
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
							<h3>+228 93 80 96 80</h3>
							<p>Pour vos réservations et commandes de café</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-my_location"></span></div>
						<div class="text">
							<h3>Ablogame, face au station d'essence</h3>
							<p>Au cœur de Lome, Togo</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-clock-o"></span></div>
						<div class="text">
							<h3>Ouvert Lundi - Samedi</h3>
							<p>8h00 - 21h00</p>
						</div>
					</div>
				</div>
			</div>

			<div class="book p-4 bg-black">
				<h3>Réserver une table</h3>
				<form action="booking/book.php" method="POST" class="appointment-form">
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" name="first_name" class="form-control" placeholder="Prenom">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" name="last_name" class="form-control" placeholder="Nom">
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
							<input name="phone" type="text" class="form-control" placeholder="Telephone">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
						</div>
						<?php if (isset($_SESSION['user_id'])) : ?>
							<div class="form-group ml-md-4">
								<button type="submit" name="submit" class="btn btn-white py-3 px-4">Réserver une Table</button>
							</div>
						<?php else : ?>
							<p class="text-danger">Connectez-vous pour réserver une table</p>
						<?php endif; ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="ftco-about d-md-flex">
	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
	<div class="one-half ftco-animate">
		<div class="overlap">
			<div class="heading-section ftco-animate ">
				<span class="subheading">Découvrez</span>
				<h2 class="mb-4">Notre Histoire</h2>
			</div>
			<div>
				<p>Depuis 1985, notre passion pour le café nous anime chaque jour. Nous sélectionnons les meilleurs grains de café à travers le monde pour vous offrir une expérience gustative unique. Notre savoir-faire artisanal et notre engagement pour la qualité font de notre établissement un lieu incontournable pour les amateurs de café.</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-services">
	<div class="container">
		<div class="row">
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-choices"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Commande Simplifiée</h3>
						<p>Commandez facilement votre café préféré en quelques clics. Notre système de commande intuitif vous permet de personnaliser votre boisson selon vos envies.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-delivery-truck"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Livraison Rapide</h3>
						<p>Profitez de notre service de livraison express pour déguster nos cafés où que vous soyez. Votre commande vous est livrée chaude et dans les meilleurs délais.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-coffee-bean"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Café d'Exception</h3>
						<p>Découvrez nos cafés soigneusement sélectionnés et torréfiés par nos maîtres torréfacteurs pour une expérience gustative incomparable.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Découvrez</span>
					<h2 class="mb-4">Notre menu</h2>
					<p class="mb-4">Découvrez notre sélection raffinée de cafés et de gourmandises, préparés avec soin pour éveiller vos papilles. Des arômes riches, des saveurs uniques et des recettes authentiques vous attendent.</p>
					<p><a href="menu.php" class="btn btn-primary btn-outline-primary px-4 py-3">Voir le menu complet</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="30">0</strong>
								<span>Branches de café</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10">0</strong>
								<span>Nombre de récompenses</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="500">0</strong>
								<span>Client satisfait</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10">0</strong>
								<span>Personnel</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Découvrir</span>
				<h2 class="mb-4">Nos Cafés Signatures</h2>
				<p>Découvrez notre sélection de cafés d'exception, préparés avec passion par nos baristas experts pour éveiller vos sens.</p>
			</div>
		</div>
		<div class="row">
			<?php foreach ($allProducts as $product) : ?>
				<div class="col-md-3">
					<div class="menu-entry">
						<a target="_blank" href="products/product-single.php?id=<?php echo $product->id_produit; ?>" class="img" style="background-image: url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $product->image_produit; ?>);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#"><?php echo $product->nom_produit; ?></a></h3>
							<p><?php echo $product->description_produit; ?></p>
							<p class="price"><span>$<?php echo $product->prix; ?></span></p>
							<p><a target="_blank" href="products/product-single.php?id=<?php echo $product->id_produit; ?>" class="btn btn-primary btn-outline-primary">Afficher</a></p>
						</div>
					</div>

				</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Témoignage</span>
				<h2 class="mb-4">Avis des clients</h2>
				<p>Découvrez ce que nos clients disent de leur expérience avec nos cafés d'exception et notre service chaleureux.</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row d-flex no-gutters">
			<?php foreach ($allReviews as $review) : ?>
				<div class="col-md-3 align-self-sm-end ftco-animate">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;<?php echo $review->commentaire; ?>.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">

							<div class="name align-self-center"><?php echo $review->nom_utilisateur; ?></div>
						</div>
					</div>
				</div>
			<?php endforeach;  ?>

		</div>
	</div>
</section>

<?php require "includes/footer.php"; ?>