<?php

// include("../PHPMailer/setting.php");

mb_language("ja");
mb_internal_encoding("UTF-8");


$add = "info@yumenoya.net";

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

    $mail->SMTPDebug = 2;
    // メール内容設定
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->setFrom(MAIL_FROM,MAIL_FROM_NAME);
    $mail->addAddress($add);//受信者を追加する
    // $mail->addReplyTo('info@example.com ','Information');
    // $mail->addCC('cc@example.com'); // CCで追加
    // $mail->addBcc('bcc@example.com'); // BCCで追加
    $mail->Subject = MAIL_SUBJECT; // メールタイトル
    $mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します

$body = <<< EOM
こんにちは！
おれだおれだおれだ！
EOM;

    $mail->Body = $body;
    
    if(!$mail->send()) {
    	echo 'メッセージは送られませんでした！';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    	echo '送信完了！';
    }


// // 宛先
// $to = "c.t.o.taishi.0530@gmail.com";

// // 件名
// $subject = "メールの送信テスト";

// // 本文
// $text = "こんにちは。
// こちらはテストメールです。

// GRAYCODE";

//メール送信
