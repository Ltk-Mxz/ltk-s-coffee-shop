<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (isset($_SESSION['username'])) {
  header("location: " . APPURL . "");
}

if (isset($_POST['submit'])) {

  if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('Un ou plusieurs champs sont vides');</script>";
  } else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe)
        VALUES (:username, :email, :password)");

    $insert->execute([
      ":username" => $username,
      ":email" => $email,
      ":password" => $password
    ]);

    header("location: login.php");
  }
}
?>

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">S'Enregistrer</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil</a></span> <span>S'Enregistrer</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <form action="register.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4 billing-heading">S'enregistrer</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="Username">Nom d'Utilisateur</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Mot de Passe</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>

            </div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <button type="submit" name="submit" class="btn btn-primary py-3 px-4">S'enregistrer</button>
                </div>
              </div>
            </div>

        </form>
      </div>
    </div>
  </div>
  </div>
</section>

<?php require "../includes/footer.php"; ?>