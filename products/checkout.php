<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
	// redirect them to your desired location
	header('location: http://localhost/coffee-blend');
	exit;
}

if (!isset($_SESSION['user_id'])) {
	header("location: " . APPURL . "");
}

// Correction des noms de variables
if (isset($_POST['submit'])) {
	if (
		empty($_POST['prenom']) or
		empty($_POST['nom']) or
		empty($_POST['region']) or
		empty($_POST['adresse']) or
		empty($_POST['ville']) or
		empty($_POST['code_postal']) or
		empty($_POST['telephone']) or
		empty($_POST['email'])
	) {
		echo "<script>alert('Un ou plusieurs champs sont vides');</script>";
	} else {
		// Mise à jour des noms des variables pour correspondre aux champs du formulaire
		$first_name = $_POST['prenom'];
		$last_name = $_POST['nom'];
		$state = $_POST['region'];
		$street_address = $_POST['adresse'];
		$town = $_POST['ville'];
		$zip_code = $_POST['code_postal'];
		$phone = $_POST['telephone'];
		$user_id = $_SESSION['user_id'];
		$status = "En attente";
		$total_price = $_SESSION['total_price'];

		try {
			$place_orders = $conn->prepare("INSERT INTO commandes (
                prenom, 
                nom, 
                region, 
                adresse, 
                ville, 
                code_postal, 
                telephone, 
                id_utilisateur, 
                statut_commande, 
                prix_total
            ) VALUES (
                :prenom, 
                :nom, 
                :region, 
                :adresse, 
                :ville, 
                :code_postal, 
                :telephone, 
                :id_utilisateur, 
                :statut_commande, 
                :prix_total
            )");

			$place_orders->execute([
				":prenom" => $first_name,
				":nom" => $last_name,
				":region" => $state,
				":adresse" => $street_address,
				":ville" => $town,
				":code_postal" => $zip_code,
				":telephone" => $phone,
				":id_utilisateur" => $user_id,
				":statut_commande" => $status,
				":prix_total" => $total_price
			]);

			header("location: pay.php");
			exit;
		} catch (PDOException $e) {
			echo "<script>alert('Erreur lors de la commande : " .
				htmlspecialchars($e->getMessage()) . "');</script>";
		}
	}
}

// Ajout des messages de confirmation
if (isset($_SESSION['message'])) {
	echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
	unset($_SESSION['message']);
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

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<form action="checkout.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
					<h3 class="mb-4 billing-heading">Détails de facturation</h3>
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Prénom</label>
								<input name="prenom" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastname">Nom</label>
								<input name="nom" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Pays / Région</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="region" id="" class="form-control">
										<option value="France">France</option>
										<option value="Italie">Italie</option>
										<option value="Philippines">Philippines</option>
										<option value="Corée du Sud">Corée du Sud</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Japon">Japon</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="streetaddress">Adresse</label>
								<input name="adresse" type="text" class="form-control" placeholder="Numéro et nom de rue">
							</div>
						</div>

					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="towncity">Ville</label>
							<input name="ville" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="postcodezip">Code postal *</label>
							<input name="code_postal" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="phone">Téléphone</label>
							<input name="telephone" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="emailaddress">Adresse email</label>
							<input name="email" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group mt-4">
							<div class="radio">
								<p><button type="submit" name="submit" class="btn btn-primary py-3 px-4">Passer la commande et payer</button></p>

							</div>
						</div>
					</div>
			</div>
			</form><!-- END -->

		</div> <!-- .col-md-8 -->

	</div>
	</div>
	</div>
</section> <!-- .section -->

<?php require "../includes/footer.php"; ?>