<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MATSUMOTO SEMINAR</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/agency.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- <div id="first">初回アクセスです。
    <img src = "">
  </div> -->

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">MATSUMOTO SEMINAR</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">member</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">schedule</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link js-scroll-trigger" href="#team">Team</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <!-- <video class='bg-video' src="./img/Busy.mp4" poster="sample.png" autoplay loop></video> -->
    <div class="container">
      <div class="intro-text">
        <div class="intro-heading text-uppercase"></div>
        <div>
          <p class= "intro-lead-in">
            ~BASIC SOCIAL SKILLS~
          </p>
        </div>
        <div class="intro-heading text-uppercase"></div>
        <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> -->
      </div>
    </div>
  </header>
  <!-- Services -->
  <div class = "background-img">
    <div class = "background-img_opacity">
      <section class="page-section" id="services">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">about</h2>
                <h3 class="section-subheading text-muted">~松本ゼミについて~</h3>
              </div>
            </div>
            <div class="row text-center">
            <p class = "text">
            松本ゼミでは社会人基礎力育成の観点からグループワークとプロジェクト学習を行います。<br>
            愛媛県や松山市の課題を他地域と比較し、具体的なデータと経済学の考え方に基づきながら、<br>
            問題点を説明し改善策を提案することができるようになります。<br>
            地域経済の現状理解、データ処理やスライド作成など一連のパソコン操作、<br>
            それと株式を含め金融全般と企業理論の知識を習得できます。<br>
            またその学習の過程で愛媛を中心に他の四国各県や岡山県や広島県など<br>
            中国地方のいろいろな企業の活動についても併せて学ぶことができ、<br>
            業界研究・企業見学という意味でキャリア教育としても役立ちます。<br>
            とにかくだらだらとしたありきたりなゼミ活動ではなく、就職に直結し、<br>
            かつ中身の詰まったワクワクするゼミにしたいと思っています。<br>
            <a href = "https://www.matsuyama-u.ac.jp/forefront/forefront-102281/">>>>詳しくはこちら<<<</a>
            </p>
        </div>
        </div>
      </section>
    </div>
  </div>

  <!-- メンバー紹介 -->
  <section class="bg-light page-section" id="portfolio" style="background-color: black">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">MEMBER</h2>
          <h3 class="section-subheading text-muted">~あなたにとって社会人基礎力とは~</h3>
        </div>
      </div>
      <div class="row">
        
<?php 
  $json_url = "./js/member.json";
  if(file_exists($json_url)){
    $json = file_get_contents($json_url);
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    // 文字をデコードする
    $obj = json_decode($json,true);
    $obj = $obj["member"];
    // print_r($obj);
    foreach($obj as $key => $value){
?>
  <div class="col-md-4 col-sm-6 portfolio-item">
    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?=$value["id"]?>">
      <div class="portfolio-hover">
        <div class="portfolio-hover-content">
          <!-- <i class="fas fa-plus fa-3x"></i> -->
        </div>
      </div>
      <img class="img-fluid"  id="<?=$value["id"]?>" src="<?=$value['src2']?>" alt="" >
    </a>
    <div class="portfolio-caption">
      <h4><?=$value["name"]?></h4>
      <p class="text-muted"><?=$value["role"]?></p>
    </div>
  </div>
<?php
      }
    }
