<?php
// phpinfo();
// error_reporting('E_ERROR');
//基本設定　**********************************************************

//セッションの保存先
session_save_path('private/session/');

//その他設定をロード
include('config.php');
include('common.php');

//********************************************************************

//メイン処理　********************************************************
if(!isset($_GET['mode']) && admin_root()){
  edittopic(0,'normal','','');
}else if($_GET['mode'] == "edit" && !isset($_GET['start']) && admin_root()){
edittopic(0,'normal','','');
  }else if($_GET['mode'] == "edit" && isset($_GET['start']) && admin_root()){
edittopic(sanitize($_GET['start']),'normal','','');
  }else if($_GET['mode'] == "write" && admin_root()){
writelogs($imgwidth);
  }else if($_GET['mode'] == "collect" && admin_root()){
    if(!isset($_GET['status']) && $_GET['topicid'] != ""){
collecttopic(sanitize($_GET['topicid']),'normal',sanitize($_GET['pass']));
    }else if($_GET['status'] == 'rewrite' && admin_root()){
rewritetopic();
    }
  }else if($_GET['mode'] == "delete" && $_GET['topicid'] != "" && admin_root()){
deletetopic(sanitize($_GET['topicid']),'normal',sanitize($_GET['pass']));
  }else if($_GET['mode'] == "up" && $_GET['topicid'] != "" && admin_root()){
moveup(sanitize($_GET['topicid']));
  }else if($_GET['mode'] == "down" && $_GET['topicid'] != "" && admin_root()){
movedown(sanitize($_GET['topicid']));
  }else{
syserror('不正な動作モード','動作モードが不正です');
  }

//********************************************************************

//記事の編集  　******************************************************
function edittopic($start,$user,$match,$word){
global $step;
global $text_fields;
global $image_fields;
global $admin_title_only;
//テンプレートの読み込み
$temp = file_get_contents("admin_temp.html");
//記事情報の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
}

//記事情報の逆ソート
$lines = array_reverse($lines);
array_shift($lines);

//記事投稿フォーム
//再入力の場合、sessionから復元
if($_GET['reinput'] == 'true' && $_SESSION['title']){
$title = $_SESSION['title'];
unset($_SESSION['title']);
}
$uploader_tag = create_uploader_tag();
$textfield_tag = create_texfield_tag(null);
if(image_fields == 1){
/*$rayout_select_tag = '
<tr>
<td nowrap width="80">レイアウト　：</td><td width="40"><input type="radio" name="rayout" value="left" checked="checked"></td><td width="60" align="left"><img src="system_images/icon_left.gif" alt="左寄せ"></td><td width="40"><input type="radio" name="rayout" value="right"></td><td width="60" align="left"><img src="system_images/icon_right.gif" alt="右寄せ"></td>
</tr>
';*/
$rayout_select_tag = '';
}else{
$rayout_select_tag = '';
}
$tags = '<p id="view_site"><a href="index.php" target="_blank">サイトを見る &gt;&gt;</a></p>
<div id="topic_input_list_sw">
<ul>
<li><a href="javascript:void(0);" onclick="topic_sw(\'input\')" id="topic_input_list_sw_01" class="default">新規記事投稿</a></li>
<li><a href="javascript:void(0);" onclick="topic_sw(\'list\')" id="topic_input_list_sw_02" class="default">投稿済記事の修正・削除</a></li>
</ul>
</div>
<div id="new_topic_input">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
<form enctype="multipart/form-data" name="form2" action="admin.php?mode=write" method="post">
<tr>
<td nowrap width="20%">タイトル　：</td>
<td width="80%"><input name="title" type="text" id="title" style="width:65%;" value="'.$title.'"></td>
</tr>
'.$textfield_tag.$uploader_tag.'<tr>
<td colspan="2" align="left">
<table width="280" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0px;">
'.$rayout_select_tag.'
</table>
</td>
</tr>
<tr>
<td colspan="2">
<input name="submit" type="submit" value="投稿する">
　<input name="reset" type="reset" value="リセット"></td>
</tr>
<tr>
<td colspan="2" style="border-bottom:dotted 1px #CCCCCC;">&nbsp;</td>
</tr>
</form>
</table>
</div>
';

$tags .= '<div id="topic_edit_list">
';

if($user != 'search' && count($lines) == 0){
$tags .= '<p style="margin:25px auto;">現在記事は登録されていません</p>
';
}

$rows = count($lines);

