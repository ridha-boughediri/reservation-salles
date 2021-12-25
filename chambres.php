<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

$getchambers = $bdd->query('SELECT * FROM chambres');
// $getchambersinfos = $getchambers->fetch();

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
    <link rel="stylesheet" href="./css/chambres.css">
    <title>Magic View Hotel | Chambres</title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <div class="container-titlechamb">
            <h1 class="mytitlechamb">Nos Chambres</h1>
        </div>
        <?php while ($getchambersinfos = $getchambers->fetch()) { ?>
            <div class="card">
                <div class="card-a">

                    <div class="content-title">
                        <h2 class="text-title"><?php echo $getchambersinfos['nom'] ?></h2>
                    </div>
                    <div class="imgandbtn">
                        <div class="content-img-card">
                            <img class="img-card" src="./img/imgcard/<?php echo $getchambersinfos['imgcard'] ?>" alt="">
                        </div>

                        <div class="content-btn-res">
                            <button class="btn-res">
                                <a href="./planning.php?id=<?php echo $getchambersinfos['id'] ?>">Voir les disponibilités </a>
                                <img class="btn-logo" src="./img/play.png" alt="">
                            </button>
                            <button class="btn-res">
                                <a href="./chambre.php?id=<?php echo $getchambersinfos['id'] ?>">Voir la chambre</a>
                                <img class="btn-logo" src="./img/play.png" alt="">
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        <?php } ?>
    </main>
    <?php include('./footer.php'); ?>
</body>


</html>