?>
      </div>
    </div>
  </section>

  <!-- About -->
  <div class = "background-img">
    <section class="page-section" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">schedule</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <table class="tbl-r05" border = 2 bordercolor = "#f5af05" style="text-align: left;">
          <tr class="thead" style="text-align: center;">
            <th></th>
            <th>2年生</th>
            <th>3年生</th>
            <th>4年生</th>
          </tr>
          <tr>
            <td style="text-align: center;">4月</td>
            <td data-label="見出し01"></td>
            <td data-label="見出し02">
              <p></p>・ゼミ開始
              <br>・役割決め
              <br>・ゲストスピーカー
              <br>・iProject！開始＆食事会<p></p>
            </td>
            <td data-label="見出し03">
            <p></p>・ゼミ開始
              <br>・就活<p></p>
            </td>
          </tr>
          <tr>
            <td style="text-align: center;">5月</td>
            <td data-label="見出し01"></td>
            <td data-label="見出し02"> 
            <p></p>・iProject！合同ミーティング
              <br>・iProject！第二回会合<p></p>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">6月</td>
            <td data-label="見出し01"></td>
            <td data-label="見出し02">
            <p></p>・遠足
              <br>・班決め
              <br>・iProject！第三回会合<p></p>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">7月</td>
            <td data-label="見出し01"></td>
            <td data-label="見出し02">
            <p></p>・iProject！伊予農業高校訪問
              <br>・iProject！第四回会合<p></p>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">8月</td>
            <td data-label="見出し01"></td>
            <td data-label="見出し02">
              <p></p>・OC参加
              <br>・前期お疲れさま会<p></p>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">9月</td>
            <td data-label="見出し01">
            ・ゼミ開始
            </td>
            <td data-label="見出し02">
            <p></p>・企業訪問
              <br>・ゼミ開始<p></p>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">10月</td>
            <td data-label="見出し01"> 
            <p></p>・親睦会<p></p>
            </td>
            <td data-label="見出し02">
              <br>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">11月</td>
            <td data-label="見出し01"></td>
            <td data-label="見出し02">
            <p></p>・中四国ゼミナール大会
              <br>・ビジネスプランコンテスト<p></p>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">12月</td>
            <td data-label="見出し01">
            <p></p>・社会人基礎力育成グランプリ見学
              <br>・ゲストスピーカー
              <br>・飲み会
              <br>・合宿<p></p>
            </td>
            <td data-label="見出し02">
            ・社会人基礎力育成グランプリ
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">1月</td>
            <td data-label="見出し01">
            <p></p>・縦コン<p></p>
            </td>
            <td data-label="見出し02">
            
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr>
            <td style="text-align: center;">2月</td>
            <td data-label="見出し01">
            <p></p>・椿まつり参加<p></p>
            </td>
            <td data-label="見出し02">
              <br>
            </td>
            <td data-label="見出し03"></td>
          </tr>
          <tr class="last">
            <td style="text-align: center;">3月</td>
            <td data-label="見出し01">
            <p></p>・個人面談<p></p>
            </td>
            <td data-label="見出し02">
            ・就活開始
            </td>
            <td data-label="見出し03"></td>
          </tr>
        </table>
      </div>
    </section>
  </div>


  <!-- Facebook -->
  <section class="py-5">
    <div class="col-md-4">
      <iframe src="https://www.facebook.com/groups/2341537366060461/"></iframe>
      <ul class="list-inline social-buttons">
        <li>
          <p>活動の記録はFacebookへ</p>
        </li>
        <li class="list-inline-item">
          <a href="https://www.facebook.com/groups/2341537366060461/">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
      </ul>
    </div>
    <!-- <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
          </a>
        </div>
      </div>
    </div> -->
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">お問い合わせ</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">送信</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019<br>Created by Taishi Ohmoto</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

<?php
    foreach($obj as $key => $value){
?>
  <div class="portfolio-modal modal fade" id="portfolioModal<?=$value["id"]?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase"><?= $value["name"] ?></h2>
                <p class="item-intro text-muted"><?= $value['ps'] ?></p>
                <img class=" d-block mx-auto" src="<?= $value['src'] ?>" alt="">
                <p><?=$value["comment"]?></p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
  
  <!--アクセス時アニメーションJs -->
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.cookie.js"></script> -->

  <!-- スクロールアニメーション -->
  <script src="js/scrollreveal.min.js"></script>
  <script>
    window.sr= new ScrollReveal();

    var animation = {
      scale:0.5,
      duration: 1600
    };
    sr.reveal('.img-fluid' , animation);
    sr.reveal('.masthead' , animation);
    sr.reveal('.portfolio-caption' , animation);
    sr.reveal('tr' , animation);


    var img = {
      origin: 'left',
      distance: '200px',
      duration: 1600
    };
    sr.reveal('.text' , img);
    sr.reveal('.navbar' , img);


    var intro = {
      distance: '3000px',
      duration: 2000,

    };
    sr.reveal('.intro-lead-in' , intro)
  </script>

    

</body>

</html>
