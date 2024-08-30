<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Users extends DB
{
    public function karsilastir($input_date,$input_time)
    {
        $sql = "SELECT date,time FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $value) {
            $date = trim($value["date"]);
            $time = trim($value["time"]);
            //Hata ayıklama sırasında kullanıldı:)
            /*
            if ($time) {
                return $date."<br>".$time;
            }
            else
            {
                return false;
            }
              */
            if ($input_date == $date && $input_time.":00" ==  $time) {
                return true;
            }
               
        }
        return false;
    }
    public function createMeet($fullName,$date,$time,$note,$phone,$mail,$number_people)
    {
        $karsilastir = $this->karsilastir($date,$time);
        if ($karsilastir != true) {
            $sql = "INSERT INTO users(full_name,date,time,note,phone,mail,number_people) VALUES(?,?,?,?,?,?,?);";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fullName,$date,$time,$note,$phone,$mail,$number_people]);
            return true;//Kayıt oluştuysa true döndür
        }
        else
        {
            return false;//Kayıt olmadıysa false
        }
        
    }
    public function sendMail($to,$subject,$body)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        $mail = new PHPMailer();// PhpMailer nesnesi oluşturduk
        $mail->isSMTP(); // bunun bir smtp olduğunu söyledik
        $mail->SMTPAuth=true; //Burada smtp sunucusuna bağlanırken kimlik doğrulaması olcak mı(Genellikle true olur)
        $mail->SMTPSecure="tls"; // Burda tls güvenlik protokolüdür.Smtp bağlantısının güvenliğini sağlar ssl oalrak da kullanabiliriz. Ancak Port 465 olarak değişmelidir.
        $mail->Port=587; //Smtp sunucusunun dinlediği port. --tls için = 587 --ssl için = 465 
        $mail->Host="smtp.gmail.com";//SMTP sunucusunun adresini belirtir.
        $mail->Username="jentilmenbarber@gmail.com";//STMP'ye bağlanılcak hesap ve aynı zamanda->Gönderici Mail Hesabı olarak kullanılacaktır.
        $mail->Password="your key";/*Buradaki şifre kimlik doğrulaması için kullanılır. Şifreyi almak için : Google Hesabı > Güvenlik > Uygulama Şifreleri */
        $mail->addAddress($to); // Gönderilecek Hesap
        $mail->Subject=$subject;//Mail Başlığı
        $mail->Body=$body;//Mail İçeriği
        $mail->isHTML(true);
        if ($mail->send()) {
            return true;
        }
        else
        {
            return "Mail Gönderilmedi". $mail->ErrorInfo;
        }
    }
    
}
?>