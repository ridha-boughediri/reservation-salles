<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

$getidchamber = intval($_GET['id']);
$getchamb = $bdd->prepare('SELECT * FROM chambres WHERE id = ? ');
$getchamb->execute(array($getidchamber));
$getchambinfos = $getchamb->fetch();

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
    <link rel="stylesheet" href="./css/chambre.css">
    <title>Magic View Hotel | <?php echo $getchambinfos["nom"]; ?> </title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <section style="background-image: url(./img/imgback/<?php echo $getchambinfos["imgback"]; ?>.jpg);">
            <div class="container-place-view">
                <div class="place-view">
                    <div class="infos-content">
                        <h2 class="title-name"><?php echo $getchambinfos["nom"]; ?></h2>
                        <p class="infos-import">
                            <?php echo $getchambinfos["price"]; ?>$ •
                            <?php echo 'chambre de luxe' ?>
                        </p>
                    </div>
                    <form class="group-btn" action="" method="post">
                        <button class="btn-view" title="Réserver la Chambre" name="play" type="submit">Réserver la Chambre</button>
                    </form>
                </div>
            </div>
        </section>
        <article>
            <div class="tagline-content">
                <h5 class="title-tagline">.................</h5>
            </div>
            <div class="synopsis-content">
                <h4 class="title-synopsis">Lorem:</h4>
                <div class="text-synopsis">
                    .................
                </div>
            </div>

        </article>
    </main>

    <?php include('./footer.php'); ?>

</body>

</html>