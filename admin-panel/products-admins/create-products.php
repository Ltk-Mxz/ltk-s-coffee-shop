<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}


if (isset($_POST['submit'])) {

  if (
    empty($_POST['name']) or empty($_POST['price']) or empty($_POST['description'])
    or empty($_POST['type'])
  ) {
    echo "<script>alert('one or more inputs are empty');</script>";
  } else {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $image = $_FILES['image']['name'];

    $dir = "images/" . basename($image);

    $insert = $conn->prepare("INSERT INTO produits (nom_produit, prix, description_produit, type_produit,
       image_produit) VALUES (:name, :price, :description, :type, :image)");

    $insert->execute([
      ":name" => $name,
      ":price" => $price,
      ":description" => $description,
      ":type" => $type,
      ":image" => $image,
    ]);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
      header("location: show-products.php");
    }
  }
}

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Créer Produit</h5>
        <form method="POST" action="create-products.php" enctype="multipart/form-data">
          <!-- Nom input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Nom" />
          </div>
          <!-- Prix input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="Prix" />
          </div>
          <!-- Image input -->
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control" />
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-outline mb-4 mt-4">
            <select name="type" class="form-select form-control" aria-label="Default select example">
              <option selected>Choisir Type</option>
              <option value="boisson">Boisson</option>
              <option value="dessert">Dessert</option>
            </select>
          </div>
          <br>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Créer</button>
        </form>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php"; ?>