for($i=0;$i<$rows;$i++){
$element = explode('<#c#>',$lines[$i]);
$disp_title = html_entity_decode($element[1]);
$disp_date = html_entity_decode($element[0]);
$disp_comments = explode('<#e#>',$element[2]);
$disp_images = explode('<#e#>',$element[4]);
$tags .= '<table width="100%" border="0" cellspacing="5" cellpadding="0" style="margin-top:20px;" class="topics_unit">
<tr>
<td colspan="2" valign="top">';
if($admin_title_only == 1){
$tags .= '<h2 class="admin_topic_list_title">'.$disp_title.'</h2>
';
}else{
for($j=0;$j<count($disp_images);$j++){
if($disp_images[$j] != "" && file_exists($disp_images[$j])){
global $imgwidth;
list($w,$h,$tp,$at) = getimagesize($disp_images[$j]);
if($w < $imgwidth){
$disp_image[] = '<img src="'.$disp_images[$j].'" alt="イメージ">';
}else{
$zoomrate = $imgwidth/$w;
$tempwidth = $w*$zoomrate;
$tempheight = $h*$zoomrate;
$disp_image[] = '<img src="'.$disp_images[$j].'" alt="イメージ" width="'.$tempwidth.'" height="'.$tempheight.'">
';
}
}else{
$disp_image[] = '';
}
}
for($j=0;$j<count($disp_comments);$j++){
$disp_comment[] = str_replace("\r\n","<br>",html_entity_decode($disp_comments[$j]));
}
$sub_tags = file_get_contents('sub_template.html');
$sub_tags = str_replace('{$disp_title}',$disp_title,$sub_tags);
$sub_tags = str_replace('{$disp_date}',$disp_date,$sub_tags);
for($j=0;$j<count($disp_comment);$j++){
$sub_tags = str_replace('{$disp_comment'.($j+1).'}',$disp_comment[$j],$sub_tags);
}
for($j=0;$j<count($disp_images);$j++){
$sub_tags = str_replace('{$disp_image'.($j+1).'}',$disp_image[$j],$sub_tags);
}
$sub_tags = preg_replace('/{\$.*?}/','',$sub_tags);
$disp_comments = array();
$disp_image = array();
$disp_comment = array();
$tags .= $sub_tags;
}

$tags .= '</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>
<form name="'.$element[3].'" action="admin.php" method="get" onsubmit="return(confirm_delete(this.mode.value))">処理
<select name="mode" id="mode">
<option value="collect">修正</option>
<option value="delete">削除</option>
</select>
<input type="hidden" name="topicid" value="'.$element[3].'">
　<input type="submit" value="実行"></form></td>
<td align="right"><table><tr><td>表示順　：　</td><td><a href="admin.php?mode=up&topicid='.$element[3].'"><img src="system_images/upbtn.gif" alt="上へ" border="0"></a>　<a href="admin.php?mode=down&topicid='.$element[3].'"><img src="system_images/dwnbtn.gif" alt="下へ" border="0"></a></td></tr></table></td>
</tr>
</table>
';
}

$tags .= '</div>
';

//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$tags,$temp);
dispout($temp);
exit;
}
//********************************************************************

//記事の通常書き込み  ************************************************
function writelogs($imgwidth){
global $image_fields;
global $login_user;

//リクエストがPOSTか判定
if($_SERVER["REQUEST_METHOD"] != "POST"){
syserror('不正なリクエスト','不正なリクエストです。');
exit();
}

//POSTデータの受信

$date = date('Y/m/d');
$title = htmlspecialchars(sanitize_araw_html($_POST['title']));
//$comment = sanitize_araw_html($_POST['comment']);
foreach($_POST as $key => $val){
if(is_numeric(strpos($key,'comment'))){
$comment_array[] = htmlspecialchars(sanitize_araw_html($val));
}
}
$comment = implode('<#e#>',$comment_array);
$topicid = uniqid('tpc',false);
$rayout = sanitize($_POST['rayout']);

//入力値のチェック
$errmess = "";
if($title == ""){
$errmess .= "タイトルを入力してください。<br>\n";
}
/*if($comment == ""){
$errmess .= "コメントを入力してください。<br>\n";
}*/

//画像ファイルの容量・フォーマットチェック
$errmess .= check_image();

if($errmess != ""){
//再入力用にsessionに保存
$_SESSION['title'] = $title;
$_SESSION['comment_array'] = $comment_array;
//テンプレートの読み込み
$temp = file_get_contents("admin_temp.html");
$errmess = "<p>入力エラーがあります。以下の項目をご確認ください。<br><br>\n".$errmess."</p>\n<p align=\"center\" style=\"margin-top:20px;\"><input type=\"button\" value=\"編集画面に戻る\" onclick=\"location.replace('admin.php?reinput=true');\"></p>";
//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$errmess,$temp);
dispout($temp);
exit;
}

for($i=0;$i<$image_fields;$i++){
//画像処理
$newimg_array[] = image_upload($i);
}

$image_names = implode('<#e#>',$newimg_array);
$rec = $date.'<#c#>'.$title.'<#c#>'.$comment.'<#c#>'.$topicid.'<#c#>'.$image_names.'<#c#>'.$rayout.'<#d#>';

lock("topics.dat");
$fp = fopen("topics.dat","a");
fwrite($fp,"$rec");
fclose($fp);
unlock("topics.dat");

add_restore_data($topicid,$rec);
add_restore_list($topicid);

//記事の件数超過チェック、超過分の過去記事削除
cuttopic();
//RSSの生成
makerss();
//ログ出力
op_log($login_user,'new_entry',$topicid);
alert_jump('書き込み完了','記事の投稿を受け付けました','admin.php?mode=edit');
}
//********************************************************************

