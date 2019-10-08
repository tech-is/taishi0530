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
		<title>TI AUTO GARAGE</title>
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
                            <h2>Confirmation</h2>
                            <h3>ご確認</h3>
                            <p></p>
                            <div>
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                <form action="reservation-confirmation.php" method="post" style=" margin-right: auto; margin-left:auto; background-color: black; padding: 8% 0;">
                                    <h3>お名前</h3>
                                    <p><?php echo $_POST['name']; ?></p>
                                    <!-- <input type="text" name="name" placeholder="必須*" class="form-control" value="" required> -->
                                    <h3>メールアドレス</h3>
                                    <p><?php echo $_POST['mail']; ?></p>
                                    <!-- <input type="email" name="mail" placeholder="必須*" class="form-control" value="" required> -->
                                    <h3>電話番号</h3>
                                    <p><?php echo $_POST['tell']; ?></p>
                                    <!-- <input type="tel" name="tell" placeholder="必須*" class="form-control" value="" required> -->
                                    <h3>お見積り価格</h3>
                                    <p>&yen;<?php echo $_POST['price']; ?></p>
                                    <!-- <input type="tel" name="price" placeholder="任意" class="form-control" value=""> -->
                                    <h3>ご予約内容</h3>
                                    <p><?php echo $_POST['message']; ?></p>
                                    <!-- <textarea name="message" placeholder="必須*" class="form-control" style="height: 80px;" required></textarea><br> -->
                                    <p><input type="submit" value="送信" class="btn" style="padding-left: 20px; padding-right: 20px;"></p>
                                </form>
                            <?php }else{
                                header('Location: http://befor.com/tiautogarage/reservation.php');
                            }?>
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