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
        <section>
            <div class="back-img" style="background-image: url(./img/imgback/<?php echo $getchambinfos["imgback"]; ?>.jpg);"></div>
            <div class="back-gradiant"></div>
            <div class="place-view">
                <div class="infos-content">
                    <h2 class="title-name"><?php echo $getchambinfos["nom"]; ?></h2>
                    <div class="infos-import">
                        <?php echo $getchambinfos["price"]; ?>$
                    </div>

                </div>
                <div class="btn-content">
                    <form class="group-btn" action="" method="post">
                        <button class="btn-view" title="Lecture" name="play" type="submit">Réserver la Chambre</button>
                    </form>
                </div>
                <div class="tagline-content">
                    <h5 class="title-tagline">.................</h5>
                </div>
                <div class="synopsis-content">
                    <h4 class="title-synopsis">Synopsis:</h4>
                    <div class="text-synopsis">
                        .................
                    </div>
                </div>
            </div>
        </section>
        <article>
            <?php if ($getsection == "series" || $getsection == "anime") {
                $episode = "display: flex;";
                $sugg = "display: flex;";
                if ($getbonuscount > 0) {
                    $bonus = "display: flex;";
                } else {
                    $bonus = "display: none;";
                }
            } else {
                $episode = "display: none;";
                $sugg = "display: flex;";
                if ($getbonuscount > 0) {
                    $bonus = "display: flex;";
                } else {
                    $bonus = "display: none;";
                }
            } ?>

            <?php if ($getsection == "tv") {
                $GOB = "GROUPE";
            } elseif ($getsection == "music") {
                $GOB = "TITRE";
            } else {
                $GOB = "BONUS";
            } ?>

            <!-- ÉPISODES -->
            <div id="page3" style="<?php echo $episode; ?>" class="selectionongletview">
                <p id="pop3">ÉPISODES</p> <span>&#8595;</span>
            </div>

            <div id="p3" class="detailview">

                <section class="box_sande">

                    <?php for ($i = 1; $i <= $getchambinfos['saison']; $i++) { ?>
                        <div class="bloc_saison">
                            <h4>Saison <?php echo $i ?></h4>

                            <?php
                            $reqserienbsaison = $bdd->prepare('SELECT * FROM episodesofview WHERE id_view = ? and saison = ?');
                            $reqserienbsaison->execute(array($getidview, $i));
                            $serienbsaison = $reqserienbsaison->fetch();
                            $serienbep = $reqserienbsaison->rowCount();
                            ?>

                            <div class="box_episode">
                                <?php for ($e = 1; $e <= $serienbep; $e++) { ?>
                                    <form action="./viewcontainer.php?id_view=<?php echo $serienbsaison['id_view']; ?>&id_sa=<?php echo $i; ?>&id_ep=<?php echo $e; ?>" method="post" class="btn-view-ep">
                                        <input type="submit" name="sub-ep-view" value="Saisons <?php echo $i ?> Episodes <?php echo $e ?>">
                                    </form>
                                <?php
                                } ?>
                            </div>
                        </div>
                    <?php
                    } ?>
                </section>

            </div>

            <!-- SUGGESTIONS -->

            <div id="page1" style="<?php echo $sugg; ?>" class="selectionongletview">
                <p id="pop1">SUGGESTIONS</p> <span>&#8595;</span>
            </div>

            <div id="p1" class="detailview">

                <section class="box_card" id="box-sugg">
                    <div class="carousel">
                        <?php
                        $reqsugg = $bdd->query('SELECT * FROM infos_view order by RAND() LIMIT 5');
                        ?>
                        <?php while ($viewsuggsinfos = $reqsugg->fetch()) { ?>
                            <div class="carousel-cell">
                                <div class="view_card">
                                    <a href="./viewcontainer.php?id_view=<?php echo $viewsuggsinfos['id']; ?>"><img src="./images/<?php echo $viewsuggsinfos['section']; ?>/miniwall/<?php echo $viewsuggsinfos['miniwall']; ?>" alt=""></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </section>

            </div>

            <!-- BONUS || GROUPE -->

            <div id="page2" style="<?php echo $bonus; ?>" class="selectionongletview">
                <p id="pop2"><?php echo $GOB; ?></p> <span>&#8595;</span>
            </div>

            <div id="p2" class="detailview">

                <section class="box_card">
                    <div class="carousel">
                        <?php
                        $reqbonusview = $bdd->prepare('SELECT * FROM bonus WHERE serie_id = ?');
                        $reqbonusview->execute(array($getidview));
                        $bonusviewinfos = $reqbonusview->fetchall();
                        $bonusviewinfoscounts = $reqbonusview->rowCount();
                        ?>
                        <?php for ($vi = 0; $vi < $bonusviewinfoscounts; $vi++) { ?>
                            <div class="carousel-cell">
                                <form action="./viewcontainer.php?id_view=<?php echo $getidview; ?>&id_bonus=<?php echo $bonusviewinfos[$vi]["id"]; ?>" method="POST" class="view_card">
                                    <button type="submit" name="sub-bonus-view" class="view_card_bonus"><img src="./images/<?php echo $getsection; ?>/miniwall/<?php echo $GOB; ?>/<?php echo $bonusviewinfos[$vi]["miniwall"]; ?>" alt=""></button>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </section>
            </div>

        </article>
    </main>

    <?php include('./footer.php'); ?>

    <script src="./js/page.js"></script>
    <script src="./js/flickity.js"></script>


</body>

</html>