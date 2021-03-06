<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

// if (isset($_SESSION['id'])) {


    if (isset($_POST['edit'])) {
        if (!empty($_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
            $recupLogin = $bdd->prepare('UPDATE utilisateurs SET login = ? WHERE id = ?');
            $recupLogin->execute(array($login, $getid));
        }
    }
    if (isset($_POST['edit'])) {
        if (!empty($_POST['mail'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $recupMail = $bdd->prepare('UPDATE utilisateurs SET mail = ? WHERE id = ?');
            $reucpMail->execute(array($mail, $getid));
        }
    }
    if (isset($_POST['edit'])) {
        if (!empty($_POST['password'])) {
            $password = sha1($_POST['password']);
            $recupPassword = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE id = ?');
            $recupPassword->execute(array($password, $getid));
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
        <link rel="stylesheet" href="./css/infos.css">
        <title>Magic View Hotel | Infos</title>
    </head>

    <body>
        <?php include('./header.php'); ?>
        <main>
            <div class="back-text-container">
                <div class="back-title-wall">
                    <h1 class="mytitlewall">BIENVENUE AU MAGIC VIEW HOTEL OU LE BUSINESS ET LE STYLE DE VIE DÉCONTRACTÉ SE RENCONTRE</h1>
                </div>
                <div class="lign-color"></div>
                <div class="back-text-wall">
                    <h3>
                        Situé à moins d'un mile de l'aéroport de LAX,
                        le magic view hotel apporte une expérience moderne et énergisante à votre séjour dans la Cité des Anges.
                        Mélangez affaires et style de vie à LA comme le font les locaux et détendez-vous au bord de la piscine extérieure,
                        faites de l'exercice dans notre centre de remise en forme ou prenez une bière au Century Taproom,
                        le pub gastronomique contemporain et décontracté de l'hôtel et l'un des quatre restaurants de notre hôtel LAX .
                        Détendez-vous dans nos chambres contemporaines et commencez la journée par un court trajet en voiture vers certaines des meilleures choses à faire près de LAX,
                        telles que les belles plages côtières de Los Angeles - Venice Beach et Manhattan Beach - pour profiter du soleil et de l'ambiance SoCal .
                        Notre hôtel se trouve également à proximité des arènes sportives de classe mondiale de la région,
                        notamment le SoFi Stadium, le Dodgers Stadium et le Staples Center. Si vous êtes toujours occupé,
                        restez connecté et productif avec notre centre d'affaires et nos 14 000 pieds carrés d'espace de réunion modulable.
                    </h3>
                </div>
            </div>
        </main>
        <?php include('./footer.php'); ?>
    </body>

    </html>

<?php // } ?>