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
        <link rel="stylesheet" href="modaal.min.css">
        <style>
            table{
                box-sizing: border-box;
                border-collapse:collapse;
                margin: 0 auto;
                text-align: center;
                width: 600px;
            }
            table th,
            table td{
            border: 1px solid #999;
            padding: .5em 1em;
            }
            table th{
            background: #eee;
            }
            @media (max-width: 940px) {
                table th,
                table td{
                display: block;
                }
                .data-none{ 
                    display: none;
                }
            }
            @media (min-width: 941px) {
                .data-hidden{
                    display: none;
                }
            }
        </style>
	</head>
    <body id="page-top" style="overflow-x: hidden;">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" >
			<div class="container" style="background-color: black;">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll" style="width: max-content;">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll phot-hidden" href="index.html#page-top"><img src="images/logo (2).png" alt="Sanza theme logo"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
							<a class="page-scroll" href="index.html#partners">Partners</a>
						</li>
						<li>
							<a class="page-scroll" href="index.html#team">Team</a>
						</li> -->
						<li>
							<a class="page-scroll" href="index.html#access">Access</a>
						</li>
						<li>
							<a class="page-scroll" href="#contact">Reservation</a>
						</li>
						<li>
							<a class="page-scroll" href="">Estimate</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

        <p></p>
        
	<section id="features" class="section-features manufacturer" style="padding-bottom: 130px;">
		<div class="container-estimste">
			<div class="row" style="margin-left: 0px; margin-right: 0px;">
				<div class="col-lg-12 text-center">
					<div class="section-title" style ="margin: 40px;">
						<h2>Estimate</h2>
						<h3>お見積り
						</h3>
					</div>
				</div>
			</div>
                <p style="text-align: center;">
                    <a href="#Domestic_car_size" class="Domestic_car" style="margin: 3%;">国産車一覧表</a>
                    <a href="#Imported_car_size" class="Imported_car" style="margin: 3%;">外国車一覧表</a>
                    <!-- <a href="Car_size.html">車サイズ確認へ</a> -->
                </p>
            <div class="col-sm-12" style="text-align: center; margin: 3%; margin: 3%; margin-right: auto; margin-left: auto;">
                <a class="btn btn-default" style="margin: 2%;" id="ss" href="#ss_form">SS</a>
                <a class="btn btn-default" style="margin: 2%;" id="s" href="#s_form">S</a>
                <a class="btn btn-default" style="margin: 2%;" id="m" href="#m_form">M</a>
                <a class="btn btn-default" style="margin: 2%;" id="l" href="#l_form">L</a>
                <a class="btn btn-default" style="margin: 2%;" id="ll" href="#ll_form">LL</a>
                <a class="btn btn-default" style="margin: 2%;" id="xl" href="#xl_form">XL</a>
                <a class="btn btn-default" style="margin: 2%;" id="xxl" href="#xxl_form">XXL</a>
            </div>
		</div>
        <div style="width: 100%; margin-left: auto; margin-right: auto; text-align: center;">
        <p>※磨き研磨が必要なお車は別途お見積りいたします。</P><br>
        <p>※クリーニングが必要な場合は別途お見積もりいたします。</p><br>
        <p>※お車の状態によっては、下地処理が必要となります。</p><br>
        <p>※お見積りは税別価格になります。</p>
        </div>
    </section>
    
    <!-- SSサイズお見積り -->
    <div id="ss_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">SS お見積り</h2>
        <hr>
        <form id="ss_car" name="form1" style="text-align: center;" onchange="calculation1()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="140000">HAIDeen 5年耐久 &yen;140000</option>
                <option value="130000">DAIAMOND MAKE 5年耐久 &yen;130000</option>
                <option value="70000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;70000</option>
                <option value="50000">ECHELON NANO-FIL 超滑水3年耐久 &yen;50000</option>
                <option value="25000">ECHELON CS-1 親水 1年耐久 &yen;25000</option>
                <option value="35000">G'zox NEWリアルガラスコート 撥水 &yen;35000</option>
                <option value="70000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;70000</option>
                <option value="60000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;60000</option>
                <option value="35000">TI ガラスCOATING 撥水 3年 &yen;35000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション <br>&yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション <br>&yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション <br>&yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション<br> &yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション <br>&yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ<br> &yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ <br>&yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品)<br> &yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品)<br> &yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス <br>コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;9000<input type="checkbox" name="check_common_name" class="car_option" value="9000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング リアガラス
            <br>&yen;2500<input type="checkbox" name="check_common_name" class="car_option" value="2500"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング サイドガラス
            <br>&yen;500<input type="checkbox" name="check_common_name" class="car_option" value="500"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;11900<input type="checkbox" name="check_common_name" class="car_option" value="11900"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>
    <!-- SSサイズend -->

    <!-- Sサイズお見積り -->
    <div id="s_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">S お見積り</h2>
        <hr>
        <form id="s_car" name="form2" style="text-align: center;" onchange="calculation2()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="145000">HAIDeen 5年耐久 &yen;145000</option>
                <option value="135000">DAIAMOND MAKE 5年耐久 &yen;135000</option>
                <option value="75000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;75000</option>
                <option value="53000">ECHELON NANO-FIL 超滑水3年耐久 &yen;53000</option>
                <option value="32000">ECHELON CS-1 親水 1年耐久 &yen;32000</option>
                <option value="38000">G'zox NEWリアルガラスコート 撥水 &yen;38000</option>
                <option value="78000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;78000</option>
                <option value="63000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;63000</option>
                <option value="38000">TI ガラスCOATING 撥水 3年 &yen;38000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション<br> &yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション<br> &yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション<br> &yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション<br> &yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション <br>&yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ <br>&yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品)<br> &yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品)<br> &yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;9000<input type="checkbox" name="check_common_name" class="car_option" value="9000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング リアガラス
            <br>&yen;2500<input type="checkbox" name="check_common_name" class="car_option" value="2500"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング サイドガラス
            <br>&yen;500<input type="checkbox" name="check_common_name" class="car_option" value="500"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;13000<input type="checkbox" name="check_common_name" class="car_option" value="13000"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>
    <!-- Sサイズend -->
    
    <!-- Mサイズ -->
    <div id="m_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">M お見積り</h2>
        <hr>
        <form id="m_car" name="form3" style="text-align: center;" onchange="calculation3()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="150000">HAIDeen 5年耐久 &yen;150000</option>
                <option value="140000">DAIAMOND MAKE 5年耐久 &yen;140000</option>
                <option value="85000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;85000</option>
                <option value="56000">ECHELON NANO-FIL 超滑水3年耐久 &yen;56000</option>
                <option value="38000">ECHELON CS-1 親水 1年耐久 &yen;38000</option>
                <option value="43000">G'zox NEWリアルガラスコート 撥水 &yen;43000</option>
                <option value="84000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;84000</option>
                <option value="66000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;66000</option>
                <option value="43000">TI ガラスCOATING 撥水 3年 &yen;43000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション<br> &yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション <br>&yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション <br>&yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション<br> &yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション<br> &yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション<br> &yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ<br> &yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品) <br>&yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品) <br>&yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;9000<input type="checkbox" name="check_common_name" class="car_option" value="9000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング リアガラス
            <br>&yen;2500<input type="checkbox" name="check_common_name" class="car_option" value="2500"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング サイドガラス
            <br>&yen;500<input type="checkbox" name="check_common_name" class="car_option" value="500"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;14100<input type="checkbox" name="check_common_name" class="car_option" value="14100"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>
    <!-- Mサイズend -->

    <!-- Lサイズ -->
    <div id="l_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">L お見積り</h2>
        <hr>
        <form id="l_car" name="form4" style="text-align: center;" onchange="calculation4()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="165000">HAIDeen 5年耐久 &yen;165000</option>
                <option value="145000">DAIAMOND MAKE 5年耐久 &yen;145000</option>
                <option value="95000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;95000</option>
                <option value="60000">ECHELON NANO-FIL 超滑水3年耐久 &yen;60000</option>
                <option value="43000">ECHELON CS-1 親水 1年耐久 &yen;43000</option>
                <option value="48000">G'zox NEWリアルガラスコート 撥水 &yen;48000</option>
                <option value="90000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;90000</option>
                <option value="70000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;70000</option>
                <option value="48000">TI ガラスCOATING 撥水 3年 &yen;48000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション <br>&yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション <br>&yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション <br>&yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション<br> &yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション<br> &yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション<br> &yen;20000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 20000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ<br> &yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ<br> &yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品) <br>&yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品)<br> &yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;12000<input type="checkbox" name="check_common_name" class="car_option" value="12000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング リアガラス
            <br>&yen;2500<input type="checkbox" name="check_common_name" class="car_option" value="2500"></p><br>
            <p style="color:black;">その他ウィンドウガラス<br> 撥水コーティング サイドガラス
            <br>&yen;800<input type="checkbox" name="check_common_name" class="car_option" value="800"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;16200<input type="checkbox" name="check_common_name" class="car_option" value="16200"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>
    <!-- Lサイズend -->

    <!-- LLサイズ -->
    <div id="ll_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">LL お見積り</h2>
        <hr>
        <form id="ll_car" name="form5" style="text-align: center;" onchange="calculation5()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="180000">HAIDeen 5年耐久 &yen;180000</option>
                <option value="160000">DAIAMOND MAKE 5年耐久 &yen;160000</option>
                <option value="105000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;105000</option>
                <option value="66000">ECHELON NANO-FIL 超滑水3年耐久 &yen;66000</option>
                <option value="50000">ECHELON CS-1 親水 1年耐久 &yen;50000</option>
                <option value="55000">G'zox NEWリアルガラスコート 撥水 &yen;55000</option>
                <option value="104000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;104000</option>
                <option value="74000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;74000</option>
                <option value="60000">TI ガラスCOATING 撥水 3年 &yen;60000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション <br>&yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション <br>&yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション <br>&yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション<br> &yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション<br> &yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション<br> &yen;20000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 20000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ <br>&yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品) <br>&yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品) <br>&yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;12000<input type="checkbox" name="check_common_name" class="car_option" value="12000"></p><br>
            <p style="color:black;">その他ウィンドウガラス<br> 撥水コーティング リアガラス
            <br>&yen;3000<input type="checkbox" name="check_common_name" class="car_option" value="3000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング サイドガラス
            <br>&yen;800<input type="checkbox" name="check_common_name" class="car_option" value="800"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;17300<input type="checkbox" name="check_common_name" class="car_option" value="17300"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>
    <!-- LLサイズend -->


    <!-- XLサイズ -->
    <div id="xl_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">XL お見積り</h2>
        <hr>
        <form id="xl_car" name="form6" style="text-align: center;" onchange="calculation6()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="180000">HAIDeen 5年耐久 &yen;180000</option>
                <option value="160000">DAIAMOND MAKE 5年耐久 &yen;160000</option>
                <option value="105000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;105000</option>
                <option value="66000">ECHELON NANO-FIL 超滑水3年耐久 &yen;66000</option>
                <option value="50000">ECHELON CS-1 親水 1年耐久 &yen;50000</option>
                <option value="55000">G'zox NEWリアルガラスコート 撥水 &yen;55000</option>
                <option value="104000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;104000</option>
                <option value="74000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;74000</option>
                <option value="60000">TI ガラスCOATING 撥水 3年 &yen;60000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション <br>&yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション <br>&yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション<br> &yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション <br>&yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション <br>&yen;23000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 23000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ <br>&yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品)<br> &yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品)<br> &yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;12000<input type="checkbox" name="check_common_name" class="car_option" value="12000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング リアガラス
            <br>&yen;3000<input type="checkbox" name="check_common_name" class="car_option" value="3000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング サイドガラス
            <br>&yen;800<input type="checkbox" name="check_common_name" class="car_option" value="800"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;18200<input type="checkbox" name="check_common_name" class="car_option" value="18200"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>
    <!-- XLサイズend -->

    <!-- XXLサイズ -->
    <div id="xxl_form" class="hidden" style="color: black; text-align: center;">
        <h2 style="color: black; text-align: center;">XXL お見積り</h2>
        <hr>
        <form id="xxl_car" name="form7" style="text-align: center;" onchange="calculation7()">
            <h3 style="color: black;">ボディーガラスコーティング</h3>
            <select name= "common_name" class="car_option" style="width : 100%;"><p>
                <option value="0">選択してください</option>
                <option value="200000">HAIDeen 5年耐久 &yen;200000</option>
                <option value="180000">DAIAMOND MAKE 5年耐久 &yen;180000</option>
                <option value="110000">ECHELON Zen-Xro Dynamic 動的撥水 5年耐久 &yen;110000</option>
                <option value="68000">ECHELON NANO-FIL 超滑水3年耐久 &yen;68000</option>
                <option value="55000">ECHELON CS-1 親水 1年耐久 &yen;55000</option>
                <option value="63000">G'zox NEWリアルガラスコート 撥水 &yen;63000</option>
                <option value="120000">TI ダイヤモンドCOATING 超撥水皮膜 7年 2層式 &yen;120000</option>
                <option value="80000">TI ダイヤモンドCOATING 超撥水皮膜 5年 &yen;80000</option>
                <option value="65000">TI ガラスCOATING 撥水 3年 &yen;65000</option>
            </p></select>
            <hr>
            <h3 style="color:black;">ポイントプロテクションフィルム</h3>
            <p style="color:black;">ドアカッププロテクション <br>&yen;3000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 3000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <p style="color:black;">ドアエッジプロテクション <br>&yen;2000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 2000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">Bビラ―プロテクション<br> &yen;4000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 4000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">スカッフプレートプロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ドアミラープロテクション <br>&yen;13000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 13000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ヘッドライトプロテクション<br> &yen;16000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=2;$i++){ ?>
                <option value=<?php echo $i * 16000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">トランクラゲッジプロテクション<br>&yen;23000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=1;$i++){ ?>
                <option value=<?php echo $i * 23000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>
            <hr>

            <h3 style="color:black;">その他オプション</h3>
            <p style="color:black;">ホイルコーティング13~16インチ <br>&yen;18000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 18000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ <br>&yen;24800
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 24800 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング13~16インチ (使用品)<br> &yen;35000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 35000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">ホイルコーティング17~20インチ (使用品)<br> &yen;40000
            <select name= "common_name" class="car_option">
                <?php for($i=0;$i<=4;$i++){ ?>
                <option value=<?php echo $i * 40000 ?>><?php echo $i; ?>ヶ所</option>
                <?php } ?>
            </select></p><br>

            <p style="color:black;">レザーコーティング<br>
            <select name= "common_name" class="car_option">
                <option value= 0 >0列</option>
                <option value= 28800 >1列</option>
                <option value= 45000 >2列</option>
                <option value= 60000 >3列</option>
            </select></p><br>

            <p style="color:black;">フロントウィンドウガラス コーティング<br>ECHELON Clareed powered by Zen-Xero
            <br>&yen;14000<input type="checkbox" name="check_common_name" class="car_option" value="14000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング リアガラス
            <br>&yen;3000<input type="checkbox" name="check_common_name" class="car_option" value="3000"></p><br>
            <p style="color:black;">その他ウィンドウガラス <br>撥水コーティング サイドガラス
            <br>&yen;800<input type="checkbox" name="check_common_name" class="car_option" value="800"></p><br>
            <p style="color:black;">ルームクリーニング
            <br>&yen;19500<input type="checkbox" name="check_common_name" class="car_option" value="19500"></p><br>
            <hr>
            <h3 style="color: black;">合計金額:&yen;<input type="text" name="total" value="" readonly></h3>
            <a href="reservation.php" style="font-size: 30px;">ご予約はこちら</a>
        </form>
    </div>


	<section id="contact" class="dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Reservation</h2>
                        <h3 style="margin-bottom: 5%">ご予約はこちら</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="section-text">
                        <p></p><br>
                        <a href="reservation.php" class="button-cta">ご予約はこちら</a>
                        <p></p><br>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="section-text">
                        <h4>住所</h4>
                        <p>〒523-0851<br>滋賀県近江八幡市市井町51-1</p>
                        <p><i class="fa fa-phone"></i> 0748-43-1198</p>
                        <p><i class="fa fa-envelope"></i> info@tiautogarage.jp</p>
                        <br>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="section-text">
                        <h4>営業時間</h4> 
                        <p style="color: #B22222;"><span class="day">完全予約制のため<br>お問い合わせください</span></p>
                        <p></p><br>
                        <h4>定休日</h4>
                        <p>不定休</p>
                    </div>
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

	<div id="Domestic_car_size" class="Domestic_car_size" style="object-fit: cover;">
        <div class="section cars" id="cars-pc">
            <div class="section-cont">
                <table class="table table-dark" border="2" style="text-align: left;  object-fit: cover;">
                    <thead class="data-none">
                        <tr>
                            <th rowspan="2" colspan="3"></th>
                            <th>SS</th>
                            <th>S</th>
                            <th>M</th>
                            <th>L</th>
                            <th>LL</th>
                            <th>XL</th>
							<th>XXL</th>
                        </tr>
                    </thead>
                    <thead class="data-hidden">
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            
                            </th>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_lexus.jpg" alt="レクサス" width="75" height="50" />
                            </th>
                            <td class ="data-none"></td>
                            <th class= "data-hidden">S</th>
                            <td>・CT</td>
                            <th class= "data-hidden">M</th>
                            <td>・IS
                                <br />・SC
                                <br />・HS
                                <br />・UX
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・GS
                                <br />・GSF
                                <br />・ES
                                <br />・RC
                                <br />・RCF
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>
                                <br>・LS
                                <br />・NX
                                <br />・LC
                                
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・RX</td>
                            <th class= "data-hidden">XXL</th>
                            <td>・LX</td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_toyota.jpg" alt="トヨタ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・iQ
                                <br />・アクア
                                <br />・bB
                                <br />・ヴィッツ
                                <br />・アレックス
                                <br />・パッソ
                                <br />・カローラランクス
                                <br />・MR-S
                                <br />・ポルテ
                                <br />・ラクティス
                                <br />・スペイド
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・アベンシス
                                <br />・アリオン
                                <br />・カルディナ
                                <br />・セリカ
                                <br />・シエンタ
                                <br />・プレミオ
                                <br />・86
                                <br />・SAI
                                <br />・アルテッツァ
                                <br />・タンク
                                <br />・カローラスポーツ
                                <br />・スープラ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・アリスト
                                <br />・マークX
                                <br />・アベンシスワゴン
                                <br />・マークⅡブリット
                                <br />・カムリ
                                <br />・ウインダム
                                <br />・ソアラ
                                <br />・チェイサー
                                <br />・プリウス
                                <br />・C-HR
                                <br />・RAV4ショート
                                <br />・カローラフィールダー
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・セルシオ
                                <br />・クラウンマジェスタ
                                <br />・クラウン
                                <br />・クラウンワゴン
                                <br />・イプサム
                                <br />・ウィッシュ
                                <br />・RAV4ロング
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・アイシス
                                <br />・クルーガー
                                <br />・ヴァンガード
                                <br />・ハリアー
                                <br />・プリウスα
                                <br />・MIRAI
                                </p>
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・ヴォクシー
                                <br />・エスティマ
                                <br />・ノア
                                <br />・プラドショート
                                <br />・エスクァイア
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・アルファード
                                <br />・ヴェルファイア
                                <br />・ハイエース
                                <br />・プラドロング
                                <br />・ランドクルーザー
                                <br />・ハイラックスサーフ
                                <br />・FJクルーザー
                                <br />・レジアス
                                <br />・センチュリー
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_nissan.jpg" alt="日産" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・キューブ
                                <br />・ティーダ
                                <br />・ノート
                                <br />・マーチ
                                <br />・リーフ
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・ウィングロード
                                <br />・フェアレディＺ
                                <br />・サニー
                                <br />・シルビア
                                <br />・ラティオ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・スカイライン
                                <br />・ステージア
                                <br />・ジューク
                                <br />・シルフィ
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・フーガ
                                <br />・ティアナ
                                <br />・セドリック
                                <br />・プレサージュ
                                <br />・ラフェスタ
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・ムラーノ
                                <br />・サファリショート
                                <br />・エクストレイル
                                <br />・デュアリス
                                <br />・GTR
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・セレナ
                                <br />・テラノ
                                <br />・シーマ
                                <br />・インフィニティQ45
                                <br />・プレジデント
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・エルグランド
                                <br />・キャラバン
                                <br />・サファリロング
                                <br />・NV
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_honda.jpg" alt="ホンダ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・フィット
                                <br />・CR-Z
                                <br />・シビック(旧)
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・インサイト
                                <br />・インテグラ
                                <br />・アコード
                                <br />・S2000
                                <br />・エディックス
                                <br />・フィットアリア
                                <br />・モビリオ
                                <br />・シビック(新)
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・アコードワゴン
                                <br />・インスパイア
                                <br />・オルティア
                                <br />・S-MX
                                <br />・フリード　
                                <br />・グレイス
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・CR-V
                                <br />・HR-V
                                <br />・エアウェーブ
                                <br />・ストリーム
                                <br />・レジェンド
                                <br />・ヴェゼル
                                <br />・シャトル
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・クロスロード
                                <br />・MDX
                                <br />・クラリティ
                                <br />・ジェイド
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・エリシオン
                                <br />・オデッセイ
                                <br />・ステップワゴン
                                <br />・NSX
                            </td>
                            <td class= "data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_mazda.jpg" alt="マツダ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・デミオ
                                <br />・ベリーサ
                                <br />・ロードスター
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・RX8
                                <br />・アクセラ
                                <br />・アクセラスポーツ
                                <br />・アテンザ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・アテンザワゴン
                                <br />・CX-3
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・CX-5
                                <br />・プレマシー
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・MPV
                                <br />・CX-7
                                <br />・CX-8
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・ビアンテ
                                <br />・ボンゴフレンディ
                            </td>
                            <td class= "data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_mitsubishi.jpg" alt="三菱" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・コルト
                                <br />・トライトン
                                <br />・パジェロジュニア
                                <br />・ミラージュ
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・ランサー
                                <br />・ギャラン
                                <br />・デリカD：2
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・ランサーワゴン
                                <br />・パジェロイオ
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・エアトレック
                                <br />・RVR
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・グランディス
                                <br />・アウトランダー
                                <br />・デリカD:3
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・パジェロショート
                                <br />・ディグニティ
                                <br />・プラウディア
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・デリカスペースギア
                                <br />・デリカD:5
                                <br />・パジェロロング
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_subaru.jpg" alt="スバル" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <th class= "data-hidden">S</th>
                            <td>・インプレッサ
                                <br />・インプレッサワゴン
                                <br />・BRZ
                                <br />・トレージア
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・レガシィワゴン
                                <br />・レヴォーグ
                                <br />・レガシィB4
                                <br />・G4
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・XV
                                <br />・アウトバック
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・アルシオーネ
                                <br />・エクシーガ
                                <br />・フォレスター
                                <br />・WRX
                            </td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_suzuki.jpg" alt="スズキ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・スイフト
                                <br />・スプラッシュ
                                <br />・ソリオ
                                <br />・ジムニーシエラ
                                <br />・シボレークルーズ
                                <br />・シボレーMワゴン
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・SX4</td>
                            <th class= "data-hidden">M</th>
                            <td>・キザシ</td>
                            <th class= "data-hidden">L</th>
                            <td>・エスクードショート</td>
                            <th class= "data-hidden">LL</th>
                            <td>・エスクードロング</td>
                            <th class= "data-hidden">XL</th>
                            <td>・ランディ</td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_daihatsu.jpg" alt="ダイハツ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・クー
                                <br />・ビンゴ
                                <br />・ブーン
                                <br />・トール
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・アルティス
                                <br />・メビウス
                            </td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                    </tbody>
				</table>
				<p class="offer">
					※上記に該当しない車種についてはお電話でお問合せください。
				</p>
			</div>
		</div>
	</div>

	<div id="Imported_car_size" class="Imported_car_size">
		<div class="section cars" id="cars-pc">
			<div class="section-cont">
				<table class="oversea car-type" border=2 style="text-align: left; width: 100%; ">
                    <thead class="data-none">
                        <tr>
                            <th rowspan="2" colspan="3"></th>
                            <th>SS</th>
                            <th>S</th>
                            <th>M</th>
                            <th>L</th>
                            <th>LL</th>
                            <th>XL</th>
                            <th>XXL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            </th>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_benz.jpg" alt="ベンツ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・スマート
                                <br />・フォーフォー
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・Bクラス
                                <br />・Aクラス
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・Cクラス
                                <br />・Cクラスワゴン
                                <br />・Eクラス
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・CLクラス
                                <br />・Eクラスワゴン
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・SLクラス
                                <br />・SLK
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・Mクラス
                                <br />・GLクラス
                                <br />・Sクラス
                                <br />・SLS
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・バネオ
                                <br />・ビアノ
                                <br />・Vクラス
                                <br />・Gクラス
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_bmw.jpg" alt="BMW" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <th class= "data-hidden">S</th>
                            <td>・ミニ
                                <br />・1シリーズ
                                <br />・Mロードスター
                                <br />・ミニコンバーチブル
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・3シリーズ
                                <br />・Mクーペ
                                <br />・Z4
                                <br />・ミニクラブマン
                                <br />・2シリーズ
                                <br />・i3
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・3(ワゴン)
                                <br />・5シリーズ
                                <br />・X1
                                <br />・X3
                                <br />・グランツアラー
                                <br />・4シリーズ
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・5シリーズワゴン
                                <br />・X5
                                <br />・6シリーズ
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・7シリーズ
                                <br />・X6
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・i8
                                <br />・8シリーズ
                                <br />・X7
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_audi.jpg" alt="アウディ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・A1</td>
                            <th class= "data-hidden">S</th>
                            <td>・A3
                                <br />・S3
                                <br />・TT
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・A4
                                <br />・S4
                                <br />・RS5
                                <br />・Q3
                                <br />・Q2
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・A5
                                <br />・A6
                                <br />・Q5
                                <br />・S6
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・A7
                                <br />・A8
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・Q7</td>
                            <th class= "data-hidden">XXL</th>
                            <td>・R8</td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_wagen.jpg" alt="フォルクスワーゲン" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・ルポ
                                <br />・ポロ
                                <br />・アップ
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・ゴルフ
                                <br />・ニュービートル
                                <br />・シロッコ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・トゥーラン
                                <br />・ジェッタ
                                <br />・パサート
                                <br />・ゴルフワゴン
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・パサートワゴン
                                <br />・シャラン
                                <br />・アルテオン
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・ティグアン</td>
                            <th class= "data-hidden">XL</th>
                            <td>・トゥアレグ</td>
                            <td class= "data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_porche.jpg" alt="ポルシェ" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">M</th>
                            <td>・ボクスター
                                <br />・ケイマン
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・911
                                <br />・928
                                <br />・918
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・パナメーラ</td>
                            <th class= "data-hidden">XL</th>
                            <td>・カイエン
                                <br />・マカン
                            </td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_peugeot.jpg" alt="プジョー" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・206
                                <br />・307
                                <br />・1007
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・206ワゴン
                                <br />・307ワゴン
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・407
                                <br />・3008
                                <br />・508
                                <br />・RCZ
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・508W
                                <br />・2008
                                <br />・5008
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・607</td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_renault.jpg" alt="ルノー" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・トゥインゴ
                                <br />・ウインド
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・メガーヌ
                                <br />・ルーテシア
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・カングー
                                <br />・メガーヌエステート
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・グランセニック
                                <br />・キャプチャー
                                <br />・コレオス
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・アヴァンタイム</td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_citroen.jpg" alt="シトロエン" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・C2</td>
                            <th class= "data-hidden">S</th>
                            <td>・C3
                                <br />・DS3
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・C4
                                <br />・DS4
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・C5
                                <br />・DS5
                                <br />・C6
                                <br />・C4ピカソ
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・DS7
                                <br />・C5エアクロス
                            </td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_rover.jpg" alt="ランドローバー" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">LL</th>
                            <td>・フリーランダー
                                <br />・イヴォーク
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・ディスカバリー
                                <br />・ヴォーグ
                                <br />・ディフェンダー
                                <br />・レンジローバースポーツ
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・レンジローバー
                                <br />・オートバイオグラフィー
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_jaguar.jpg" alt="ジャガー" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">L</th>
                            <td>・Sタイプ
                                <br />・Fタイプ
                                <br />・ソブリン
                                <br />・XE
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・XK
                                <br />・XF
                                <br />・Xタイプ
                                <br />・Eペース
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・XJ
                                <br />・Fペース
                            </td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_fiat.jpg" alt="フィアット" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・500
                                <br />・パンダ
                            </td>
                            <th class= "data-hidden">S</th>
                            <td>・プント
                                <br />・バルケッタ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・ムルティプラ</td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/wp/wp-content/uploads/2019/06/img_abarth.jpg" alt="アバルト" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・595</td>
                            <th class= "data-hidden">S</th>
                            <td>・124スパイダー</td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_alfa.jpg" alt="アルファロメオ" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・ミト</td>
                            <th class= "data-hidden">S</th>
                            <td>・147
                                <br />・ブレラ
                                <br />・ジュリエッタ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・GT
                                <br />・156
                                <br />・159
                                <br />・4C
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・166
                                <br />・8C
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・ステルヴィオ</td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_saab.jpg" alt="サーブ" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <th class= "data-hidden">S</th>
                            <td>・93カブリオレ</td>
                            <th class= "data-hidden">M</th>
                            <td>・93セダン
                                <br />・900
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・95
                                <br />・93エステート
                                <br />・93Ｘ
                            </td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_volvo.jpg" alt="ボルボ" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <th class= "data-hidden">S</th>
                            <td>・C30</td>
                            <th class= "data-hidden">M</th>
                            <td>・V40
                                <br />・S40
                            </td>
                            <th class= "data-hidden">L</th>
                            <td>・V60
                                <br />・V70
                                <br />・S80
                                <br />・S60
                                <br />・S90
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・V90
                                <br />・240ワゴン
                                <br />・XC70
                                <br />・XC60
                                <br />・XC40
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・XC90</td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_chevrolet.jpg" alt="シボレー" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・MW
                                <br />・クルーズ
                                <br />・ソニック
                            </td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">L</th>
                            <td>・カマロ
                                <br />・コルベット
                                <br />・キャプティバ
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・トレイルブレイザー</td>
                            <th class= "data-hidden">XL</th>
                            <td>・トラバース
                                <br />・ブレイザー
                                <br />・シルバラード
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・アストロ
                                <br />・シェビー
                            </td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_ford.jpg" alt="フォード" width="75" height="50" />
                            </th>
                            <th class= "data-hidden">SS</th>
                            <td>・ka</td>
                            <th class= "data-hidden">S</th>
                            <td>・フォーカス
                                <br />・フィエスタ
                            </td>
                            <th class= "data-hidden">M</th>
                            <td>・トーラス</td>
                            <th class= "data-hidden">L</th>
                            <td>・マスタング
                                <br />・クーガ
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・エクスプローラー
                                <br />・サンダーバード
                            </td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_caderac.jpg" alt="キャデラック" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">L</th>
                            <td>・CTS
                                <br />・ATS
                            </td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">XL</th>
                            <td>・DTS
                                <br />・SRX
                                <br />・セビル
                            </td>
                            <th class= "data-hidden">XXL</th>
                            <td>・エスカレード</td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_jeep.jpg" alt="ジープ" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">L</th>
                            <td>・コンパス
                                <br />・カウボーイ
                            </td>
                            <th class= "data-hidden">LL</th>
                            <td>・ラングラー</td>
                            <th class= "data-hidden">XL</th>
                            <td>・ラングラーリミテッド
                                <br />・チェロキー
                                <br />・グランドチェロキー
                            </td>
                            <td class="data-none"></td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_teslamotors.jpg" alt="テスラモーターズ" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">XL</th>
                            <td>・モデルS</td>
                            <th class= "data-hidden">XXL</th>
                            <td>・モデルX</td>
                        </tr>
                        <tr>
                            <th class="brand-logo" colspan="3">
                                <img src="https://www.unite-carlife.com/img/price/img_maserati.jpg" alt="マセラティ" width="75" height="50" />
                            </th>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <td class="data-none"></td>
                            <th class= "data-hidden">L</th>
                            <td>・ギブリ</td>
                            <th class= "data-hidden">LL</th>
                            <td>・グランツーリズモ
                                <br />・レヴァンテ
                                <br />・クアトロポルテ
                            </td>
                            <th class= "data-hidden">XL</th>
                            <td>・グランカブリオ</td>
                            <td class="data-none"></td>
                        </tr>
                    </tbody>
                </table>
                <p class="offer">※上記に該当しない車種についてはお電話でお問合せください。
                </p>
            </div>
        </div>
    </div>

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
		<script src="modaal.min.js"></script>
        <script src="js/jquery.estimate.js"></script>
        <script src="js/form.js"></script>
        
	</body>
</html>