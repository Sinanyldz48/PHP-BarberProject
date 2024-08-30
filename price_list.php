<?php

require_once 'classes\admin.php';
    $admin = new Admin();
    $result = $admin->getPriceList();
?>
<section class="price-list-section section-padding" id="section_4">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-8 col-12">
                                    <div class="price-list-thumb-wrap">
                                        <div class="mb-4">
                                            <h2 class="mb-2">Fiyat Listesi</h2>
                                                
                                            <strong>Başlangıç Fiyatı ₺200</strong>
                                        </div>
                                        <?php foreach($result as $value):?>
                                            <div class="price-list-thumb">
                                            <h6 class="d-flex">
                                                <?php echo $value["name"]?>
                                                <span class="price-list-thumb-divider"></span>

                                                <strong>₺<?php echo $value["price"]?></strong>
                                            </h6>
                                        </div>
                                        <?php endforeach;?>            
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 custom-block-bg-overlay-wrap mt-5 mb-5 mb-lg-0 mt-lg-0 pt-3 pt-lg-0">
                                    <img src="views\images\vintage-chair-barbershop.jpg" class="custom-block-bg-overlay-image img-fluid" alt="">
                                </div>

                            </div>
                        </div>
                    </section>