<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Récupération du produit avec le bon nom de colonne
	$product = $conn->prepare("SELECT id_produit, nom_produit, prix, description_produit, 
        image_produit, type_produit FROM produits WHERE id_produit = :id");
	$product->execute([':id' => $id]);
	$singelProduct = $product->fetch(PDO::FETCH_OBJ);

	if (!$singelProduct) {
		header("location: " . APPURL . "/404.php");
		exit;
	}

	// Récupération des produits associés
	$relatedProducts = $conn->prepare("SELECT * FROM produits WHERE type_produit = :type 
        AND id_produit != :id");
	$relatedProducts->execute([
		':type' => $singelProduct->type_produit,
		':id' => $id
	]);
	$allRelatedProducts = $relatedProducts->fetchAll(PDO::FETCH_OBJ);

	// Ajout au panier
	if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
		if ($singelProduct && $singelProduct->image_produit) {
			$insert_cart = $conn->prepare("INSERT INTO panier (
                nom_produit, 
                image, 
                prix, 
                id_produit, 
                description_produit, 
                quantite, 
                id_utilisateur
            ) VALUES (
                :nom_produit,
                :image,
                :prix,
                :id_produit,
                :description_produit,
                :quantite,
                :id_utilisateur
            )");

			try {
				$insert_cart->execute([
					":nom_produit" => $singelProduct->nom_produit,
					":image" => $singelProduct->image_produit,
					":prix" => $singelProduct->prix,
					":id_produit" => $singelProduct->id_produit,
					":description_produit" => $singelProduct->description_produit,
					":quantite" => $_POST['quantite'],
					":id_utilisateur" => $_SESSION['user_id']
				]);

				// Ajouter un message de succès dans la session
				$_SESSION['message'] = "Produit ajouté au panier avec succès";

				// Rediriger vers la page du panier
				header("Location: " . APPURL . "/products/cart.php");
				exit;
			} catch (PDOException $e) {
				$_SESSION['error'] = "Erreur lors de l'ajout au panier: " . $e->getMessage();
			}
		} else {
			$_SESSION['error'] = "Erreur: Image du produit manquante";
		}
	}

	// Validation du panier
	if (isset($_SESSION['user_id'])) {
		$validateCart = $conn->prepare("SELECT * FROM panier 
            WHERE id_produit = :id AND id_utilisateur = :user_id");
		$validateCart->execute([
			':id' => $id,
			':user_id' => $_SESSION['user_id']
		]);
		$rowCount = $validateCart->rowCount();
	}
} else {
	header("location: " . APPURL . "/404.php");
}
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Détail du Produit</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Accueil</a></span> <span>Détail du Produit</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="h-50 images/menu-2.jpg" class="image-popup"><img src="<?php echo IMAGEPRODUCTS; ?>/<?php echo $singelProduct->image_produit; ?>" class="img-fluid" alt="<?php echo $singelProduct->nom_produit; ?>"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?php echo $singelProduct->nom_produit; ?></h3>
				<p class="price"><span><?php echo $singelProduct->prix; ?> FCFA</span></p>
				<p>
					<?php echo $singelProduct->description_produit; ?>
				</p>

				<form method="POST" action="product-single.php?id=<?php echo $id; ?>">
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="quantite">
								<i class="icon-minus"></i>
							</button>
						</span>

						<input type="text" id="quantity" name="quantite" class="form-control input-number" value="1" min="1" max="100">
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="quantite">
								<i class="icon-plus"></i>
							</button>
						</span>
					</div>

					<input name="image_produit" value="<?php echo htmlspecialchars($singelProduct->image_produit); ?>" type="hidden">
					<input name="image" value="<?php echo htmlspecialchars($singelProduct->image_produit); ?>" type="hidden">
					<input name="nom_produit" value="<?php echo htmlspecialchars($singelProduct->nom_produit); ?>" type="hidden">
					<input name="prix" value="<?php echo htmlspecialchars($singelProduct->prix); ?>" type="hidden">
					<input name="id_produit" value="<?php echo htmlspecialchars($singelProduct->id_produit); ?>" type="hidden">
					<input name="description_produit" value="<?php echo htmlspecialchars($singelProduct->description_produit); ?>" type="hidden">

					<?php if (isset($_SESSION['user_id'])) : ?>
						<?php if ($rowCount > 0) : ?>
							<button name="submit" type="submit" class="btn py-3 px-5 text-white"
								style="background-color: #000000;" disabled>
								Déjà au panier
							</button>
						<?php else : ?>
							<button name="submit" type="submit" class="btn py-3 px-5 text-white border-primary"
								style="background-color: #000000;">
								Ajouter au panier
							</button>
						<?php endif; ?>
					<?php else : ?>
						<p class="text-warning">Connectez-vous pour ajouter au panier</p>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Découvrir</span>
				<h2 class="mb-4">Produits similaires</h2>
				<p>Découvrez d'autres produits qui pourraient vous plaire.</p>
			</div>
		</div>
		<div class="row">
			<?php foreach ($allRelatedProducts as $allRelatedProduct) : ?>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="<?php echo APPURL; ?>/products/product-single.php?id=<?php echo $allRelatedProduct->id_produit; ?>" class="img" style="background-image: url(<?php echo IMAGEPRODUCTS; ?>/<?php echo $allRelatedProduct->image_produit; ?>);"></a>
						<div class="text text-center pt-4">
							<h3><?php echo $allRelatedProduct->nom_produit; ?></h3>
							<p>
								<?php echo $allRelatedProduct->description_produit; ?>
							</p>
							<p class="price"><span><?php echo $allRelatedProduct->prix; ?> FCFA</span></p>
							<p><a href="<?php echo APPURL; ?>/products/product-single.php?id=<?php echo $allRelatedProduct->id_produit; ?>" class="btn btn-primary btn-outline-primary">Voir</a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>

<?php require "../includes/footer.php"; ?>

<script>
	$(document).ready(function() {
		var quantite = 1;
		var quantityInput = $('input[name="quantite"]');

		$('.quantity-right-plus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt(quantityInput.val());
			if (quantity < 100) {
				quantityInput.val(quantity + 1);
			}
		});

		$('.quantity-left-minus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt(quantityInput.val());
			if (quantity > 1) {
				quantityInput.val(quantity - 1);
			}
		});

		// Empêcher la saisie manuelle de valeurs invalides
		quantityInput.on('change', function() {
			var val = parseInt($(this).val());
			if (isNaN(val) || val < 1) {
				$(this).val(1);
			} else if (val > 100) {
				$(this).val(100);
			}
		});
	});
</script>