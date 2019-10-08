<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'c.t.o.taishi.0530@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>

<?php
    if(isset($_POST['submit'])){
        // PHPMailerの読み込み
        require("PHPMailer/PHPMailerAutoload.php");
        mb_language("ja");
        mb_internal_encoding("UTF-8");

        // 認証情報
        $host="smtp.lolipop.jp";
        $smtp_user="mail.tig-coathing_siga@tigcoating.com";
        $smtp_password="Ypd3Q_pcrB-4";
        $from="mail.tig-coathing_siga@tigcoating.com";
        $port= 587;
        $ssl_type="CRAM-MD5";

        //宛先・件名・本文
        //POSTやGETでメールを送信する場合
        // $fromname = "送信者名だよ";
        // $to       = urldecode(htmlspecialchars($_POST["to"],  ENT_QUOTES));
        // $subject  = urldecode(htmlspecialchars($_POST["subject"],  ENT_QUOTES));
        // $body     = urldecode(htmlspecialchars($_POST["body"],  ENT_QUOTES));

        // セキュリティ対策
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email_address = strip_tags(htmlspecialchars($_POST['mail']));
        $phone = strip_tags(htmlspecialchars($_POST['tell']));
        $price = strip_tags(htmlspecialchars($_POST['price']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        //固定テキストでテスト用
        $fromname = "お客様";
        $to       = "mail.tig-coathing_siga@tigcoating.com";
        $subject  = "ご予約内容";
        $body     = <<<EOM
        お名前：{$name}
        メールアドレス：{$email_address}
        お電話番号：{$phone}
        お見積り金額：{$price}
        ご予約内容：{$message}
        EOM;

        //メール送信
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth    = true;
        //$mail->SMTPDebug   = 2;	//デバッグなどを行うときはコメントアウトを解除！
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer'       => false,	//SSLサーバー証明書の検証を要求するか（デフォルト：true）
            'verify_peer_name'  => false,	//ピア名の検証を要求するか（デフォルト：true）
            'allow_self_signed' => true		//自己証明の証明書を許可するか（デフォルト：false、trueにする場合は「verify_peer」をfalseに）
            )
        );
        $mail->CharSet    = "utf-8";
        $mail->SMTPSecure = $ssl_type;
        $mail->Host       = $host;
        $mail->Port       = $port;
        $mail->IsHTML(false);
        $mail->Username   = $smtp_user;
        $mail->Password   = $smtp_password; 
        $mail->SetFrom($smtp_user);
        $mail->From       = $from;
        $mail->FromName   = mb_encode_mimeheader($fromname, "JIS", "UTF-8");
        $mail->Subject    = mb_encode_mimeheader($subject,  "JIS", "UTF-8");
        $mail->Body       = $body;
        $mail->AddAddress($to);
        
        
        //送信判定
        if ($mail->Send()) { ?>
            <script>
                alert('送信完了しました');
            </script>
        <?php } else { ?>
            <script>
                alert('送信できませんでした。もう一度入力して下さい。');
            </script>
        <?php }
    }
?>