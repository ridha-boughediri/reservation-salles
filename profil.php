<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

$getid = $_SESSION['id'];

if (isset($_POST['edit'])) {
    if (!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
        $recupLogin = $bdd->prepare('UPDATE utilisateurs SET login = ? WHERE id = ?');
        $recupLogin->execute(array($login, $getid));
    }
}
if (isset($_POST['edit'])) {
    if (!empty($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $recupMail = $bdd->prepare('UPDATE utilisateurs SET mail = ? WHERE id = ?');
        $reucpMail->execute(array($mail, $getid));
    }
}
if (isset($_POST['edit'])) {
    if (!empty($_POST['password'])) {
        $password = sha1($_POST['password']);
        $recupPassword = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE id = ?');
        $recupPassword->execute(array($password, $getid));
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
    <title>Page profil</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <div id="login">
        <h3 class="text-center text-white pt-5">Modification de son profil</h3>
        <div class="container">
            <?php
            $recupUsers = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
            $recupUsers->execute(array($getid));
            $recupUserInfo = $recupUsers->fetch();
            ?>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">information profil</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Login:</label><br>
                                <input type="text" name="login" placeholder="<?php echo $recupUserInfo['login'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Mail:</label><br>
                                <input type="text" name="mail" placeholder="<?php echo $recupUserInfo['mail'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" placeholder="<?php echo $recupUserInfo['password'] ?>">
                            </div>
                            <div>
                            <input style="color: green;" type="submit" name="edit" value="Edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>