//記事修正フォーム  **************************************************
function collecttopic($topicid,$user,$pass){
global $image_fields;
global $text_fields;
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
exit;
}
//記事の抽出
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
if($element[3] == $topicid){
$date = $element[0];
$title = html_entity_decode($element[1]);
$comment = explode('<#e#>',$element[2]);
$topicid = $element[3];
$imgurl = explode('<#e#>',$element[4]);
$rayout = $element[5];
}
}

//再入力の場合、sessionから復元
if($_GET['reinput'] == 'true' && $_SESSION['title']){
$title = $_SESSION['title'];
unset($_SESSION['title']);
}

for($i=0;$i<$image_fields;$i++){
$uploader_tag .= '
<tr>
<td colspan="2">画像'.($i+1).'　：
<br>';
global $imgwidth;
list($w,$h,$tp,$at) = getimagesize($imgurl[$i]);
if($w < $imgwidth){
	if($imgurl[$i] != ''){
	$uploader_tag .= '
	<img src="'.$imgurl[$i].'" alt="イメージ">';
	}else{
	$uploader_tag .= '
	<img src="system_images/dummy.jpg" alt="NO IMAGE" width="'.$imgwidth.'">';
	}
}else{
$zoomrate = $imgwidth/$w;
$tempwidth = $w*$zoomrate;
$tempheight = $h*$zoomrate;
	if($imgurl[$i] != ''){
	$uploader_tag .= '<br>
	<img src="'.$imgurl[$i].'" alt="イメージ" width="'.$tempwidth.'" height="'.$tempheight.'">';
	}else{
	$uploader_tag .= '<br>
	<img src="system_images/dummy.jpg" alt="NO IMAGE" width="'.$imgwidth.'">';
	}
}
$uploader_tag .= '<br><br>
<input type="radio" name="imgcol'.$i.'" id="imgcol'.$i.'_1" value="del">削除　<input type="radio" name="imgcol'.$i.'" id="imgcol'.$i.'_2" value="col">変更　<input type="radio" name="imgcol'.$i.'" id="imgcol'.$i.'_3" value="none" checked>変更なし<br>
<input type="hidden" name="oldimg'.$i.'" value="'.$imgurl[$i].'">
<input type="file" name="newimg'.$i.'" onchange="activate_img_radio(this.value,\'imgcol'.$i.'\');">
<br>
<br>
</td>
</tr>
';
}	//アップローダー（修正フォーム用）
$textfield_tag = create_texfield_tag($comment);
$tag = '<p style="margin:15px auto 25px auto;">フォームの内容を編集して、「修正」ボタンをクリックしてください。</p>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
<form enctype="multipart/form-data" name="form2" action="admin.php?mode=collect&status=rewrite" method="post">
<tr>
<td width="20%" nowrap>タイトル　：</td>
<td width="80%"><input name="title" type="text" id="title" style="width:65%;" value="'.$title.'"></td>
</tr>
'.$textfield_tag.$uploader_tag;
/*if(image_fields == 1){
if($rayout == "left"){
$tag .= '<table width="280" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0px;">
<tr>
<td nowrap width="80">レイアウト　：</td><td width="40"><input type="radio" name="rayout" value="left" checked="checked"></td><td width="60" align="left"><img src="system_images/icon_left.gif" alt="左寄せ"></td><td width="40"><input type="radio" name="rayout" value="right"></td><td width="60" align="left"><img src="system_images/icon_right.gif" alt="右寄せ"></td>
</tr>
</table>';
}else{
$tag .= '<table width="280" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0px;">
<tr>
<td nowrap width="80">レイアウト　：</td><td width="40"><input type="radio" name="rayout" value="left"></td><td width="60" align="left"><img src="system_images/icon_left.gif" alt="左寄せ"></td><td width="40"><input type="radio" name="rayout" value="right" checked="checked"></td><td width="60" align="left"><img src="system_images/icon_right.gif" alt="右寄せ"></td>
</tr>
</table>';
}
}*/
$tag .= '</td>
</tr>
<tr>
<td colspan="2">
<input type="hidden" name="date" value="'.$date.'">
<input type="hidden" name="topicid" value="'.$topicid.'">
<input name="submit" type="submit" value="修正する">
　<input name="reset" type="reset" value="リセット">　　　<input type="button" value="一覧に戻る" onclick="location.replace(\'admin.php?tab=list\')"></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</form>
</table>
';

