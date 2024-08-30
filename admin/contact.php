<?php 
require_once "auth.php";

require __DIR__ . "/../classes/admin.php";
$getAdmin = new Admin();
$result = $getAdmin->getContactInfo();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $errors = [];

    // E-posta adresini doğrula
    if (empty($_POST["mail"])) {
        $errors[] = "E-posta alanı boş olamaz.";
    }else {
        $mail = $_POST["mail"];
    }

    // Telefon numarasını doğrula
    if (empty($_POST["phone"])) {
        $errors[] = "Telefon alanı boş olamaz.";
    }else {
        $phone = $_POST["phone"];
    }

    // Çalışma saatlerini doğrula
    if (empty($_POST["working_time"])) {
        $errors[] = "Çalışma saatleri alanı boş olamaz.";
    } else {
        $working_time = $_POST["working_time"];
    }

    // Konumu doğrula
    if (empty($_POST["location"])) {
        $errors[] = "Konum alanı boş olamaz.";
    } else {
        $location = $_POST["location"];
    }

    // Bayiler alanını doğrula
    if (empty($_POST["bayiler"])) {
        $errors[] = "Bayiler alanı boş olamaz.";
    } else {
        $bayiler = $_POST["bayiler"];
    }

    // Açık adres alanını doğrula
    if (empty($_POST["acik_adres"])) {
        $errors[] = "Açık adres alanı boş olamaz.";
    } else {
        $acik_adres = $_POST["acik_adres"];
    }

    // Hataları kontrol et
    if (empty($errors)) {
        $update = $getAdmin->updateContactInfo($mail, $phone, $working_time, $location, $bayiler, $acik_adres);

        if (!$update) {
            echo '<div class="alert alert-danger"">Sunucu hatası, işlem gerçekleştirilemedi.</div>';
            
        }
    }
    header("Location: contact.php");
    
}
require "_header.php";
include_once "_navbar.php";
?>
<form action="" method="post">
<div class="row" style="margin-top: 4rem;">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Mail</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $result["mail"] ?></h5>
                <small>Yeni e mail</small>
                <input type="text" class="form-control" name="mail" value="<?php echo $result["mail"]?>">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Telefon Numarası</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $result["phone"] ?></h5>
                <small>Yeni Telefon Numarası</small>
                <input type="text" class="form-control" name="phone" value="<?php echo $result["phone"]?>">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Çalışma Saatleri</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $result["working_time"]?></h5>
                <small>Yeni Çalışma Saatleriniz</small>
                <input type="text" class="form-control" name="working_time" value="<?php echo $result["working_time"]?>">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Harita Konumu(maps)</div>
            <div class="card-body">
                <h5 class="card-title">Yeni Harita Konumunuzu Buraya Giriniz</h5>
                <input type="text" class="form-control" name="location" value="<?php echo $result["location"]?>">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Bayiler</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $result["bayiler"]?></h5>
                <small>Yeni Bayi Adı</small>
                <input type="text" class="form-control" name="bayiler" value="<?php echo $result["bayiler"]?>">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Açık Adres</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $result["acik_adres"]?></h5>
                <small>Yeni Açık Adres</small>
                <input type="text" class="form-control" name="acik_adres" value="<?php echo $result["acik_adres"]?>">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col text-center">
            <button type="submit" name="update" class="btn btn-lg btn-warning mt-4" style="width: 50%; font-size: 1.5rem;">
                Güncelle
            </button>
        </div>
    </div>
</div>
<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])):?>
<?php foreach($errors as $error):?>
    <div class="alert alert-danger mt-5 m-5" style="margin-top: 20px;">"<?php echo $error?>"</div>
<?php endforeach;?>
<?php endif;?>
</form>

