<?php

// DB接続情報
$user = 'root';
$pass = '';
$dbnm = 'teckis';
$host = 'localhost';
// 接続先DBリンク
$connect = "mysql:host={$host};dbname={$dbnm}";
 
$sql = null;
$res = null;
$dbh = null;

try {
  // DB接続
  $pdo = new PDO($connect, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
//   echo "<p>DB接続に成功しました。</p>";
    echo "<h1>確認フォーム</h1>";
  $sql = "select PASS_TMP from member";
  $res = $pdo->query($sql);

    // if(!empty($_POST['password'])){
    //     $name = $_POST['password'];
    //     echo $name;
    // }else{
    //     echo "ないよ";
    // }


	// 取得したデータを出力
	foreach( $res as $value ) {
        
        "$value[PASS_TMP]";
	}
}




catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
    // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage()); 

}

?>
<?php
 include('../HTML/header_form.php');
?>
<form method = "post" >
    <p>確認：<input type = "text" name ="confirmation" required></p>
    <p><input type = "submit" name = "btn" value = "確認" required></p>

    <?php
     if(isset($_POST['btn'])) {
        if($_POST['confirmation'] === $value[PASS_TMP]){
             $login_success_url = "ok.php";
            header("Location: {$login_success_url}");
        exit;
        }else{
            echo  "無理です";
        }
   }
?>
</form>