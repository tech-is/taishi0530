<?php
include('../HTML/header_form.php');
 $mailaddr = $_POST['mail'];

if($_POST['sex']==1){
        $sex = "男";
    }else{
        $sex =  "女";
    }

mb_language("japanese");
mb_internal_encoding("UTF-8");

// $tmppass= md5(uniqid(rand()));
// echo $tmppass;

?>

<input type = "hidden" name = "password" value = "$tmppass" >


<?php

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/POP3.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/OAuth.php';
require '../PHPMailer/language/phpmailer.lang-ja.php';
require '../PHPMailer/setting.php';
// PHPMailerのインスタンス生成

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP(); // SMTPを使うようにメーラーを設定する
$mail->SMTPAuth = true;
$mail->Host = MAIL_HOST; // メインのSMTPサーバーを指定する
$mail->Username = MAIL_USERNAME; // SMTPユーザー名
$mail->Password = MAIL_PASSWORD; // SMTPパスワード
$mail->SMTPSecure = MAIL_ENCRPT; // TLS暗号化を有効にし、 「SSL」も受け入れます
$mail->Port = SMTP_PORT; // 接続するTCPポート

//$mail->SMTPDebug = 2;
// メール内容設定
$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";
$mail->setFrom(MAIL_FROM,MAIL_FROM_NAME);
$mail->addAddress($mailaddr, 'Joe User');//受信者を追加する
// $mail->addReplyTo('info@example.com ','Information');
// $mail->addCC('cc@example.com'); // CCで追加
// $mail->addBcc('bcc@example.com'); // BCCで追加
$mail->Subject = MAIL_SUBJECT; // メールタイトル
$mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します

$body = <<< EOM

<p>会員登録ありがとうございます。</p>
<p>以下の情報で登録します。</p>
<p>名前: {$_POST["name"]}</p>
<p>カナ: {$_POST["kana"]}</p>
<p>電話: {$_POST["tell"]}</p>
<p>Mail: {$_POST["mail"]}</p>
<p>生まれ年: {$_POST["year"]}</p>
<p>性別: $sex</p>
<p>本登録はこちら：http://localhost/making_form/password_form.php</p>
<p>仮パスワード:{$_POST["password"]}</p>

EOM;

    $mail->Body  = $body; // メール本文
    // メール送信の実行
    
    if(!$mail->send()) {
    	echo 'メッセージは送られませんでした！';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    	echo '送信完了！';
    }
