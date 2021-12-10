<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

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
    <link rel="stylesheet" href="./css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Formulaire d'inscription</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Inscription</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Login:</label><br>
                                <input type="text" name="login" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Mail:</label><br>
                                <input type="text" name="mail" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Repeat Password:</label><br>
                                <input type="text" name="confpassword" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="signin" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($erreur)) { ?>
       <center><p style="color: red;"><?php echo $erreur; ?></p></center> 
    <?php
    }
    ?>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>