//テンプレートの読み込み
$temp = file_get_contents("admin_temp.html");

//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$tag,$temp);
dispout($temp);
exit;

}
//******************************************************************

//記事修正実行　****************************************************
function rewritetopic(){
global $login_user;
//リクエストがPOSTか判定
if($_SERVER["REQUEST_METHOD"] != "POST"){
syserror('不正なリクエスト','不正なリクエストです。');
exit();
}

//POSTデータの受信
$date = sanitize($_POST['date']);
$title = htmlspecialchars(sanitize_araw_html($_POST['title']));
//$comment = sanitize_araw_html($_POST['comment']);
//$imgcol = sanitize($_POST['imgcol']);
//$oldimg = sanitize($_POST['oldimg']);
foreach($_POST as $key => $val){
if(is_numeric(strpos($key,'comment'))){
$comment_array[] = htmlspecialchars(sanitize_araw_html($val));
}else if(is_numeric(strpos($key,'imgcol'))){
$imgcol_array[] = sanitize($val);
}else if(is_numeric(strpos($key,'oldimg'))){
$oldimg_array[] = sanitize($val);
}
}
$comment = implode('<#e#>',$comment_array);
$topicid = sanitize($_POST['topicid']);
$rayout = sanitize($_POST['rayout']);

//入力値のチェック
$errmess = "";
if($title == ""){
$errmess .= "タイトルを入力してください。<br>\n";
}
/*if($comment == ""){
$errmess .= "コメントを入力してください。<br>\n";
}*/

//画像ファイルの容量・フォーマットチェック
$errmess .= check_image();

if($errmess != ""){
//再入力用にsessionに保存
$_SESSION['title'] = $title;
$_SESSION['comment_array'] = $comment_array;
//テンプレートの読み込み
$temp = file_get_contents("admin_temp.html");
$errmess = "<p>入力エラーがあります。以下の項目をご確認ください。<br><br>\n".$errmess."</p>\n<p align=\"center\" style=\"margin-top:20px;\"><input type=\"button\" value=\"編集画面に戻る\" onclick=\"location.replace('admin.php?mode=collect&topicid=".$topicid."&reinput=true');\"></p>";
//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$errmess,$temp);
dispout($temp);
exit;
}

//画像処理
for($i=0;$i<count($imgcol_array);$i++){
if($_POST['imgcol'.$i] == "col"){
$image_url_col[$i] = image_upload($i);
if(file_exists($oldimg_array[$i]) && $_FILES['newimg'.$i]['tmp_name'] != ""){
unlink($oldimg_array[$i]);
}
if(file_exists(str_replace('cms_images/','cms_images/org_',$oldimg_array[$i])) && $_FILES['newimg'.$i]['tmp_name'] != ""){
unlink(str_replace('cms_images/','cms_images/org_',$oldimg_array[$i]));
}
}else if($_POST['imgcol'.$i] == "del"){
$image_url_col[$i] = '';
if(file_exists($oldimg_array[$i])){
unlink($oldimg_array[$i]);
}
if(file_exists(str_replace('cms_images/','cms_images/org_',$oldimg_array[$i]))){
unlink(str_replace('cms_images/','cms_images/org_',$oldimg_array[$i]));
}
}else{
$image_url_col[$i] = $oldimg_array[$i];
}
}

//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
exit;
}
//画像URLの更新
$imgurl = implode('<#e#>',$image_url_col);

