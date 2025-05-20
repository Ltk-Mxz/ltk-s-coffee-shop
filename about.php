<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

$reviews = $conn->query("SELECT * FROM avis");
$reviews->execute();

$allReviews = $reviews->fetchAll(PDO::FETCH_OBJ);

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">À Propos</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>À Propos</span></p>
				</div>

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
				<p>Depuis 1985, notre passion pour le café nous anime chaque jour. Nous parcourons le monde à la recherche des meilleurs grains de café pour vous offrir une expérience gustative unique. Notre engagement pour la qualité et notre savoir-faire artisanal font de notre établissement un lieu incontournable pour les amateurs de café.</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Témoignages</span>
				<h2 class="mb-4">Avis de nos Clients</h2>
				<p>Découvrez ce que nos clients pensent de notre café et de nos services.</p>
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

<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Découvrez</span>
					<h2 class="mb-4">Notre Menu</h2>
					<p class="mb-4">Explorez notre sélection de cafés d'exception et de pâtisseries artisanales, préparés avec passion pour votre plus grand plaisir.</p>
					<p><a href="menu.php" class="btn btn-primary btn-outline-primary px-4 py-3">Voir le Menu Complet</a></p>
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
								<strong class="number" data-number="100">0</strong>
								<span>Coffee Branches</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="85">0</strong>
								<span>Number of Awards</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10567">0</strong>
								<span>Happy Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="900">0</strong>
								<span>Staff</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require "includes/footer.php"; ?>