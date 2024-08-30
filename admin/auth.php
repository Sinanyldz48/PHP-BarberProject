<?php
session_start(); // Oturumu başlat

if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
    // Oturum açılmamışsa veya geçerli değilse yönlendirme yap
    header("Location: ../adminLogin/login.php");
    exit;
}
?>