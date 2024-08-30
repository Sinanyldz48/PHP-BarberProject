<?php
require_once "classes/admin.php";
$admin = new Admin();

$result = $admin->getServices();


?>
<section class="services-section section-padding" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h2 class="mb-5">Servisler</h2>
            </div>
            <?php foreach ($result as $value): ?>
                <div class="col-lg-6 col-12 mb-4 mb-lg-0" style="margin-bottom: 3rem;">
                    <div class="services-thumb mb-2">
                        <img src="<?php echo $value["image"] ?>" class="services-image img-fluid" alt="">
                        <div class="services-info d-flex align-items-end">
                            <h4 class="mb-0"><?php echo $value["title"] ?></h4>
                            <strong class="services-thumb-price">₺<?php echo $value["price"] ?></strong>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>