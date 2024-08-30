<?php
require_once "auth.php"; 



require __DIR__ . "/../classes/admin.php";
$message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST["name"]);
        $price = trim($_POST["price"]);
        if (empty($name)) {
          $message = "Lütfen boş girmeyiniz";
        }
        elseif (strlen($name)<4) {
          $message = "En az 3 karakter giriniz";
        }else {
          $name = trim($_POST["name"]);
        }
        $admin = new Admin();
        $result = $admin->createPrice($name,$price);
        if ($result) {
            header("Location:priceList.php");
        }
        else
        {
            echo '<div class="alert alert-danger mt-5" role="alert">
                    Sunucu Hatası
                </div>';
        }
    }
    require "_header.php";
    require "_navbar.php";
?>

<span><?php echo $message?></span>
<form action="" method="post" style="margin-top: 5rem;">
  <div class="form-group">
    <label for="name">İsim Giriniz</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label>Fiyat Giriniz</label>
    <input type="number" class="form-control" name="price">
  </div>
    <button class="btn btn-success mt-2" type="submit">Ekle</button>
</form>