//修正記事のデータ行
$rec = $date.'<#c#>'.$title.'<#c#>'.$comment.'<#c#>'.$topicid.'<#c#>'.$imgurl.'<#c#>'.$rayout;
//更新用データセットの生成
$rewrite = '';
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
if($element[3] == $topicid){
$rewrite .= $rec.'<#d#>';
}else{
if($lines[$i] != ''){
$rewrite .= $lines[$i].'<#d#>';
}
}
}
//更新データの書き込み
lock("topics.dat");
$fp = fopen("topics.dat","w");
fwrite($fp,$rewrite);
fclose($fp);
unlock("topics.dat");

//リストアデータの更新
update_restore_data($topicid,$rec);

//RSSの生成
makerss();
//ログ出力
op_log($login_user,'edit_entry',$topicid);
alert_jump('書き込み完了','記事の修正を受け付けました','admin.php?mode=edit&tab=list');
}
//******************************************************************

//記事削除　********************************************************
function deletetopic($topicid,$user){
global $login_user;
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
exit;
}

//保存対象の抽出・画像の削除
$rec = "";
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
if($element[3] == $topicid){
$matchflg = 1;
  //画像の削除
  $del_images = explode('<#e#>',$element[4]);
  foreach($del_images as $val){
  if($val != "" && file_exists($val)){
  unlink($val);
  }
  if($val != "" && file_exists(str_replace('cms_images/','cms_images/org_',$val))){
  unlink(str_replace('cms_images/','cms_images/org_',$val));
  }
  }
}else{
if($lines[$i] != ""){
$rec .= $lines[$i]."<#d#>";
}
if($element[3] != ''){
$list_rec .= $element[3]."\n";
}
}
}
if($matchflg == ""){
//テンプレートの読み込み
$temp = file_get_contents("admin_temp.html");
//エラーメッセージタグ
$errmess = '<p style="margin-bottom:30px;">この記事はすでに削除されています。</p>
<p align="center"><input type="button" value="管理画面に戻る" onClick="history.back()"></p>';
//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$errmess,$temp);
dispout($temp);
exit;
}else{
lock("topics.dat");
$fp = fopen("topics.dat","w");
fwrite($fp,"$rec");
fclose($fp);
unlock("topics.dat");
delete_restore_data($topicid);
update_restore_list($list_rec);
//RSSの生成
makerss();
//ログ出力
op_log($login_user,'delete_entry',$topicid);
alert_jump('削除完了','該当の記事を削除しました','admin.php?mode=edit&tab=list');
}
}
//********************************************************************

//画像の容量・フォーマットチェックファンクション　**********

function check_image(){
global $image_fields;
global $maxfilesize;
$alert_max_filesize = str_replace('M','',ini_get('upload_max_filesize'))*1024;
if($maxfilesize < $alert_max_filesize){$alert_max_filesize = $maxfilesize;}
$total_upfile_size = 0;
for($i=0;$i<$image_fields;$i++){
if(isset($_FILES['newimg'.$i]['name']) && $_FILES['newimg'.$i]['name'] != ""){
//個別ファイル容量
if($_FILES['newimg'.$i]['error'] == 1){
$errmess .= "アップロードできる画像ファイル容量は".$alert_max_filesize." KBまでです。<br>\n";
}else if($_FILES['newimg'.$i]['error'] != 0){
$errmess .= "画像のアップロードに失敗しました。ファイルをご確認ください。<br>\n";
}
//ファイル拡張子
if(eregi('\.jpg',$_FILES['newimg'.$i]['name']) || eregi('\.jpeg',$_FILES['newimg'.$i]['name']) || eregi('\.gif',$_FILES['newimg'.$i]['name']) || eregi('\.png',$_FILES['newimg'.$i]['name'])){
//合計ファイル容量
global $maxfilesize;
$total_upfile_size += $_FILES['newimg'.$i]['size'];
}else{
$errmess .= "対応していないファイルフォーマットです。<br>\n";
}
}
}
if($total_upfile_size > (($maxfilesize)*1024)){
$errmess .= "アップロードできる画像ファイル容量は合計 $maxfilesize KBまでです。<br>\n";
}
return $errmess;
}

//**********************************************************

//画像のアップロード処理ファンクション　********************

