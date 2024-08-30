<?php
require "auth.php";

require "_header.php";
require "_navbar.php";
require __DIR__ . "/../classes/admin.php";
$admin = new Admin();
$result = $admin->getServices();
?>

<div class="container" style="margin-top: 100px;">
<a href="createService.php" class="btn btn-success mt-4 mb-4" type="submit" style="width: 100%; padding: 12px; font-size: 1.2rem; font-weight: bold;" name="submit">Ekle</a>

    <div class="row">
        <?php foreach ($result as $value): ?>
            <div class="col-md-4">
                <div class="card mb-4" style="width: 100%;">
                    <img class="card-img-top" src="<?php echo "../" . str_replace("\\", "/", $value["image"]); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($value["title"]); ?></h5>
                        <h6 class="card-title"><?php echo "₺" . htmlspecialchars($value["price"]); ?></h6>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <a href="updateService.php?id=<?php echo $value["id"]; ?>" class="btn btn-warning">Güncelle</a>
                        <a href="deleteService.php?id=<?php echo $value["id"]; ?>" class="btn btn-danger">Sil</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
