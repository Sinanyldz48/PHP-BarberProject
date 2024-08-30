
<?php
require_once "auth.php";
require __DIR__ . "/../classes/admin.php";
$admin = new Admin();
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $image = $_POST["image"];
    $create = $admin->createPersonal($title,$image);
    if ($create) {
        header("Location: personal.php");
        exit();
    }
}
require "_header.php";
require "_navbar.php";
?>
<form action="" method="post" style="margin-top: 5rem; max-width: 600px; margin-left: auto; margin-right: auto; background-color: #f8f9fa; padding: 2rem; border-radius: 8px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);">
  <div class="form-group">
    <label for="name" style="font-weight: bold; font-size: 1.2rem;">İsim Giriniz</label>
    <input type="text" class="form-control" id="name" name="title"  placeholder="İsim giriniz" style="padding: 10px; font-size: 1rem;">
  </div>
  <div class="form-group mt-3">
    <label for="image" style="font-weight: bold; font-size: 1.2rem;">Fotoğraf</label>
    <input type="text" class="form-control" id="image" name="image" placeholder="Fotoğraf URL'si giriniz" style="padding: 10px; font-size: 1rem;">
  </div>
  <button class="btn btn-success mt-4" type="submit" style="width: 100%; padding: 12px; font-size: 1.2rem; font-weight: bold;" name="submit">Ekle</button>
</form>
