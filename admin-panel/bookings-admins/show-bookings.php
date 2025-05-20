<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

$bookings = $conn->query("SELECT * FROM reservations");
$bookings->execute();

$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Réservations</h5>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Prénom</th>
              <th scope="col">Nom</th>
              <th scope="col">Date</th>
              <th scope="col">Heure</th>
              <th scope="col">Téléphone</th>
              <th scope="col">Message</th>
              <th scope="col">Statut</th>
              <th scope="col">Modifier Statut</th>
              <th scope="col">Date Création</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allBookings as $booking) : ?>
              <tr>
                <th scope="row"><?php echo $booking->id_reservation; ?></th>
                <td><?php echo $booking->prenom; ?></td>
                <td><?php echo $booking->nom; ?></td>
                <td><?php echo $booking->date_reservation; ?> </td>
                <td><?php echo $booking->heure_reservation; ?></td>
                <td><?php echo $booking->telephone; ?></td>
                <td>
                  <?php echo $booking->message_reservation; ?>
                </td>
                <td><?php echo $booking->statut_reservation; ?></td>
                <td><a href="change-status.php?id=<?php echo $booking->id_reservation; ?>" class="btn btn-warning  text-white text-center ">Changer statut</a></td>

                <td><?php echo $booking->created_at; ?></td>

                <td><a href="delete-bookings.php?id=<?php echo $booking->id_reservation; ?>" class="btn btn-danger  text-center ">Supprimer</a></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php require "../layouts/footer.php"; ?>