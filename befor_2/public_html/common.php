<?php

//UTF-8のBOM削除　****************************************************
function delete_bom($str)
{
    if (ord($str{0}) == 0xef && ord($str{1}) == 0xbb && ord($str{2}) == 0xbf) {
        $str = substr($str, 3);
    }
    return $str;
}
//********************************************************************

//フォームデータのサニタイジング　************************************
function sanitize($array){
if(is_array($array)){
for($i=0; $i<count($array); $i++){
$array[$i] = stripslashes($array[$i]);
$array[$i] = htmlspecialchars($array[$i]);
$array[$i] = str_replace('{$','{＄',$array[$i]);
}
}else{
$array = stripslashes($array);
$array = htmlspecialchars($array);
$array = str_replace('{$','{＄',$array);
}
return $array;
}
//********************************************************************

//フォームデータのサニタイジング（HTML許可の場合）　******************
function sanitize_araw_html($array){
if(is_array($array)){
for($i=0; $i<count($array); $i++){
$array[$i] = stripslashes($array[$i]);
$array[$i] = str_replace('{$','{＄',$array[$i]);
$array[$i] = preg_replace('!<script.*?>.*?</script.*?>!is', '', $array[$i]) ;
}
}else{
$array = stripslashes($array);
$array = str_replace('{$','{＄',$array);
$array = preg_replace('!<script.*?>.*?</script.*?>!is', '', $array) ;
}
return $array;
}
//********************************************************************

//テンプレート出力サブルーチン　****************************
function dispout($html){
  //HEADタグの情報を抽出
  $ptn = '/<head>.*<\/head>/is';
  // eregi($ptn,$html,$head);
  preg_match($ptn,$html,$head);
  // print_r($head);
  //TITLEタグの抽出
  $ptn = '/<title>.*<\/title>/is';
  // eregi($ptn,$head[0],$title);
  preg_match($ptn,$head[0],$title);
  //ドキュタイプ、メタのcharsetをutf-8に強制置換
  $ptn = "/shift_jis/i";
  // $head_after = eregi_replace($ptn,"utf-8",$head[0]);
  $head_after = preg_replace($ptn,"utf-8",$head[0]);
  $ptn = "/EUC-JP/i";
  // $head_after = eregi_replace($ptn,"utf-8",$head_after);
  $head_after = preg_replace($ptn,"utf-8",$head_after);
  //タイトルタグを初期状態に書き戻し
  $ptn = "/<title>.*<\/title>/i";
  $head_after = preg_replace($ptn,$title[0],$head_after);
  //HEADタグ情報の置換
  $ptn = "/<head>.*<\/head>/i";
  $html = preg_replace($ptn,$head_after,$html);
  header ("Content-Type: text/html; charset=utf-8");
  echo $html;
  exit;
}
//**********************************************************

//システムエラー表示ファンクション　**********************************
function syserror($systitle,$sysmess){
  echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>'.$systitle.'</title>
  </head>
  <body>
  <p>'.$sysmess.'</p>
  </body>
  </html>';
  exit();
}
//********************************************************************

