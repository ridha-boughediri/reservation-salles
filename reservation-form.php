<?php
include('./fileconfig/config.php');
include('./fileconfig/configuser.php');


if (isset($_GET['id'])) {

    if (isset($_POST['btnSubmit'])) {
        // $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $dateFin = $_POST['dateFin'];

        if (isset($_GET['value'])) {
            $dateDeb = $_GET['value'];
        } else {
            $dateDeb = $_POST['dateDeb'];
        }
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
                        <!-- <input class="input-cal" type="datetime-local" name="dateFin"> -->
                        <select name="dateFin" class="input-cal">
                            <option value="">-- Date de fin --</option>
                            <?php for ($d = 0; $d < 15; $d++) { ?>

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
                                        <?php
                                        $heure_depart_matin = 8;
                                        $heure_fin_matin = 19;
                                        for ($hm = $heure_depart_matin; $hm <= $heure_fin_matin; $hm++) {
                                            $datedays = strtotime("+" . $d . "days");
                                            $dateday = date("Y-m-d", $datedays);
                                            $date  = $dateday . " " . $hm  . ":00:00";
                                        ?>
                                            <option value="<?php echo $date; ?>"><?php echo $date; ?></option>

                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input class="input-butt" type="submit" name="btnSubmit">
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

<?php } else {
    header("Refresh:0; url=./index.php");
} ?>