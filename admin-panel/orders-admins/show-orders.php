<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

$orders = $conn->query("SELECT * FROM commandes");
$orders->execute();

$allOrders = $orders->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Commandes</h5>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Prénom</th>
              <th scope="col">Ville</th>
              <th scope="col">Région</th>
              <th scope="col">Code postal</th>
              <th scope="col">Téléphone</th>
              <th scope="col">Adresse</th>
              <th scope="col">Prix total</th>
              <th scope="col">Statut</th>
              <th scope="col">Modifier</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allOrders as $order) : ?>
              <tr>
                <td><?php echo $order->prenom; ?></td>
                <td><?php echo $order->ville; ?></td>
                <td><?php echo $order->region; ?></td>
                <td>
                  <?php echo $order->code_postal; ?>
                </td>
                <td><?php echo $order->telephone; ?></td>
                <td>
                  <?php echo $order->adresse; ?>
                </td>
                <td><?php echo $order->prix_total; ?> FCFA</td>

                <td><?php echo $order->statut_commande; ?></td>
                <td><a href="change-status.php?id=<?php echo $order->id_commande; ?>" class="btn btn-warning text-white text-center">Modifier</a></td>
                <td><a href="delete-orders.php?id=<?php echo $order->id_commande; ?>" class="btn btn-danger text-center">Supprimer</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php"; ?>