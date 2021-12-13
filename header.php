<?php
$url = $_SERVER['PHP_SELF'];

if (isset($_GET['deco'])) {
    session_destroy();
    header("Location:./index.php");
}

?>

<header>
    <nav>
        <div class="list-goto">
            <h2 class="goto">Infos Hotel</h2>
            <h2 class="goto">Réserver une chambre</h2>
        </div>
        <div class="logo">
            <img src="./img/logo.png" alt="">
        </div>

        <?php if (isset($_SESSION['id'])) { ?>
            <div class="list-goto">
                <h2 class="goto" onclick="gotoprofile()">Profil</h2>
                <h2 class="goto" onclick="gotodeconnexion()">Déconnexion</h2>
            </div>
        <?php } else { ?>
            <div class="list-goto">
                <h2 class="goto" onclick="gotoincription()">Inscription</h2>
                <h2 class="goto" onclick="gotoconnexion()">Connexion</h2>
            </div>
        <?php } ?>
    </nav>
</header>

<script>
    function gotoincription() {
        window.location = './inscription.php';
    }

    function gotoconnexion() {
        window.location = './connexion.php';
    }

    function gotoprofile() {
        window.location = './profil.php';
    }

    function gotodeconnexion() {
        window.location = '<?php echo $url ?>?deco';
    }
</script>