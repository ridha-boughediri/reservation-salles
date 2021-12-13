<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/stylescrollbar.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Accueil | Magic View Hotel</title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <div class="back-img-wall"><img src="./img/main-wall.jpg" alt=""></div>
        <div class="back-text-container">
            <div class="back-title-wall">
                <h1 class="mytitlewall">Magic View Hotel</h1>
            </div>
            <div class="back-text-wall">
                <h3>
                    Vous cherchez un hôtel familial à Los Angeles ? Bienvenue au Magic View Hotel, un établissement de choix pour les voyageurs comme vous.
                </h3>
            </div>
            <div class="btn-down">
                <button type="submit" name="hintinthedown" action="#home" class="hint" onclick="dropdown()" style="z-index: 1;">
                    <span>
                        <svg class="down" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                            <rect width="48" height="48" fill="none"></rect>
                            <path d="M36.63,18.37a1.37,1.37,0,0,1,2.15.37,1.7,1.7,0,0,1-.3,2.06L25.4,32.64a1.37,1.37,0,0,1-1.85,0l-13-11.84a1.71,1.71,0,0,1-.29-2.06,1.37,1.37,0,0,1,2.15-.37l12.11,11ZM24.25,31.42a.38.38,0,0,1,.46,0l-.23-.21ZM11.71,19.55s0,.06,0,0Zm25.61,0h0Z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </main>
    <article>
        <div class="card">
            <a href="" class="card-a">
                <div class="content-img">
                    <img src="./img/" alt="">
                </div>

                <div class="content-text">
                    <h6 class="text-article">...</h6>
                    <img src="./img/play.png" alt="">
                </div>
            </a>
        </div>
    </article>
    <div class="plusart" id="threeart">
        <p onclick="gotoallchamber()">Voir toutes nos chambres...</p>
    </div>
    <?php include('./footer.php'); ?>
    <script>
        function dropdown() {
            document.getElementById('threeart').scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        function gotoallchamber() {
            window.location = './';
        }
    </script>
</body>

</html>