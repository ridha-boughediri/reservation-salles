<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_GET['id'])) {
    $getchamber = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ? ');
    $getchamber->execute(array($_GET['id']));
    $chamberinfo = $getchamber->fetch();
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
                    <?php
                    for ($d = 0; $d < 7; $d++) {
                        $dwl = strftime("%A", strtotime("+" . $d . "days"));
                        $dwn = strftime("%d", strtotime("+" . $d . "days"));
                        $dwn2 = strftime("%w", strtotime("+" . $d . "days"));
                        $month = strftime("%B", strtotime("+" . $d . "days"));
                        $monthwl = strftime("%m", strtotime("+" . $d . "days"));
                        $year = strftime("%G", strtotime("+" . $d . "days"));
                        if ($dwn2 >= 1 && $dwn2 <= 5) {

                    ?>
                            <div class="boxday">

                                <h4 class="titleday"><?php echo $dwl . ' ' . $dwn .$monthwl. ' ' . $month . ' ' . $year ?></h4>
                                <?php
                                $heure_depart_matin = 8;
                                $heure_fin_matin = 12;
                                for ($hm = $heure_depart_matin; $hm <= $heure_fin_matin; $hm++) {
                                    $dateviewwant = '';
                                ?>
                                    <?php echo $hm . ": 00"; ?><button type="submit" class="btn-view"></button>
                                <?php


                                }
                                ?>
                                <br>
                                <div class="lign-color2"></div>
                                <br>
                                <?php
                                $heure_depart_midi = 14;
                                $heure_fin_midi = 19;
                                for ($ha = $heure_depart_midi; $ha <= $heure_fin_midi; $ha++) {
                                ?>
                                    <?php echo $ha .  ": 00"; ?> <button type="submit" class="btn-view"></button>
                            <?php
                                }
                            }
                            ?>
                            </div>
                        <?php
                    }

                        ?>
                </div>
            </div>
        </main>
        <?php include('./footer.php'); ?>
    </body>

    </html>

<?php } else {
    # code...
} ?>