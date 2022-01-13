<?php
session_start();
if (isset($_SESSION['id'])) {
    $gotomypage = $_GET['deco'];
    session_destroy();
    header("Refresh:0; url=" . $gotomypage );
}else {
    header("Refresh:0; url=./index.php");
}