//アラート表示・ページ遷移ファンクション　****************************
function alert_jump($systitle,$alert,$jump){
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>'.$systitle.'</title>
<script type="text/javascript">
function showalert(){
alert(\''.$alert.'\');
location.replace(\''.$jump.'\');
}
</script>
</head>
<body onload="showalert();">
<noscript>
<p>'.$alert.'</p>
<p><a href="'.$jump.'">戻る</a></p>
</noscript>
</body>
</html>';
exit();
}
//********************************************************************

//マルチバイト文字の置換ファンクション  ********************
// src: 処理対象文字列
// from: 置換前文字列
// to: 置換後文字列
function mb_str_replace($src,$from,$to)
{ 
$result='';
$lastPos=0;
$fromLen=mb_strlen($from);
for(;;)
{
$pos=mb_strpos($src,$from,$lastPos);
if(false===$pos)
{
break;
}
$result.=mb_substr($src,$lastPos,$pos-$lastPos).$to;
$lastPos=$pos+$fromLen;
}
$result.=mb_substr($src,$lastPos);
return $result;
}
 
//**********************************************************

//ファイルロックファンクション  ****************************
function lock($file){
$lockdir= "lock/";
$lockfile= "$lockdir"."$file";
$retry = 10; //再挑戦回数
if (file_exists($lockfile)) {
$mtime = filemtime($lockfile); //30秒以上古いロックは削除する
if ($mtime < time() - 30) { 
unlock($file);
}
}
while (!@mkdir($lockfile, 0755)) { //ロック用ディレクトリを作成する 
if ($retry-- <= 0) { syserror('ファイルライトエラー','ただいま大変込み合っております。しばらく経ってからご利用ください。');}
sleep(1);
}
}

//ファイルロック解除ファンクション
function unlock($file) {
$lockdir= "lock/";
$lockfile= "$lockdir"."$file";
if (file_exists($lockfile)) {rmdir($lockfile);} //ロック用ディレクトリを削除する
}

//**********************************************************

//アドミニ認証・セッション維持  ****************************

function admin_root(){
global $login_user;
$temp = file_get_contents("admin_temp.html");
//$user_profile = getfromcsv('pass/pass.dat');
$user_profile_list = explode("\n",delete_bom(file_get_contents('pass/pass.dat')));
foreach($user_profile_list as $user_profile_list_val){
	if($user_profile_list_val != ''){
	$user_profile[] = explode(',',trim($user_profile_list_val));
	}
}
$admform = '<form action="admin.php" method="POST">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<th>管理者ID</th><td><input type="text" name="admid"></td>
</tr>
<tr>
<th>管理者PW</th><td><input type="password" name="admpw"></td>
</tr>
</table>
<div id="login_form_submit">
<input type="submit" value="ログイン">
</div>
</form>';
session_start();
$sequence_login = false;
if(isset($_POST["admid"])){
$_SESSION["admid"] = $_POST["admid"];
$_SESSION["admpw"] = $_POST["admpw"];
$sequence_login = true;
}
if(isset($_SESSION["admid"])){
	$pass_match = false;
	foreach($user_profile as $val){
		if($_SESSION["admid"] == $val[0] && $_SESSION["admpw"] == $val[1]){
			$pass_match = true;
			$login_user = $val[0];
		}
	}
  if($pass_match){
  if($sequence_login){op_log($login_user,'login','');}
  return true;
  }else{
  //テンプレートの変数置換
  $admform = '<div id="login_form"><p class="login_message" id="login_error">管理者ID・PWが無効です</p>'.$admform.'</div>';
  $temp = str_replace('{$bbs-contents}',$admform,$temp);
  $temp = str_replace('<div id="logout_link"><a href="logout.php">ログアウト</a></div>','',$temp);
  dispout($temp);
  exit();
  }
}else{
//テンプレートの変数置換
$admform = '<div id="login_form"><p class="login_message">管理者ID・PWを入力してください</p>'.$admform.'</div>';
$temp = str_replace('{$bbs-contents}',$admform,$temp);
$temp = str_replace('<div id="logout_link"><a href="logout.php">ログアウト</a></div>','',$temp);
dispout($temp);
exit();
}
}

//**********************************************************

//CSVからデータセットを取得して2次配列で返す ***************
function getfromcsv($dbfile){
if(file_exists($dbfile)){
  if(filesize($dbfile) == 0){
  return false;
  }
$file = fopen($dbfile,'r');
for($i=0;$line = fgets($file);$i++){
$lines[] = trim($line);
}
fclose($file);
for($i=0;$i<count($lines);$i++){
$element = explode(',',$lines[$i]);
  for($j=0;$j<count($element);$j++){
  $child[$j] = $element[$j];
  }
$parent[] = $child;
reset($child);
}
return $parent;
}else{
echo 'error! can not open file';
}
}

//**********************************************************

//操作ログ保存 *********************************************

function op_log($op_user,$op_oparation,$op_topicid){
//ログファイルの存在チェック
if(!file_exists('pass/log.dat')){
return;
}
//ログファイルの容量チェック
if(filesize('pass/log.dat') > 100000){
	if(!file_exists('pass/_log.dat')){touch('pass/_log.dat');}
	copy('pass/log.dat','pass/_log.dat');
	$fp=fopen('pass/log.dat','w');
	fwrite($fp,'');
	fclose($fp);
}
//ログの出力
$log_write = date("Y/m/d H:i:s").','.$op_user.','.$op_oparation.','.$op_topicid."\n";
$fp=fopen('pass/log.dat','a');
fwrite($fp,$log_write);
fclose($fp);
}

//**********************************************************

?>