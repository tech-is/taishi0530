<?php
// error_reporting('E_ERROR');
//基本設定　**********************************************************

//セッションの保存先
session_save_path('private/session/');

//その他設定をロード
include('config.php');

//********************************************************************

//パラメータチェック　************************************************
if(isset($_GET['mode'])){
	if($_GET['mode'] != 'read' && $_GET['mode'] != 'search' && $_GET['mode'] != 'focus'){
		header("HTTP/1.0 403 Forbidden");
		require_once('error/403.php');
		exit;
	}
}
if(isset($_GET['start'])){
	if (!preg_match("/^[0-9]+$/", $_GET['start'])) {
		header("HTTP/1.0 403 Forbidden");
		require_once('error/403.php');
		exit;
	}
}
if(isset($_GET['topicid'])){
	if (!preg_match("/^[0-9a-z]+$/", $_GET['topicid'])) {
		header("HTTP/1.0 403 Forbidden");
		require_once('error/403.php');
		exit;
	}
}
if(isset($_GET['word'])){
	if (is_numeric(strpos($_GET['word'],"\\0"))) {
		header("HTTP/1.0 403 Forbidden");
		require_once('error/403.php');
		exit;
	}
}

//********************************************************************

//メイン処理　********************************************************

  if((!isset($_GET['mode'])) || ($_GET['mode'] == "read" && !isset($_GET['start']))){
readtopic(0,'normal','','');
  }else if($_GET['mode'] == "read" && isset($_GET['start'])){
readtopic(sanitize($_GET['start']),'normal','','');
  }else if($_GET['mode'] == "search"){
searchtopic(sanitize($_GET['word']));
  }else if($_GET['mode'] == "focus"){
focustopic(sanitize($_GET['topicid']));
  }else{
syserror('不正な動作モード','動作モードが不正です');
  }

//********************************************************************

//記事の表示  　******************************************************
function readtopic($start,$user,$match,$word){
global $step;
//テンプレートの読み込み
$temp = file_get_contents("template.html");
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

//検索表示モードの場合、記事の絞込み
if($user == 'search' && $word != ""){
reset($lines);
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
	for($j=0;$j<count($match);$j++){
	if($element[3] == $match[$j]){
	$matchlines[] = $lines[$i];
	}
	}
}
$lines = $matchlines;
}

//キーワード検索窓
$tags = create_search_tags($word);

//検索モードの場合、検索結果情報を表示
$matchnum = count($match);
if($user == 'search' && $word != "" && $matchnum != 0){
$tags .= '<p style="margin:25px auto;" class="search_result"><strong>「'.$word.'」で検索した結果</strong>　'.$matchnum.'件</p>
';
}else if(($user == 'search' && $word != "" && $matchnum == 0)){
$tags .= '<p style="margin:25px auto;" class="post_not_found"><strong>該当する記事は見つかりませんでした</strong></p>
';
}

if($user != 'search' && count($lines) == 0){
$tags .= '<p style="margin:25px auto;" class="no_post">現在記事は登録されていません</p>
';
}

$rows = count($lines);
if(($rows - $start)<$step){
$loop = $rows - $start;
}else{
$loop = $step;
}

