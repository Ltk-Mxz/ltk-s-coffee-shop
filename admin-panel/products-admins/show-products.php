<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

$products = $conn->query("SELECT * FROM produits");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Produits</h5>
        <a href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Créer Produit</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Image</th>
              <th scope="col">Prix</th>
              <th scope="col">Type</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allProducts as $product) : ?>
              <tr>
                <th scope="row"><?php echo $product->id_produit; ?></th>
                <td><?php echo $product->nom_produit; ?></td>
                <td><img src="images/<?php echo $product->image_produit; ?>" style="width: 60px; height: 60px"></td>
                <td><?php echo $product->prix; ?> FCFA</td>
                <td><?php echo $product->type_produit; ?></td>
                <td><a href="delete-products.php?id=<?php echo $product->id_produit; ?>" class="btn btn-danger text-center">Supprimer</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php require "../layouts/footer.php"; ?>