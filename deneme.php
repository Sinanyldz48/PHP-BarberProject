<?php
    if (isset($_POST["ss"])) {
        echo $_POST["time"];
    }
    
?>
<form action="deneme.php" method="post">
    <label for="time">Seçim Yapın:</label>
    <select id="time" name="time">
        <?php
        // PHP kodu burada çalışacak
        $hours = range(0, 23); // Saatler 0'dan 23'e kadar
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
    <input type="submit" name="ss" value="Gönder">
</form>