for($i=$start;$i<($loop + $start);$i++){
$element = explode('<#c#>',$lines[$i]);
$disp_title = $element[1];
$disp_date = $element[0];
$disp_comments = explode('<#e#>',$element[2]);
$disp_images = explode('<#e#>',$element[4]);

for($j=0;$j<count($disp_images);$j++){
if($disp_images[$j] != "" && file_exists($disp_images[$j])){
global $imgwidth;
global $is_pict_zoom;
list($w,$h,$tp,$at) = getimagesize($disp_images[$j]);
if($w < $imgwidth){
	if($is_pict_zoom){
	$disp_image[] = '<a href="'.str_replace('cms_images/','cms_images/org_',$disp_images[$j]).'" target="_blank"><img src="'.$disp_images[$j].'" alt="イメージ"></a>';
	}else{
	$disp_image[] = '<img src="'.$disp_images[$j].'" alt="イメージ">';
	}
}else{
$zoomrate = $imgwidth/$w;
$tempwidth = $w*$zoomrate;
$tempheight = $h*$zoomrate;
	if($is_pict_zoom){
	$disp_image[] = '<a href="'.str_replace('cms_images/','cms_images/org_',$disp_images[$j]).'" target="_blank"><img src="'.$disp_images[$j].'" alt="イメージ" width="'.$tempwidth.'" height="'.$tempheight.'"></a>
';
	}else{
	$disp_image[] = '<img src="'.$disp_images[$j].'" alt="イメージ" width="'.$tempwidth.'" height="'.$tempheight.'">
';
	}
}
}else{
$disp_image[] = '';
}
}
for($j=0;$j<count($disp_comments);$j++){
$disp_comment[] = str_replace("\r\n","<br>",$disp_comments[$j]);
}
$sub_tags = file_get_contents('sub_template.html');
$sub_tags = str_replace('{$disp_title}',html_entity_decode($disp_title),$sub_tags);
$sub_tags = str_replace('{$disp_date}',html_entity_decode($disp_date),$sub_tags);
for($j=0;$j<count($disp_comment);$j++){
$sub_tags = str_replace('{$disp_comment'.($j+1).'}',html_entity_decode($disp_comment[$j]),$sub_tags);
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

if($_GET['mode'] == "search"){
$tags .= '<p align="center" style="margin:40px auto 20px auto;" class="view_all_posts"><a href="'.basename($_SERVER['SCRIPT_NAME']).'">全ての記事を見る</a></p>
';
}

//記事件数リンク
if($start == ""){
$start = 0;
}

$prev = $start - $step;
if($prev < 0){
$prev = 0;
$prevnum = $start;
}else{
$prevnum = $step;
}
if($start <= 0){
$prevlink = false;
}else{
$prevlink =true;
}

$next = $start + $step;
if($next >= $rows){
$nextlink = false;
}else{
$nextlink = true;
}

if($next + $step >= $rows){
$nextnum = $rows - $next;
}else{
$nextnum = $step;
}


$tags .= '<table width="100%" border="0" cellspacing="5" cellpadding="0" style="margin-top:40px; margin-bottom:20px;" class="topics_pager_nav">
<tr>
<td>| ';
if($prevlink == true){
	if($user == 'search'){
	$tags .= '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?mode=search&start='.$prev.'&searched=true">前の'.$prevnum.'件</a>';
	}else{
	$tags .= '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?mode=read&start='.$prev.'">前の'.$prevnum.'件</a>';
	}
}else{
$tags .= '前の0件';
}
$tags .= ' | ';
if($nextlink == true){
	if($user == 'search'){
	$tags .= '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?mode=search&start='.$next.'&searched=true">次の'.$nextnum.'件</a>';
	}else{
	$tags .= '<a href="'.basename($_SERVER['SCRIPT_NAME']).'?mode=read&start='.$next.'">次の'.$nextnum.'件</a>';
	}
}else{
$tags .= '次の0件';
}
$tags .= ' | 　';

//ページリンク
for($i=0;$i<ceil($rows/$step);$i++){
	if($user == 'search'){
	$tags .= '[ <a href="'.basename($_SERVER['SCRIPT_NAME']).'?mode=search&start='.$i * $step.'&searched=true">'.($i + 1).'</a> ]　';
	}else{
	$tags .= '[ <a href="'.basename($_SERVER['SCRIPT_NAME']).'?mode=read&start='.$i * $step.'">'.($i + 1).'</a> ]　';
	}
}
$tags .= ' | </td>
</tr>
</table>
';

//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$tags,$temp);
dispout($temp);
exit;
}
//********************************************************************

//記事検索モード  ****************************************************
function searchtopic($word){
//引継ぎ表示の場合
if(isset($_GET['searched']) && isset($_GET['start'])){
session_start();
readtopic($_GET['start'],'search',$_SESSION['match'],$_SESSION['word']);
}
//キーワード区切り文字のスペースを半角に統一
$word = str_replace('　',' ',$word);
//余分なスペースや改行を削除
$word = trim($word);
//キーワードなしなら全件表示
if($word == ""){
readtopic(0,'normal','','');
}
//キーワードを配列に格納
$wordsp = explode(' ',$word);
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
exit;
}
//記事IDリスト及び検索対象文字リストの生成
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
$allid[] = $element[3];
$searchtxt[] = strip_tags(html_entity_decode($element[1]))."\n". strip_tags(html_entity_decode($element[2]));
}
//サーチ
$matchflg = true;	//初期値
for($i=0;$i<count($searchtxt);$i++){
	for($j=0;$j<count($wordsp);$j++){
	if(!is_numeric(mb_strpos($searchtxt[$i],$wordsp[$j]))){$matchflg = false;}
	}
if($matchflg != false){$match[] = $allid[$i];}
$matchflg = true;	//フラグ初期化
}
//ヒット件数が複数ページになる場合はIDリスト、ワードをセッション変数に格納
global $step;
if(count($match > $step)){
session_start();
$_SESSION['word'] = $word;
$_SESSION['match'] = $match;
//記事を表示
readtopic(0,'search',$match,$word);
}else{
//記事を表示
readtopic(0,'search',$match,$word);
}

}
//********************************************************************

