<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');


$getRESER = $bdd->prepare('SELECT * FROM reservations');
$reservations = $getRESER->fetchAll();

if (isset($_POST['ajout'])) {
    header('Location: ./reservation-form.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reservation.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">

    <title>Reservation</title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <h2 class="titre">Les Réservations</h2>
        <?php foreach ($reservations as $reservation) : ?>

            <div class="contener-reservation">
                <p class="parag">Titre:</p>
                <?= $reservation['titre']; ?>
                <br>
                <p class="parag">Description:</p>
                <?= $reservation['description']; ?>
                <br>
                <p class="parag">Date d'arrivée:</p>
                <?= $reservation['debut']; ?>
                <p class="parag">Date de départ:</p>
                <?= $reservation['fin']; ?>
            </div>


        <?php endforeach;  ?>

        <form action="" method="POST">
            <input class="button1" type="submit" name="ajout" value="Ajout de réservation">
        </form>
    </main>
    <?php include('./footer.php'); ?>
</body>

</html>