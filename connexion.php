<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (!isset($_SESSION['id'])) {

    if (isset($_POST['val-button'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = sha1($_POST['password']);

        if (!empty($_POST['login']) and !empty($_POST['password'])) {
            $sql = $bdd->prepare("SELECT * FROM utilisateurs where login = ? and password = ? ");
            $sql->execute(array($login, $password));
            $sqlcount = $sql->rowCount();
            if ($sqlcount == 1) {
                $sqlinfos = $sql->fetch();
                $_SESSION['id'] = $sqlinfos['id'];
                header('Location: ./index.php');
            } else {
                $erreur = "Compte introuvable";
            }
        } else {
            $erreur =  "Champs incomplet";
        }
    }

?>

    <!DOCTYPE html>
    <html lang="fr-FR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
        <link rel="stylesheet" href="./css/stylescrollbar.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/signinandsignup.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Magic View Hotel | Connexion</title>
    </head>

    <body>
        <?php include('./header.php'); ?>
        <main>
            <div class="container-sign">
                <h2 class="text-title">Formulaire de connexion</h2>
                <div class="container-form">
                    <form class="login-form" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="text-label">Login:</label>
                            <input type="text" name="login" id="username" class="login-input">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-label">Password:</label>
                            <input type="text" name="password" id="password" class="login-input">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="val-button" id="submit-signin" class="login-submit" value="submit">
                        </div>
                        <!-- <div class="register-link">
                            <a href="./inscription.php" class="text-info">Register here &#10132;</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </main>
        <?php include('./footer.php'); ?>
        <?php
        if (isset($erreur)) { ?>
            <!-- <center><p style="color: red;"><?php echo $erreur; ?></p></center> -->
        <?php
        }
        ?>
    </body>

    </html>

<?php } else {
    header('Location: ./index.php');
} ?>