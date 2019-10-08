<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<title>T.I.G COATING</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

	</head>
	<body id="page-top" style="overflow-x: hidden;">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container" style="background-color: black">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll" style="background-color: black; width: max-content;">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll phot-hidden" href="index.html#page-top"><img src="images/logo (2).png" alt="Sanza theme logo"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="index.html#page-top">Home</a>
						</li>
						<li>
							<a class="page-scroll" href="index.html#portfolio">Service</a>
						</li>
						<!-- <li>
							<a class="page-scroll" href="index.html#about">Example</a>
						</li> -->
						<li>
							<a class="page-scroll" href="index.html#features">Commitment</a>
						</li>
						<li>
							<a class="page-scroll" href="index.html#blog">Blog</a>
						</li>
						<!-- <li>
							<a class="page-scroll" href="#partners"></a>
						</li> -->
						<!-- <li>
							<a class="page-scroll" href="#team"></a>
						</li> -->
						<li>
							<a class="page-scroll" href="index.html#access">Access</a>
						</li>
						<li>
							<a class="page-scroll" href="#contact">Reservation</a>
						</li>
						<li>
							<a class="page-scroll" href="car_type.php">Estimate</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
        </nav>

        <section id="blog" class="section-features manufacturer">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title" style="margin-top: 40px;">
                            <h2>Reservation</h2>
                            <h3>ご予約</h3>
                            <p></p>
                            <div>
                                <form action="#" method="post" style=" margin-right: auto; margin-left:auto; width:fit-content;">
                                    <p>お名前</p>
                                    <input type="text" name="name" placeholder="必須*" class="form-control" value="" required>
                                    <p>メールアドレス</p>
                                    <input type="email" name="mail" placeholder="必須*" class="form-control" value="" required>
                                    <p>電話番号</p>
                                    <input type="tel" name="tell" placeholder="必須*" class="form-control" value="" required>
                                    <p>お見積り価格</p>
                                    <input type="tel" name="price" placeholder="任意" class="form-control" value="">
                                    <p>ご予約内容</p>
                                    <textarea name="message" placeholder="必須*" class="form-control" style="height: 80px;" required></textarea><br>
                                    <p><input type="submit"name="submit"  value="送信" class="btn" style="padding-left: 20px; padding-right: 20px;"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


        <section class="section-cta">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<p class= "text-hidden">
							お車が新車以上の輝きを取り戻す贅沢な施工方法<br>
							完全予約制を取り入れる事でハイクオリティを実現
						</p>
					</div>
					<div class="col-md-4" style = text-align:center;>
						<a href="car_type.php" class="button-cta">お見積りはこちら</a>
					</div>
				</div>
			</div>
        </section>
        
        <p id="back-top">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>
		<footer>
			<div class="container text-center">
				<p>Theme made by <a href="http://moozthemes.com"><span>MOOZ</span>Themes.com</a></p>
			</div>
		</footer>


        <!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/cbpAnimatedHeader.js"></script>
		<script src="js/jquery.appear.js"></script>
		<!-- <script src="js/SmoothScroll.min.js"></script> -->
		<script src="js/theme-scripts.js"></script>
	</body>
</html>

<!-- mail設定 -->
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
        $body     = "お名前：".$name."\n";
        $body    .= "メールアドレス：".$email_address."\n" ;
        $body    .= "電話番号：".$phone."\n" ;
        $body    .= "お見積金額：".$price."\n" ;
        $body    .= "ご予約の内容：".$message ;

        // $body     = <<<EOD
        // お名前：{$name}
        // メールアドレス：{$email_address}
        // お電話番号：{$phone}
        // お見積り金額：{$price}
        // ご予約内容：{$message}
        // EOD;

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
