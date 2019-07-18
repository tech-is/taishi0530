<?php

// 変数の初期化
$sql = null;
$res = null;
$dbh = null;

try {
	// DBへ接続
	$dbh = new PDO("mysql:host=localhost;dbname=new_kadai;charset=utf8",'root','');
    echo "できてる";
	// SQL作成
	 //$sql = "UPDATE member SET deleted_flag = 999 WHERE user_id = 1";
    $sql = "INSERT INTO member(user_id, name, kana, tel, zip_adress, adress, mail, password, tmp_pass, created_at, updated_at, deleted_flag)
                     values('12','竜','リョウ','232323','54325','nero@qrq','neroy','4jujuujuneroj','egtbiqyuiyui','2019-3-30 14:00','2019-8-09 15:00','2178789')";
    // $sql = "DELETE FROM member WHERE user_id = 1";              
    
    
	// SQL実行
    $res = $dbh->query($sql);
    
	// 取得したデータを出力
	// foreach( $res as $value ) {
	// 	echo "$value[name]<br>";
	// }




} catch(PDOException $e) {
	echo $e->getMessage();
	die();
}

// 接続を閉じる
$dbh = null;






