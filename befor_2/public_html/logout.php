<?php
error_reporting('E_ERROR');
//基本設定　**********************************************************

//セッションの保存先
session_save_path('private/session/');

//その他設定をロード
include('config.php');
include('common.php');

//********************************************************************

session_start();

$login_user = $_SESSION["admid"];

session_destroy();

op_log($login_user,'logout','');

header('Location: admin.php');

?>