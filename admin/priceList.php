<?php 
require "auth.php";

require "_header.php";
require "_navbar.php";
require __DIR__ . "/../classes/admin.php";
    $getAdmin = new Admin();
    $result = $getAdmin->getPriceList();
?>
<div class="container mt-5">
    <h1 class="text-center">Liste</h1>
    <table class="table table">
        <thead>
            <tr class="table-dark">
                <th scope="col">Id</th>
                <th scope="col">İsim</th>
                <th scope="col">Fiyat</th>
                <th scope="col">Son Güncelleme</th>
                <th scope="col">Düzenle</th>
                <th scope="col">Sil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $key => $value):?>
            <tr>
                <th ><?php echo $value["id"];?></th>
                <th ><?php echo $value["name"];?></th>
                <th ><?php echo $value["price"];?></th>
                <th ><?php echo $value["last_update"];?></th>
                <th> <a class="btn btn-warning" href="edit_price.php?id=<?php echo $value["id"];?>" >Düzenle</a> </th>
                <th> <a class="btn btn-danger" href="delete.php?id=<?php echo $value["id"];?>" >Sil</a> </th>
            </tr>
            <?php endforeach;?>
            <tr>
            <td colspan="6" class="text-center"> <!-- Adjust colspan to match the number of columns -->
            <a href="createPrice.php" class="btn btn-success">Yeni Ekle</a>
        </td>
            </tr>
        </tbody>
        
    </table>
    
    <img src="img/price.png" alt="">
    

</div>