<?php
include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_POST['button1'])) {
    // $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);

    if (isset($_GET['value'])) {
        $dateDeb = $_GET['value'];
    } else {
        $dateDeb = $_POST['dateDeb'];
    }
    $dateFin = $_POST['dateFin'];
    if (!empty($_POST['description']) and !empty($_POST['dateFin'])) {
        $insertRES = $bdd->prepare('INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (?,?,?,?,?)');
        $insertRES->execute(array($_GET['id'], $description, $dateDeb, $dateFin, $getid));
        $erreur = "votre reservation est prise en compte";
        header('Location: ./reservation.php');
    } else {
        $erreur = "Veuillez remplir les champs";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/stylescrollbar.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/reservation-form.css">
    <title>Réservation</title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <div class="contener-main">
            <h2 class="titre">Réservation</h2>
            <h4 class="titre">Remplir les informations ci-dessous pour reserver</h4>
            <form action="" method="POST">
                <div class="contener-form">
                    <input class="input-res" type="text" name="description" placeholder="Description">
                    <?php if (isset($_GET['value'])) { ?>
                        <p class="input-res"><?php echo $_GET['value']; ?></p>
                    <?php } else { ?>
                        <input class="input-cal" type="datetime-local" name="dateDeb">
                    <?php } ?>
                    <input class="input-cal" type="datetime-local" name="dateFin">
                    <input class="input-butt" type="submit" name="button1">
                    <?php if (isset($erreur)) { ?>
                        <p style="color: red;"><?php echo $erreur; ?></p>
                    <?php } ?>
                </div>
            </form>
        </div>
    </main>
    <?php include('./footer.php'); ?>


</body>

</html>