function image_upload($i){
if($_FILES['newimg'.$i]['tmp_name'] != ""){
$dir = getcwd();
$newimg = "";
$image_id = uniqid('pic');
$image_filename = ereg_replace('[^\.]*\.',$image_id.'.',$_FILES['newimg'.$i]['name']);
$file = $dir."/cms_images/".$image_filename;
$org_file = $dir."/cms_images/org_".$image_filename;
move_uploaded_file($_FILES['newimg'.$i]['tmp_name'],"tmp/".$image_filename);
copy("tmp/".$image_filename,$org_file);
list($lw,$lh,$type,$attr) = getimagesize("tmp/".$image_filename);
if(extension_loaded("gd")){
switch($type){
case "1":
$img_obj = imagecreatefromgif("tmp/".$image_filename);
break;
case "2":
$img_obj = imagecreatefromjpeg("tmp/".$image_filename);
break;
case "3":
$img_obj = imagecreatefrompng("tmp/".$image_filename);
break;
default:
return false;
}
}
$newimg = 'cms_images/'.$image_filename;
//画像のサイズチェック、リサイズ処理
global $imgwidth;
if(extension_loaded("gd")){
if(file_exists("tmp/".$image_filename)){
list($lw,$lh,$type,$attr) = getimagesize("tmp/".$image_filename);
}
if($lw > $imgwidth){
$success = resizeimage($img_obj,$type,$lw,$lh,$imgwidth,$file);
if($success == false){
syserror("エラー","画像のリサイズに失敗しました。");
exit;
}
}else{
copy("tmp/".$image_filename,$file);
}
}else{
copy("tmp/".$image_filename,$file);
}
if(file_exists("tmp/".$image_filename)){
unlink("tmp/".$image_filename);
}
}
return $newimg;
}

//**********************************************************

//画像のリサイズファンクション　****************************
function resizeimage($img_obj,$type,$lw,$lh,$imgwidth,$file){

$adjust_rate = $imgwidth/$lw;
$adjust_width = round($lw * $adjust_rate,0);
$adjust_height = round($lh * $adjust_rate,0);
$emp_img = imagecreatetruecolor($adjust_width,$adjust_height);
if(!imagecopyresampled($emp_img,$img_obj,0,0,0,0,$adjust_width,$adjust_height,$lw,$lh)){
syserror("エラー","画像のリサイズに失敗しました");
}
switch($type){
case "1":
imagegif($emp_img,$file);
break;
case "2":
imagejpeg($emp_img,$file);
break;
case "3":
imagepng($emp_img,$file);
break;
default:
syserror("サポート外のファイル形式","このファイル形式はサポートしていません");
exit;
}
return true;
}
//**********************************************************

//画像アップローダー生成ファンクション　********************

function create_uploader_tag(){
global $image_fields;
for($i=0;$i<$image_fields;$i++){
$uploader_tag .= '
<tr>
<td colspan="2">画像'.($i+1).'　：<input type="file" name="newimg'.$i.'"></td>
</tr>
';
}
return $uploader_tag;
}

//**********************************************************

//テキストフィールド生成ファンクション　********************

function create_texfield_tag($comment){
global $text_fields;
for($i=0;$i<$text_fields;$i++){
if($_GET['reinput'] == 'true' && $_SESSION['comment_array']){
$insert_comment = $_SESSION['comment_array'][$i];
}else if($comment != null){
$insert_comment = html_entity_decode($comment[$i]);
}else{
$insert_comment = '';
}
$textfield_tag .= '
<tr>
<td colspan="2">コメント'.($i+1).'　：
<table width="80%" border="0" cellpadding="0" cellspacing="0" style="margin:8px 0px 3px 0px;">
<tr>
<td><table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="35"><a href="javascript:void(0);" onClick="insertBold(\'commentarea'.$i.'\')"><img src="system_images/bold.gif" alt="" width="24" height="24" border="0"></a></td>
<td>太字　
<select onChange="javascript:insertFontColor(\'commentarea'.$i.'\',this.value)" onfocus="this.getElementsByTagName(\'option\')[0].selected=true;">
<option value="">文字色</option>
<option value="#FF0000" style="background:#FF0000; color:#FFFFFF;">赤色</option>
<option value="#00FF00" style="background:#00FF00; color:#FFFFFF;">緑色</option>
<option value="#0000FF" style="background:#0000FF; color:#FFFFFF;">青色</option>
<option value="#FFFF00" style="background:#FFFF00; color:#000000;">黄色</option>
<option value="#00FFFF" style="background:#00FFFF; color:#000000;">水色</option>
<option value="#FF00FF" style="background:#FF00FF; color:#000000;">桃色</option>
</select>　
<select onChange="javascript:insertFontSize(\'commentarea'.$i.'\',this.value)" onfocus="this.getElementsByTagName(\'option\')[0].selected=true;">
<option value="">文字サイズ</option>
<option value="60%">1</option>
<option value="80%">2</option>
<option value="100%">3</option>
<option value="120%">4</option>
<option value="140%">5</option>
<option value="160%">6</option>
</select></td>
</tr>
</table></td>
<td><table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="35"><a href="javascript:void(0);" onClick="addLinkUrl(\'commentarea'.$i.'\',\'blank'.$i.'\')"><img src="system_images/link.gif" alt="" width="24" height="24" border="0"></a></td>
<td>リンク（<input name="checkbox" type="checkbox" id="blank'.$i.'">
別ウィンドウ）</td>
</tr>
</table></td>
</tr>
</table>
<textarea name="comment'.$i.'" rows="10" style="width:80%;" id="commentarea'.$i.'">'.$insert_comment.'</textarea></td>
</tr>
';
}
if($_GET['reinput'] == 'true' && $_SESSION['comment_array']){unset($_SESSION['comment_array']);}
return $textfield_tag;
}

