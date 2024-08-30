<?php

$admin = new Admin();

$result = $admin->getContactInfo();


?>
<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h4 class="site-footer-title mb-4">Bayilerimiz</h4>
            </div>

            <div class="col-lg-4 col-md-6 col-11">
                <div class="site-footer-thumb">
                    <strong class="mb-1"><?php echo strtoupper($result["bayiler"]) ?></strong>

                    <p><?php echo strtoupper($result["acik_adres"]) ?></p>
                </div>
            </div>

        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-8 col-12 mt-4">
                    <p class="copyright-text mb-0">Copyright © 2036 Barber Shop
                        - Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a></p>
                </div>

                <div class="col-lg-2 col-md-3 col-3 mt-lg-4 ms-auto">
                    <a href="#section_1" class="back-top-icon smoothscroll" title="Back Top">
                        <span class="material-symbols-outlined">
                            arrow_upward
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</footer>
</div>

<!-- JAVASCRIPT FILES -->
<script>
    // Bugünün tarihini al
    const today = new Date().toISOString().split('T')[0];
    // min özniteliğini ayarla
    document.getElementById('bb-date').setAttribute('min', today);
</script>
<script src="../views/js/jquery.min.js"></script>
<script src="../views/js/bootstrap.min.js"></script>
<script src="../views/js/click-scroll.js"></script>
<script src="../views/js/custom.js"></script>

</body>

</html>