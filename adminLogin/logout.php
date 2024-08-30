<?php
// Başlangıçta oturumu başlat
session_start();

// Oturum değişkenlerini temizle
session_unset();

// Oturumu tamamen sonlandır
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendir
header("Location: login.php");
exit();
?>