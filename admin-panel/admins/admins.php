<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

$admins = $conn->query("SELECT * FROM administrateurs");
$admins->execute();

$allAdmins = $admins->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Administrateurs</h5>
        <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Créer Administrateur</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom d'administrateur</th>
              <th scope="col">Email</th>
              <th scope="col">Créé le</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allAdmins as $admin) : ?>
              <tr>
                <th scope="row"><?php echo $admin->id_admin; ?></th>
                <td><?php echo $admin->nom_admin; ?></td>
                <td><?php echo $admin->email; ?></td>
                <td><?php echo $admin->created_at; ?></td>
                <td>
                  <a href="delete-admins.php?id=<?php echo $admin->id_admin; ?>" class="btn btn-danger">Supprimer</a>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php require "../layouts/footer.php"; ?>