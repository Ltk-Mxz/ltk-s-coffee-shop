<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (isset($_POST['submit'])) {

    if (
        empty($_POST['first_name']) or empty($_POST['last_name']) or empty($_POST['date'])
        or empty($_POST['time']) or empty($_POST['phone'])  or empty($_POST['message'])
    ) {
        echo "<script>alert('one or more inputs are empty');</script>";
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $user_id = $_SESSION['user_id'];

        if ($date > date("n/j/Y")) {

            $insert = $conn->prepare("INSERT INTO reservations (prenom, nom, date_reservation,
                heure_reservation, telephone, message_reservation, id_utilisateur) 
                VALUES (:first_name, :last_name, :date, :time,
                :phone, :message, :user_id)");

            $insert->execute([
                ":first_name" => $first_name,
                ":last_name" => $last_name,
                ":date" => $date,
                ":time" => $time,
                ":phone" => $phone,
                ":message" => $message,
                ":user_id" => $user_id
            ]);

            header("location: " . APPURL . "");
        } else {
            header("location: " . APPURL . "");
        }
    }
}
