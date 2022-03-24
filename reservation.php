//execution dela reservation 

<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_SESSION['id'])) {

    $getreserve = $bdd->query('SELECT * FROM reservations ORDER BY id DESC');
    $reservations = $getreserve->fetchAll();


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

                <?php
                $gettitle = $bdd->prepare('SELECT * FROM chambres WHERE imgcard = ? ');
                $gettitle->execute(array($reservation['titre']));
                $gettitleinfos = $gettitle->fetch();



                $getusers = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ? ');
                $getusers->execute(array($reservation['id_utilisateur']));
                $getusersinfos = $getusers->fetch();
                ?>

                <div class="contener-reservation">
                    <p class="parag">Client:</p>
                    <?= $getusersinfos['login']; ?>
                    <br>
                    <p class="parag">Titre:</p>
                    <?= $gettitleinfos['nom']; ?>
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
        </main>
        <?php include('./footer.php'); ?>
    </body>

    </html>

<?php
} else {
    header("Refresh:0; url=./index.php");
}
?>