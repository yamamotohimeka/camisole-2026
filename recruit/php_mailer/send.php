<?php
$store = 'コンチェルト求人'; //ここにサイト名

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (!isset($_POST['token'])) {
  echo '不正なアクセスの可能性があります';
  exit;
}
if ($_SESSION['key'] === $_POST['token']) {
  $name = $_POST['name'];
  $tel1 = $_POST['tel1'];
  $tel2 = $_POST['tel2'];
  $tel3 = $_POST['tel3'];
  $contact_type = $_POST['contact_type'];
  $contact_info = $_POST['contact_info'];
  $line = $_POST['line'];
  $msg = $_POST['msg'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $work = $_POST['work'];
  $mibun = $_POST['mibun'];
  $keiken = $_POST['keiken'];
  $interview = $_POST['interview'];
  $text = $_POST['text'];
  require 'vendor/autoload.php';
  require 'vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php';

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();


  mb_language("japanese");
  mb_internal_encoding("UTF-8");



  $mail = new PHPMailer(true);
  $mail->CharSet = "iso-2022-jp";
  $mail->Encoding = "7bit";
  $mail->setLanguage('ja', 'vendor/phpmailer/phpmailer/language/');

  try {
    $mail->isSMTP();
    $mail->Host       = $_ENV["MAIL_HOST"];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV["MAIL_USER"];
    $mail->Password   = $_ENV["MAIL_PASSWORD"];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($_ENV["MAIL_USER"], mb_encode_mimeheader('コンチェルト求人'));
    // 受信者アドレス, 受信者名（受信者名はオプション）
    $mail->addAddress($_ENV["SEND_TO"], mb_encode_mimeheader($store));

    $mail->isHTML(true);
    $mail->Subject = mb_encode_mimeheader("求人サイトからお問い合わせが届きました");
    $mail->Body  = mb_convert_encoding("
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>

    【 お名前 】<br>
    {$name}<br>
    <br>
    【 電話番号 】<br>
    {$tel1}-{$tel2}-{$tel3}<br>
    <br>
    【 連絡先 】<br>
    {$contact_type}<br>
    {$contact_info}<br>
    <br>
    【 年齢 】<br>
    {$age}<br>
    <br>
    【 お住まい 】<br>
    {$address}<br>
    <br>
    【 勤務希望地 】<br>
    {$work}<br>
    <br>
    【 身分証明書 】<br>
    {$mibun}<br>
    <br>
    【 風俗経験 】<br>
    {$keiken}<br>
    <br>
    【 面接希望地 】<br>
    {$interview}<br>
    <br>
    【 ご質問など 】<br>
    {$text}<br>
    <br>
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━", "JIS", "UTF-8");
    

    $mail->send();  //送信

    echo '<div class="form">
  <div class="box">
    <div class="form-confirm">
      <h4>お問い合わせ完了</h4>
      <p>お問い合わせありがとうございました。<br>
      担当者からの連絡をお待ちください。</p>
    </div> 
  </div>
</div>';
  } catch (Exception $e) {
    echo "メール送信に失敗しました. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>