<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "");
}

if (isset($_POST['submit'])) {

  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('Certains champs sont vides');</script>";
  } else {

    $email = $_POST['email'];
    $password = $_POST['password'];


    //write a query to check for email

    $login = $conn->query("SELECT * FROM administrateurs WHERE email='$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {

      if (password_verify($password, $fetch['mot_de_passe'])) {
        //start session

        $_SESSION['admin_name'] = $fetch['nom_admin'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['admin_id'] = $fetch['id_admin'];

        header("location: " . ADMINURL . "");
      } else {
        echo "<script>alert('Email ou mot de passe incorrect');</script>";
      }
    } else {
      echo "<script>alert('Email ou mot de passe incorrect');</script>";
    }
  }
}


?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Se Connecter</h5>
        <form method="POST" action="login-admins.php" class="p-auto">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Courriel" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Mot de passe" class="form-control" />
          </div>

          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Se Connecter</button>
        </form>

      </div>
    </div>
  </div>

  <?php require "../layouts/footer.php"; ?>