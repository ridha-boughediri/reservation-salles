<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

$getidchamber = $_GET['id'];
$getchamb = $bdd->prepare('SELECT * FROM chambres WHERE imgcard = ? ');
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
                        <div class="lign-color"></div>
                        <p class="infos-import">
                            <?php echo $getchambinfos["price"]; ?>$ / nuit •
                            <?php echo 'Chambre de Luxe' ?>
                        </p>
                    </div>
                    <div class="group-btn">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <button class="btn-view" onclick="window.location.href='./planning.php?id=<?php echo $getchambinfos['imgcard'] ?>';" title="Voir les disponibilités" type="submit">Voir les disponibilités</button>
                        <?php } else { ?>
                            <button class="btn-view dex" title="Connectez-Vous" type="button">Indisponibles (Connectez-vous)</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <article>

            <div class="desc-content">
                <h4 class="title-desc">Description:</h4>
                <div class="text-desc">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus fugit voluptatibus enim veniam incidunt, excepturi, hic dolore unde maiores blanditiis quia. Repudiandae perferendis, culpa ad consequatur quis quidem at illum.
                </div>
            </div>

        </article>
    </main>

    <?php include('./footer.php'); ?>

</body>

</html>