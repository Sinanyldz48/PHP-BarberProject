<?php
require_once "classes/admin.php";
$admin = new Admin();

$result = $admin->getPersonInfo();


?>
<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 mx-auto">
                <h2 class="mb-4">En İyi Kesimciler</h2>

                <div class="border-bottom pb-3 mb-5">
                    <p>2009'dan beri</p>
                </div>
            </div>

            <h6 class="mb-5">Berberlerimiz</h6>
  <?php foreach($result as $value):?>
            <div class="col-lg-5 col-12 custom-block-bg-overlay-wrap me-lg-5 m-5 mb-5 mb-lg-0">
                <img src="<?php echo $value["image"];?>" class="custom-block-bg-overlay-image img-fluid" alt="">

                <div class="team-info d-flex align-items-center flex-wrap">
                    <p class="mb-0"><?php echo $value["name"];?></p>

                    
                </div>
            </div>
            <?php endforeach;?>

            <!--
            <div class="col-lg-5 col-12 custom-block-bg-overlay-wrap m-5 mb-5 mt-4 mt-lg-0 mb-5 mb-lg-0">
                <img src="views\images/barber/portrait-mid-adult-bearded-male-barber-with-folded-arms.jpg" class="custom-block-bg-overlay-image img-fluid" alt="">

                <div class="team-info d-flex align-items-center flex-wrap">
                    <p class="mb-0">Sam</p>

                    <ul class="social-icon ms-auto">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook">
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            -->
                
        </div>
    </div>
</section>