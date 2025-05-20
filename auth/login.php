<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (isset($_SESSION['username'])) {
  header("location: " . APPURL . "");
}

if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('Certains champs sont vides !!!');</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check Email

    $login = $conn->query("SELECT * FROM utilisateurs WHERE email='$email'");
    $login->execute();
    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {

      if (password_verify($password, $fetch['mot_de_passe'])) {
        // Start Session

        $_SESSION['username'] = $fetch['nom_utilisateur'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['user_id'] = $fetch['id_utilisateur'];

        header("location: " . APPURL . "");
      } else {
        echo "<script>alert('Email ou mot de passe incorrect');</script>";
      }
    } else {
      echo "<script>alert('Email ou mot de passe incorrect');</script>";
    }
  }
}
?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Se Connecter</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil</a></span><span>Se Connecter</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <form action="login.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4 billing-heading">Se Connecter</h3>
          <div class="row align-items-end">

            <div class="col-md-12">
              <div class="form-group">
                <label for="Email">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Mot de Passe</label>
                <input name="password" type="password" class="form-control" placeholder="Password">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Se connecter</button>
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