//**********************************************************

//検索窓生成ファンクション　********************************

function create_search_tags($word){
$tags = '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search_win">
<tr>
<td align="right"><form name="form1" action="admin.php" method="get">
<input type="hidden" name="mode" value="search">
キーワード検索　：
<input name="word" type="text" id="word" size="20" value="'.$word.'">　
<input type="submit" value="検索">
</form>
</td>
</tr>
</table>
';
return $tags;
}

//**********************************************************

//リストア用データ追加ファンクション　**********************

function add_restore_data($topicid,$rec){
$create_file_name = 'restore/data/'.$topicid.'.dat';
if(!file_exists($create_file_name)){touch($create_file_name);}
$fp = fopen($create_file_name,"w");
fwrite($fp,"$rec");
fclose($fp);
}

//**********************************************************

//リストア用データ更新ファンクション　**********************

function update_restore_data($topicid,$rec){
$update_file_name = 'restore/data/'.$topicid.'.dat';
if(file_exists($update_file_name)){
$fp = fopen($update_file_name,"w");
fwrite($fp,"$rec");
fclose($fp);
}
}

//**********************************************************

//リストア用データ削除ファンクション　**********************

function delete_restore_data($topicid){
if(file_exists('restore/data/'.$topicid.'.dat')){
unlink('restore/data/'.$topicid.'.dat');
}
}

//**********************************************************

//リストア用リスト追加ファンクション　**********************

function add_restore_list($topicid){
lock("list.dat");
$fp = fopen("restore/list.dat","a");
fwrite($fp,$topicid."\n");
fclose($fp);
unlock("list.dat");
}

//**********************************************************

//リストア用リスト更新ファンクション　**********************

function update_restore_list($rec){
lock("list.dat");
$fp = fopen("restore/list.dat","w");
fwrite($fp,$rec);
fclose($fp);
unlock("list.dat");
}

function pick_topicid($line){
$line_spl = explode("<#c#>",$line);
return $line_spl[3];
}

//**********************************************************

//件数超過記事削除ファンクション　**************************
function cuttopic(){
global $maxtopic;
if($maxtopic <= 0){$maxtopic = 1;}
$maxtopic++;
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
}
//記事件数の超過チェック
if(count($lines) > $maxtopic){
//超過記事分（過去記事）の画像ファイルリスト生成
for($i=0; $i<(count($lines)-($maxtopic));$i++){
$element = explode('<#c#>',$lines[$i]);
$unlink_list[] = $element[3];
  if($element[4] != ""){
  $unlink_image_array = array();
  $unlink_image_array = explode('<#e#>',$element[4]);
  	foreach($unlink_image_array as $val){
  	$unlink_image_list[] = $val;
  	}
  }
}
//超過分のリストアデータ削除
if(isset($unlink_list)){
  for($i=0;$i<count($unlink_list);$i++){
  if(file_exists('restore/'.$unlink_list[$i].'.dat')){
  unlink('restore/'.$unlink_list[$i].'.dat');
  }
  }
}
//超過記事分の画像ファイル削除
if(isset($unlink_image_list)){
  for($i=0;$i<count($unlink_image_list);$i++){
  unlink($unlink_image_list[$i]);
  }
}
//保存記事の抽出
$rec = "";
for($i=(count($lines)-$maxtopic);$i<(count($lines));$i++){
if($lines[$i] != ""){
$rec .= $lines[$i]."<#d#>";
$rec_elements = explode("<#c#>",$lines[$i]);
$list_rec .= $rec_elements[3]."\n";
}
}
//記事の保存
lock("topics.dat");
$fp = fopen("topics.dat","w");
fwrite($fp,"$rec");
fclose($fp);
unlock("topics.dat");
//リストアリスト更新
update_restore_list($list_rec);
}
return true;
}
//**********************************************************

