<?php
error_reporting('E_ERROR');
//基本設定　**********************************************************

//セッションの保存先
session_save_path('private/session/');

//その他設定をロード
include('config.php');
include('common.php');

//********************************************************************

//モード判定
if(!isset($_GET['mode'])){
restore_confirm();
}else if($_GET['mode'] == "exec" && admin_root($admid,$admpw)){
restore_exec();
}else{
syserror('不正な動作モード','動作モードが不正です');
}

//確認画面
function restore_confirm(){
$restore_list = explode("\n",trim(file_get_contents('restore/list.dat')));
$tags = '<h2>記事情報のリストア</h2>
<p align="center" style="text-align:center; margin-bottom:30px;">'.count($restore_list).' 件のリストア情報があります。復元しますか？</p>
<div align="center" style="text-align:center; margin-bottom:100px;">
<form action="restore.php?mode=exec" method="post">
<input type="button" value=" いいえ " onclick="location.href=\'admin.php\';">　　<input type="submit" value=" はい ">
</form>
</div>
';
$temp = file_get_contents("admin_temp.html");
$temp = str_replace('{$bbs-contents}',$tags,$temp);
dispout($temp);
exit;
}

//リストア実行
function restore_exec(){
global $login_user;
$restore_list = explode("\n",trim(file_get_contents('restore/list.dat')));
foreach($restore_list as $val){
if(file_exists('restore/data/'.$val.'.dat')){
$line = file_get_contents('restore/data/'.$val.'.dat');
$restore_log .= $line;
}
}
if(!file_exists('log.dat')){touch('log.dat');}
lock("log.dat");
$fp = fopen("log.dat","w");
fwrite($fp,$restore_log);
fclose($fp);
unlock("log.dat");
//ログ出力
op_log($login_user,'restore','');
alert_jump('リストア完了','リストアが完了しました。','admin.php');
}

?>