<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_POST['val-button'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);

    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $sql = $bdd->prepare("SELECT * FROM utilisateurs where login = ? and password = ? ");
        $sql->execute(array($login, $password));
        $sqlcount = $sql->rowCount();
        if ($sqlcount == 1) {
            $sqlinfos = $sql->fetch();
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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <div id="login">
        <h3 class="text-center text-white pt-5">Formulaire de connexion</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Login:</label><br>
                                <input type="text" name="login" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="val-button" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="./inscription.php" class="text-info">Register here</a>
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

</html>