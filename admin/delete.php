<?php 
    require "auth.php";
    $id = $_GET["id"];
    require __DIR__ . "/../classes/admin.php";
    $admin = new Admin();
    $result = $admin->deletePrice($id);
    if ($result) {
        header("Location: priceList.php");
    }
    else
    {
        echo '<div class="alert alert-danger mt-5" role="alert">
                Sunucu Hatası
             </div>';
    }



    require "_header.php";
    require_once "_navbar.php";
?>
