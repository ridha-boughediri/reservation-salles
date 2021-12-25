<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_GET['id'])) {
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
                    echo $tomorrow1 = strftime("%B %G");
                    echo '<br>';
                    for ($i = 0; $i < 7; $i++) {
                        $tomorrow = strftime(" %d ", strtotime("+" . $i . "days"));

                        echo $tomorrow;
                        echo '<br>';
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