<?php 
require "auth.php";

require __DIR__ . "/../classes/admin.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID parametresi bulunamadı.";
}
    $getAdmin = new Admin();
    
    $result = $getAdmin->getPriceById($id);
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $price = $_POST["price"];
        $name = $_POST["name"];
        $result = $getAdmin->updatePrice($name,$price,$id);
        if($result)
        {
            header("Location: priceList.php");
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
                    Sunucu Hatası
                </div>';
        }
    }
    require "_header.php";
    require "_navbar.php";
?>


<form action="" method="post" style="margin-top: 5rem;">
  <div class="form-group">
    <label for="name">İsim Giriniz</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $result["name"]?>">
  </div>
  <div class="form-group">
    <label>Fiyat Giriniz</label>
    <input type="number" class="form-control" name="price" value="<?php echo $result["price"]?>">
  </div>
    <button class="btn btn-success" type="submit">Güncelle</button>
</form>