//記事順上移動ファンクション　******************************

function moveup($topicid){
global $login_user;
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
}
$lines = array_reverse($lines);
array_shift($lines);

$matchflg = 0;
for($i=0;$i<count($lines);$i++){
$past = $now;
$now = $lines[$i];
$element = explode('<#c#>',$lines[$i]);
if($element[3] == $topicid){
if($now != ""){$newline[] = $now; $newline_topicid[] = pick_topicid($now);}
if($past != ""){$newline[] = $past; $newline_topicid[] = pick_topicid($past);}
$matchflg = 1;
}else{
  if($past != "" && $matchflg != 1){$newline[] = $past; $newline_topicid[] = pick_topicid($past);
  }else{
  $matchflg = 0;
  }
}
}
if($now != "" && $matchflg != 1){$newline[] = $now; $newline_topicid[] = pick_topicid($now);}

$newline = array_reverse($newline);
$rec = implode($newline,'<#d#>');
$rec .= '<#d#>';

//記事の保存
lock("topics.dat");
$fp = fopen("topics.dat","w");
fwrite($fp,"$rec");
fclose($fp);
unlock("topics.dat");

//リストアリストの更新
$newline_topicid = array_reverse($newline_topicid);
$list_rec = implode("\n",$newline_topicid);
update_restore_list($list_rec);

//RSSの再構築
makerss();
//ログ出力
op_log($login_user,'move_up',$topicid);
header('location: admin.php?mode=edit&tab=list');
}

//**********************************************************

//記事順下移動ファンクション　******************************

function movedown($topicid){
global $login_user;
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
}
$lines = array_reverse($lines);
array_shift($lines);

$matchflg = 0;
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
if($element[3] == $topicid && $i != (count($lines))-1){
$buffer = $lines[$i];
$newline[] = $lines[($i)+1]; $newline_topicid[] = pick_topicid($lines[($i)+1]);
$matchflg = 1;
}else{
  if($matchflg == 1){$newline[] = $buffer; $newline_topicid[] = pick_topicid($buffer);
  $matchflg = 0;
  }else{
  $newline[] = $lines[$i]; $newline_topicid[] = pick_topicid($lines[$i]);
  }
}
}

$newline = array_reverse($newline);
$rec = implode($newline,'<#d#>');
$rec .= '<#d#>';

//記事の保存
lock("topics.dat");
$fp = fopen("topics.dat","w");
fwrite($fp,"$rec");
fclose($fp);
unlock("topics.dat");

//リストアリストの更新
$newline_topicid = array_reverse($newline_topicid);
$list_rec = implode("\n",$newline_topicid);
update_restore_list($list_rec);

//RSSの再構築
makerss();
//ログ出力
op_log($login_user,'move_down',$topicid);
header('location: admin.php?mode=edit&tab=list');
}

//**********************************************************

//RSS生成ファンクション*************************************

function makerss(){
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
}
//記事情報の逆ソート
$lines = array_reverse($lines);
array_shift($lines);

global $maxrss,$site_url,$rss_title,$rss_discription;
$rss_title = $rss_title;
$rss_discription = $rss_discription;

$rss = '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>

  <title>'.$rss_title.'</title>
  <link>'.$site_url.'</link>
  <description>'.$rss_discription.'</description>

';
for($i=0;$i<$maxrss;$i++){
if($lines[$i] != ""){
$element = explode('<#c#>',$lines[$i]);
$pub_datetime = strtotime($element[0]);
$pubdate = date("D, d M Y H:i:s +0900",$pub_datetime);
$rss .= '<item>
  <title>'.$element[1].'</title>
  <link>'.$site_url.'?mode=focus&amp;topicid='.$element[3].'</link>
  <description>'.trim(str_replace('<#e#>',"\n",$element[2])).'</description>
  <pubDate>'.$pubdate.'</pubDate>
</item>
';
}
}
$rss .= '</channel>
</rss>
';
//ファイルの書き込み
if(file_exists('rss.xml')){
lock("rss.xml");
$fp = fopen("rss.xml","w");
fwrite($fp,"$rss");
fclose($fp);
unlock("rss.xml");
}
}

//**********************************************************

?>