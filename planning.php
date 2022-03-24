//affichage html de notre planning

<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_GET['id']) && isset($_SESSION['id'])) {
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
        <link rel="stylesheet" href="./css/planning.css">
        <title>Magic View Hotel | Disponibilités </title>
    </head>

    <body>
        <?php include('./header.php'); ?>
        <main>
            <div class="back-text-container">
                <div class="back-title-wall">
                    <h1 class="mytitlewall">Planning des réservations</h1>
                </div>
                <div class="lign-color"></div>
                <div class="container-planning">
                    <?php for ($d = 0; $d < 8; $d++) { ?>
                        <?php
                        $dwl = strftime("%A", strtotime("+" . $d . "days"));
                        $dwn = strftime("%d", strtotime("+" . $d . "days"));
                        $dwn2 = strftime("%w", strtotime("+" . $d . "days"));
                        $monthl = strftime("%B", strtotime("+" . $d . "days"));
                        $monthwn = strftime("%m", strtotime("+" . $d . "days"));
                        $year = strftime("%G", strtotime("+" . $d . "days"));
                        ?>
                        <?php if ($dwn2 >= 1 && $dwn2 <= 5) { ?>
                            <div class="boxday">

                                <h4 class="titleday"><?php echo $dwl . ' ' . $dwn . ' ' . $monthl . ' ' . $year ?></h4>
                                <?php
                                $heure_depart_matin = 8;
                                $heure_fin_matin = 19;
                                for ($hm = $heure_depart_matin; $hm <= $heure_fin_matin; $hm++) {
                                    $datedays = strtotime("+" . $d . "days");
                                    $dateday = date("Y-m-d", $datedays);
                                    if ($hm < 10) {
                                        $hmo = 0 . $hm;
                                    } else {
                                        $hmo = $hm;
                                    }
                                    $date = $dateday . " " . $hmo . ":00:00";

                                    $getchamber = $bdd->prepare('SELECT * FROM reservations WHERE titre = ? and  debut <= ? and fin >= ? ');
                                    $getchamber->execute(array($_GET['id'], $date, $date));
                                    $chamberinfo = $getchamber->fetchAll();
                                    $chambercount = $getchamber->rowCount();
                                    
                                ?>

                                    <br>
                                    <?php if ($chambercount >= 1) {

                                        foreach ($chamberinfo as $chamberinfokey) {

                                            $getchamberuserinfo = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ? ');
                                            $getchamberuserinfo->execute(array($chamberinfokey['id_utilisateur']));
                                            $chamberuserinfo = $getchamberuserinfo->fetch();

                                            $userplace = $chamberuserinfo['login'] ;
                                        }
                                    ?>

                                        <button type="submit" class="btn-view indispo">Réservé par <p class="text-btnindipo"><?php echo $userplace ?>(<?php echo $hmo.'h' ?>)</p></button>

                                    <?php } else { ?>
                                        <button type="submit" class="btn-view dispo" onclick="window.location.href='./reservation-form.php?id=<?php echo $_GET['id'] ?>&value=<?php echo $date ?>';">Disponible(<?php echo $hmo.'h' ?>)</button>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </main>
        <?php include('./footer.php'); ?>
    </body>

    </html>

<?php } else {
    header("Refresh:0; url=./index.php");
} ?>