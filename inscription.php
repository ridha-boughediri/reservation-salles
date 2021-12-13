<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (!isset($_SESSION['id'])) {

    if (isset($_POST['signin'])) {
        $login = htmlspecialchars($_POST['login']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = sha1($_POST['password']);
        $confpassword = sha1($_POST['confpassword']);
        if (!empty($_POST['login']) and !empty($_POST['mail']) and !empty($_POST['password'])) {
            if ($password == $confpassword) {
                $insertuser = $bdd->prepare('INSERT INTO utilisateurs (login, mail, password) VALUES (?,?,?)');
                $insertuser->execute(array($login, $mail, $password));
                header('Location: connexion.php');
            } else {
                $erreur = "Mot de passe different";
            }
        } else {
            $erreur = "Champs incomplet";
        }
    }

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
        <link rel="stylesheet" href="./css/stylescrollbar.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/signinandsignup.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
    </head>

    <body>
        <?php include('./header.php'); ?>
        <main>
            <div class="container-sign">
                <h2 class="text-title">Formulaire d'inscription</h2>
                <div class="container-form">
                    <form class="login-form" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="text-label">Login:</label>
                            <input type="text" name="login" id="username" class="login-input">
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-label">Mail:</label>
                            <input type="text" name="mail" id="username" class="login-input">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-label">Password:</label>
                            <input type="text" name="password" id="password" class="login-input">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-label">Repeat Password:</label>
                            <input type="text" name="confpassword" id="password" class="login-input">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="signin" id="submit-signup" class="login-submit" value="submit">
                        </div>
                        <!-- <div class="register-link">
                            <a href="./connexion.php" class="text-info">Sign in here &#10132;</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </main>
        <?php include('./footer.php'); ?>
        <?php if (isset($erreur)) { ?>
            <!-- <div class="error">
            <p style="color: red;"><?php echo $erreur; ?></p>
        </div> -->
        <?php } ?>
    </body>

    </html>

<?php } else {
    header('Location: ./index.php');
} ?>