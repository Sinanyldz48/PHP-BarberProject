<?php

$admin = new Admin();

$result = $admin->getContactInfo();
include_once "views/_header.php";

?>
<section class="contact-section" id="section_5">
    <div class="section-padding section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center">Say hello</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h5 class="mb-3"><strong>İletişim</strong> Bilgileri</h5>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: <?php echo $result["phone"] ?>" class="site-footer-link">
                            (+90)
                            <?php echo $result["phone"] ?>
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                            <?php echo $result["mail"] ?>
                        </a>
                    </p>

                    
                </div>

                <div class="col-lg-5 col-12 contact-block-wrap mt-5 mt-lg-0 pt-4 pt-lg-0 mx-auto">
                    <div class="contact-block">
                        <h6 class="mb-0">
                            <span class="material-symbols-outlined">
                                schedule
                            </span>

                            <strong>Çalışma Saatlerimiz</strong>

                            <span class="ms-auto"><?php echo $result["working_time"] ?> </span>
                        </h6>
                    </div>
                </div>

                <div class="col-lg-12 col-12 mx-auto mt-5 pt-5">
                    <iframe src="<?php echo $result["location"] ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div>
</section>