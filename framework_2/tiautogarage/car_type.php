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
	<body id="page-top">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="#page-top"><img src="images/logo (2).png" alt="Sanza theme logo"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="tiautogarage.html#page-top">Home</a>
						</li>
						<li>
							<a class="page-scroll" href="tiautogarage.html#portfolio">Service</a>
						</li>
						<li>
							<a class="page-scroll" href="tiautogarage.html#about">Example</a>
						</li>
						<li>
							<a class="page-scroll" href="tiautogarage.html#features">Commitment</a>
						</li>
						<!-- <li>
							<a class="page-scroll" href="#partners"></a>
						</li> -->
						<!-- <li>
							<a class="page-scroll" href="#team"></a>
						</li> -->
						<li>
							<a class="page-scroll" href="tiautogarage.html#access">Access</a>
						</li>
						<li>
							<a class="page-scroll" href="tiautogarage.html#contact">Reservation</a>
						</li>
						<li>
							<a class="page-scroll" href="/tiautogarage/car_type.php">Estimate</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
        </nav>
        
        <section id="features" class="section-features">
                <div class="container-estimste">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="section-title" style ="margin: 40px;">
                                <h2 style = >Estimate</h2>
                                <h3>
                                    車種一覧
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car_logo">
                    <?php
                    require("car_type_phot.php");
                    foreach($domes as $key => $val){?>
                    <a href="Estimate.php"><img src="<?php echo $val ?>" style="margin:2%; padding: 0;"></a>
                    <?php } ?><br>
                </div>
        </section>
            
            <section id="contact" class="dark-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="section-title">
                                    <h2>Reservation</h2>
                                    <h3>ご予約はこちら</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-text">
                                    <h4>住所</h4>
                                    <p>〒523-0851<br>滋賀県近江八幡市市井町51-1</p>
                                    <p><i class="fa fa-phone"></i> 0748-43-1198</p>
                                    <p><i class="fa fa-envelope"></i> info@tiautogarage.jp</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="section-text">
                                    <h4>営業時間</h4>
                                    <p><span class="day">完全予約制のため<br>お問い合わせください</span></p>
                                    <p></p><br>
                                    <h4>定休日</h4>
                                    <p>不定休</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form name="sentMessage" id="contactForm" novalidate="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="tell" class="form-control" placeholder="Your tell *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div id="success"></div>
                                            <button type="submit" class="btn">送信</button>
                                        </div>
                                    </div>
                                </form>
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