<?php
require "auth.php";
require "_header.php";
require __DIR__ . "/../classes/admin.php";
$admin = new Admin();
$id = $_GET["id"];
$result = $admin->deletePersonal($id);
if ($result) {
    header("Location: personal.php");
    exit();
}
?>