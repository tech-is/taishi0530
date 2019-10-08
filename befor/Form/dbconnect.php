<?php

if(isset( $_POST['magagine'])){
    $magazine=1;
}else{
    $magazine=0;
}

// if(isset($_POST['password'])){
//     echo "きた";
// }else{
//     echo "来てない";
// }

$pdo = new PDO('mysql:host=localhost;dbname=TECKIS;charset=utf8','root','');
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo -> prepare("INSERT INTO member(NAME,KANA,TEL,MAIL,YEAR,SEX,MAGAGINE,PASS_TMP) VALUES(:name,:kana,:tell,:mail,:year,:sex,:magagine,:password)");//登録準備
$stmt -> bindValue(':name', $_POST['name'] , PDO::PARAM_STR);
$stmt -> bindValue(':kana', $_POST['kana'] , PDO::PARAM_STR);
$stmt -> bindValue(':tell', $_POST['tell'] , PDO::PARAM_INT);
$stmt -> bindValue(':mail', $_POST['mail'] , PDO::PARAM_STR);
$stmt -> bindValue(':year', $_POST['year'] , PDO::PARAM_INT);
$stmt -> bindValue(':sex', $_POST['sex'] , PDO::PARAM_INT);
$stmt -> bindValue(':magagine',$magazine , PDO::PARAM_INT);
$stmt -> bindValue(':password', $_POST['password'] , PDO::PARAM_STR);

//登録する文字の型を固定
$stmt -> execute();//データベースの登録を実行

 require 'mail.php'; ?>

<div class = "form">
<h3>会員登録フォーム</h3>

<p>会員登録ありがとうございました！</p>
</div>

<style>
    .form{
        background-color:#99CC99;
    }
</style>