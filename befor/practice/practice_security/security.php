<?php
session_start();
include("../../HTML/header_form.php");
// 暗号学的的に安全なランダムなバイナリを生成し、それを16進数に変換することでASCII文字列に変換します
$toke_byte = openssl_random_pseudo_bytes(16);
$csrf_token = bin2hex($toke_byte);
// 生成したトークンをセッションに保存します
$_SESSION['csrf_token'] = $csrf_token;
?>

<form method = "post" action = "security_2.php">
    <p>入力：<input type = "text" name = security></p>
    <p><input type='submit' value='確認'></p>
    <input type="hidden" name="csrf_token" value="<?=$csrf_token?>">
</form>