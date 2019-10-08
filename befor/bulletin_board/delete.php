<?php
include("header.php");
?>

<h1>一言掲示板</h1>
<h3>～今日は何について話す？～</h3>

<form method = "post" action = "bulletin_board.php">
    <p>表示名</p>
    <input type = "text" name = "name">
    <p></p>
    <p>一言メッセージ</p>
    <textarea name = "message"></textarea>
    <p></p>
    <input type = "submit" name = "btn" value = "投稿">
</form>

<?php
date_default_timezone_set('Asia/Tokyo');
$time=date('Y-m-d H:i:s');



try
{
    if (isset($_POST['btn'])) {
        if(empty($_POST['message'])) {
        ?> <p><?= "未入力です";?></p><?php
        }elseif(empty($_POST['name'])){
        ?> <p><?= "未入力です";?></p><?php
        }
        else{

            htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
            htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

        $dbh = new PDO("mysql:host=localhost;dbname=bulletin_board;charset=utf8","root","");
        // echo "接続完了"."<br>";
        //エラーの表示
        $stmt = $dbh -> prepare("INSERT INTO maneger (name, message,time) VALUES (:name, :message, :time)");
        $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
        $stmt->bindValue(':time', $time,);
        $stmt->execute();
        }
       
    }
}catch(PDOException $e) 
{
    echo $e -> getMessage();
    die();
}
$dbh = null;
?>

<hr>

<?php

try
{
    // if(isset($_POST['message'])) {
    $dbh = new PDO("mysql:host=localhost;dbname=bulletin_board;charset=utf8","root","");
    $sql = "SELECT name,message,time FROM maneger";
    $res = $dbh->query($sql);
    ?><form method = "post" action = "delete.php"><?php

    foreach( $res as $value ) {
        echo "表示名：",$value['name'] = htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'),"<br>",
            "メッセージ：",$value['message'] = htmlspecialchars($value['message'], ENT_QUOTES, 'UTF-8'),"<br>",
            "<br>",$value['time'],"<br>,<hr>";
            
            ?><input type = "submit" value = "削除"><?php
    }
    // print_r($value);
    
    // echo "接続完了"."<br>";
    // //エラーの表示
    // $stmt = $dbh -> prepare("SELECT name,message,time FROM maneger");
    // // $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    // // $stmt->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
    // // $stmt->bindValue(':time', $time,);
    // $stmt->execute();
    // }    
} 
catch(PDOException $e) 
{
    echo $e -> getMessage();
    die();
}
$dbh = null;



