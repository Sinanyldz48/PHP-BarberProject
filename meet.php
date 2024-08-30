<?php
$eklendi = 0;
$message = "";
$err = "";
// Formdan alınan değerlerin başlangıç değerleri
$name  = $mail = $note = $phone = $number_people = $time =  $date = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Hata mesajlarının başlangıç değerleri
    $name_err = $mail_err = $note_err = $phone_err = $number_people_err = $time_err = $date_err = "";

    // Validation işlemleri

    // Name validation
    if (empty(trim($_POST["name"]))) {
        $name_err = "Lütfen İsim Alanını Boş Geçmeyiniz.";
    } elseif (strlen(trim($_POST["name"])) < 3) {
        $name_err = "İsim Alanı En az 3 karakter olmalı.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Email validation
    if (empty(trim($_POST["mail"]))) {
        $mail_err = "Lütfen e-posta adresinizi girin.";
    } elseif (!filter_var(trim($_POST["mail"]), FILTER_VALIDATE_EMAIL)) {
        $mail_err = "Geçerli bir e-posta adresi girin.";
    } else {
        $mail = trim($_POST["mail"]);
    }

    // Note validation
    if (strlen(trim($_POST["note"])) > 500) { // Maksimum 500 karakter, ihtiyaca göre ayarlayabilirsiniz
        $note_err = "Not kısmı 500 karakterden fazla olamaz.";
    } else {
        $note = trim($_POST["note"]);
    }

    // Phone validation
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Lütfen telefon numaranızı girin.";
    } elseif (!preg_match('/^[0-9]{10,15}$/', trim($_POST["phone"]))) { // 10-15 rakam uzunluğunda
        $phone_err = "Geçerli bir telefon numarası girin.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Number of people validation
    if (empty(trim($_POST["number_people"]))) {
        $number_people_err = "Lütfen kişi sayısını girin.";
    } elseif (!is_numeric(trim($_POST["number_people"])) || (int)trim($_POST["number_people"]) <= 0) {
        $number_people_err = "Kişi sayısı pozitif bir sayı olmalıdır.";
    } else {
        $number_people = trim($_POST["number_people"]);
    }

    // Time validation
    if (empty(trim($_POST["time"]))) {
        $time_err = "Lütfen zamanı girin.";
    } else {
        $time = trim($_POST["time"]);
    }

    // Date validation
    if (empty(trim($_POST["date"]))) {
        $date_err = "Lütfen tarihi girin.";
    } else {
        $date = trim($_POST["date"]);
    }

    // Formdan gelen verilerde hata olup olmadığını kontrol et
    if (empty($name_err) && empty($mail_err) && empty($note_err) && empty($phone_err) && empty($number_people_err) && empty($time_err) && empty($date_err)) {
        require_once 'classes/db.class.php';
        require_once 'classes/users.php';
        $user = new Users();

        //print_r($user->karsilastir($date,$time));
        if ($user->createMeet($name, $date, $time, $note, $phone, $mail, $number_people)) {
            $eklendi = 1;
            $message = "Randevunuz Başarıyla Oluşturuldu!!";
            $mail_subject = "Jentilmen Berber Randevu Bilgileriniz";
            //$mail_body = "Sayın ".$name.", Randevu Bilgileri:\nRandevu Tarihi: ".$date." ".$time."\nGelecek Kişi Sayısı: ".$number_people."\nİyi Günler Dileriz.";
            $mail_body = "
            <html>
            <head>
                <style>
                    .container {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                        background-color: #f9f9f9;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                    }
                    .header {
                        font-size: 20px;
                        font-weight: bold;
                        color: #333;
                    }
                    .details {
                        margin-top: 15px;
                        font-size: 16px;
                        color: #555;
                    }
                    .footer {
                        margin-top: 20px;
                        font-size: 14px;
                        color: #888;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <p class='header'>Sayın $name,</p>
                    <p class='details'>
                        Randevu Bilgileri:<br>
                        <strong>Randevu Tarihi:</strong> $date $time<br>
                        <strong>Gelecek Kişi Sayısı:</strong> $number_people
                    </p>
                    <img src='views\images\\templatemo-barber-logo.png' alt='Randevu' style='margin-top: 20px; width: 100%; border-radius: 8px;'>
                    <p class='footer'>
                        😊 İyi Günler Dileriz!<br>
                        <strong>Şirketinizin Adı</strong>
                    </p>
                </div>
            </body>
            </html>
            ";
            if ($user->sendMail($mail, $mail_subject, $mail_body)) {
                $message .= " Mail Adresinize Detaylı Bilgiler Gönderildi";
            } else {
                $message .= " Ancak Mail Gönderirken Sistemimiz Kaynaklı Hata Oluştu.";
            }
        } else {
            $eklendi = 0;
            $message = "Seçmiş olduğunuz randevu tarihi dolu kayıt eklenemedi:( Lütfen tekrar kayıt yapınız";
        }
    } else
        
        $err = "Sorun Var<br>" . $name_err . "<br>" . $mail_err . "<br>" . $note_err . "<br>" .  $phone_err . "<br>" . $number_people_err . "<br>" . $time_err . "<br>" . $date_err;
}
?>
<section class="booking-section section-padding" id="booking-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12 mx-auto">
                <form action="index.php#booking-section" method="POST" class="custom-form booking-form" id="bb-booking-form" role="form">
                    <div class="text-center mb-5">
                        <?php if (!empty($err)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $err; ?>
                            </div>
                        <?php endif;?>
                        <?php if ($eklendi == 1): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="mb-1">Koltuk Ayırtın</h2>

                        <p>Lütfen formu doldurun, size geri dönüş yapalım</p>
                    </div>

                    <div class="booking-form-body">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" name="name" id="bb-name" class="form-control" placeholder="Adınız Soyadınız" required value="<?php echo $name;?>">
                            </div>

                            <div class=" col-lg-6 col-12">
                                <input type="tel" class="form-control" name="phone" placeholder="Telefon Numarası 05xx-xxx-xxxx" required value="<?php echo $phone;?>">
                            </div>

                            <div class=" col-lg-6 col-12 mb-3">
                                <select id="bb-time" name="time" class="form-select"> 
                                    <?php
                                    $hours = range(8, 21); // Saatler 0'dan 23'e kadar
                                    $minutes = [0, 30]; // Dakikalar sadece 0 ve 30

                                    foreach ($hours as $hour) {
                                        foreach ($minutes as $minute) {
                                            // Saat ve dakikayı iki basamaklı yap
                                            $hourFormatted = str_pad($hour, 2, '0', STR_PAD_LEFT);
                                            $minuteFormatted = str_pad($minute, 2, '0', STR_PAD_LEFT);
                                            echo "<option value=\"$hourFormatted:$minuteFormatted\">$hourFormatted:$minuteFormatted</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="mail" class="form-control" name="mail" placeholder="E-mail Adresiniz" required value="<?php echo $mail;?>">
                            </div>
                            <div class="col-lg-6 col-12">
                                <input type="date" name="date" id="bb-date" class="form-control" placeholder="Date" required value="<?php echo $date;?>">
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="number" name="number_people" id="bb-number" class="form-control" placeholder="Kişi Sayısı" value="<?php echo $number_people;?>">
                            </div>
                        </div>

                        <textarea name="note" rows="3" class="form-control" id="bb-message" placeholder="Notunuz (Opsiyonel)" value="<?php echo $note;?>"></textarea>

                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                            <button type="submit" name="randevu" class="form-control">Randevu Oluştur</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>