<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$surname = $_POST['user_surname'];
//$elmail = $_POST['user_email'];
$time = $_POST['user_time'];
$information = $_POST['user_information'];
$position = $_POST['user_position'];

$servername = "localhost";
$username = "lol1221231";
$password = "David34562163";
$dbname = "der_rec3123";

$nameD = $_POST['user_name'];
$surnameD = $_POST['user_surname'];
$emailD = $_POST['user_email'];
$informationD = $_POST['user_information'];
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dr.emn765@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '$rc62?851'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('dr.emn765@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('babaev7649david2@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта клиники';
$mail->Body    = ' ' .$name . ' ' .$surname. ' вас записали к врачу <br>  Назначенное время: ' .$time. '<br> Ваш врач: ' .$position. '<br> Доп. информация: ' .$information;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO storage1 (name, surname, exist)
VALUES ('$nameD', '$surnameD', '$informationD')";

if ($conn->query($sql) === TRUE) {
  echo "данные отправлены";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>