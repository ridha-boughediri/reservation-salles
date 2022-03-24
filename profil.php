//editionprofil
<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_SESSION['id'])) {


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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
        <link rel="stylesheet" href="./css/stylescrollbar.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/profil.css">
        <title>Magic View Hotel | Profil</title>
    </head>

    <body>
        <?php include('./header.php'); ?>
        <main>
            <div class="container-sign">
                <h3 class="text-title">Modification de son profil</h3>
                <div class="container-form">
                    <form class="login-form" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="text-label">Login:</label><br>
                            <input type="text" name="login" class="login-input" placeholder="<?php echo $usersinfo['login'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-label">Mail:</label><br>
                            <input type="text" name="mail" class="login-input" placeholder="<?php echo $usersinfo['mail'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-label">Password:</label><br>
                            <input type="password" name="password" class="login-input" placeholder=".......">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit" id="submit-signup" class="login-submit" value="Éditer">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include('./footer.php'); ?>
    </body>

    </html>

<?php } else {
    header("Refresh:0; url=./index.php");
}
?>