//フォーカス表示モード　**********************************************

function focustopic($topicid){
//記事の読み込み
if(file_exists('topics.dat')){
$file = file_get_contents('topics.dat');
$lines = explode('<#d#>',$file);
}else{
syserror('ファイルエラー','ログファイルが開けませんでした');
exit;
}
$matchflg = 0;
for($i=0;$i<count($lines);$i++){
$element = explode('<#c#>',$lines[$i]);
if($element[3] == $topicid){
$date = html_entity_decode($element[0]);
$title = html_entity_decode($element[1]);
$comment = html_entity_decode($element[2]);
$imgurl = $element[4];
$rayout = $element[5];
$matchflg = 1;
}
}
//テンプレートの読み込み
$temp = file_get_contents("template.html");

//キーワード検索窓
$tag = create_search_tags($word);

if($matchflg != 1){
$tag = '<p>記事が見つかりません</p>';
}else{
$disp_title = $title;
$disp_date = $date;
$disp_comments = explode('<#e#>',$comment);
$disp_images = explode('<#e#>',$imgurl);

for($j=0;$j<count($disp_images);$j++){
if($disp_images[$j] != "" && file_exists($disp_images[$j])){
global $imgwidth;
global $is_pict_zoom;
list($w,$h,$tp,$at) = getimagesize($disp_images[$j]);
if($w < $imgwidth){
	if($is_pict_zoom){
	$disp_image[] = '<a href="'.str_replace('cms_images/','cms_images/org_',$disp_images[$j]).'" target="_blank"><img src="'.$disp_images[$j].'" alt="イメージ"></a>';
	}else{
	$disp_image[] = '<img src="'.$disp_images[$j].'" alt="イメージ">';
	}
}else{
$zoomrate = $imgwidth/$w;
$tempwidth = $w*$zoomrate;
$tempheight = $h*$zoomrate;
	if($is_pict_zoom){
	$disp_image[] = '<a href="'.str_replace('cms_images/','cms_images/org_',$disp_images[$j]).'" target="_blank"><img src="'.$disp_images[$j].'" alt="イメージ" width="'.$tempwidth.'" height="'.$tempheight.'"></a>
';
	}else{
	$disp_image[] = '<img src="'.$disp_images[$j].'" alt="イメージ" width="'.$tempwidth.'" height="'.$tempheight.'">
';
	}
}
}else{
$disp_image[] = '';
}
}
for($j=0;$j<count($disp_comments);$j++){
$disp_comment[] = str_replace("\r\n","<br>",$disp_comments[$j]);
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
$tag .= $sub_tags;
}

$tag .= '<p align="center" style="margin:40px auto 20px auto;"><a href="'.basename($_SERVER['SCRIPT_NAME']).'">全ての記事を見る</a></p>
';

//テンプレートの変数置換
$temp = str_replace('{$bbs-contents}',$tag,$temp);
dispout($temp);
}

//********************************************************************

//テンプレート出力サブルーチン　****************************
function dispout($html){
//HEADタグの情報を抽出
$ptn = "<head>.*<\/head>";
eregi($ptn,$html,$head);
//TITLEタグの抽出
$ptn = "<title>.*<\/title>";
eregi($ptn,$head[0],$title);
//ドキュタイプ、メタのcharsetをutf-8に強制置換
$ptn = "shift_jis";
$head_after = eregi_replace($ptn,"utf-8",$head[0]);
$ptn = "EUC-JP";
$head_after = eregi_replace($ptn,"utf-8",$head_after);
//タイトルタグを初期状態に書き戻し
$ptn = "<title>.*<\/title>";
$head_after = eregi_replace($ptn,$title[0],$head_after);
//HEADタグ情報の置換
$ptn = "<head>.*<\/head>";
$html = eregi_replace($ptn,$head_after,$html);
header ("Content-Type: text/html; charset=utf-8");
echo $html;
exit;
}
//**********************************************************

//検索窓生成ファンクション　********************************

function create_search_tags($word){
$tags = '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search_win">
<tr>
<td align="right"><form name="form1" action="'.basename($_SERVER['SCRIPT_NAME']).'" method="get">
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

?>
