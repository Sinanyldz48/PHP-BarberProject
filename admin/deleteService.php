<?php
require "auth.php";
require "_header.php";
require __DIR__ . "/../classes/admin.php";
$admin = new Admin();
$id = $_GET["id"];
$result = $admin->deleteService($id);
if ($result) {
    header("Location: services.php");
    exit(); // header yönlendirmesi sonrasında betiğin çalışmasını durdur.
}
?>