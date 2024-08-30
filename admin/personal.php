<?php 
require "auth.php";
require "_header.php";
require "_navbar.php";
require __DIR__ . "/../classes/admin.php";
    $getAdmin = new Admin();
    $result = $getAdmin->getPersonInfo();
?>
<div class="container">
<div class="row">
<?php foreach($result as $value):?>
  <div class="card col-md-4" style="width: 18rem; margin-top:5rem; margin-left:4rem;">
    <img class="card-img-top" src="<?php echo $value["image"]; ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?php echo $value["name"]; ?></h5>

        <div class="d-flex">
            <a href="editPersonal.php?id=<?php echo $value["id"]; ?>" class="btn btn-warning me-2">Düzenle</a>
            <a href="deletePersonal.php?id=<?php echo $value["id"]; ?>" class="btn btn-danger">Sil</a>
        </div>
    </div>
</div>

<?php endforeach;?>
<a href="createPersonal.php" class="btn btn-success mt-5">Yeni Ekle</a>
  </div>
  
</div>