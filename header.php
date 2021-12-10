<header>
    <nav>
        <div class="list-goto">
            <h2 class="goto">Infos Hotel</h2>
            <h2 class="goto">Réserver une chambre</h2>
        </div>
        <div class="logo">
            <img src="./img/logo.png" alt="">
        </div>
        <div class="list-goto">
            <h2 class="goto" onclick="gotoincription()">Inscription</h2>
            <h2 class="goto" onclick="gotoconnexion()">Connexion</h2>
        </div>
    </nav>
</header>

<script>
    function gotoincription() {
        window.location = './inscription.php';
    }

    function gotoconnexion() {
        window.location = './connexion.php';
    }
</script>