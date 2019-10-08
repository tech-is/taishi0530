<?php
/*--------------------------------------*/
//ユーザー関数
/*--------------------------------------*/

//フォームデータのサニタイズ
function sanitize($str){
  if(is_array($str)){
    foreach($str as $val){
      $ret[] = str_replace('{$','{＄',$val);
    }
    return $ret;
  }else{
    $str = str_replace('{$','{＄',$str);
    return addslashes(htmlspecialchars($str));
  }
}

// 文字列の逆エンティティ変換
function unhtmlentities($array){
  $trans_tbl = get_html_translation_table (HTML_ENTITIES);
  $trans_tbl = array_flip ($trans_tbl);
  if(is_array($array)){
    for($i=0; $i<count($array); $i++){
      $array[$i] = strtr ($array[$i], $trans_tbl);
    }
  }else{
    $array = strtr ($array, $trans_tbl);
  }
  return $array;
}

//チェックボックスの選択チェック
function check_scan($sys_check_name,$sys_check_value){
  $sys_check_flg = false;
  if(is_array($_SESSION[$sys_check_name])){
    foreach($_SESSION[$sys_check_name] as $val){
      if($val == $sys_check_value){$sys_check_flg = true;}
    }
  }
  return $sys_check_flg;
}

//複数選択オブジェクトの出力
function disp_multi_val($sys_multipul_name){
  $sys_val_separater = '　';
  for($i=0;$i<count($_SESSION[$sys_multipul_name]);$i++){
    $sys_multipl_out .= $_SESSION[$sys_multipul_name][$i];
    if($i != (count($_SESSION[$sys_multipul_name])-1)){$sys_multipl_out .= $sys_val_separater;}
  }
  return $sys_multipl_out;
}

//CSVからデータセットを取得して2次配列で返す
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

/*-----------------------------------------------------------------------------------------*/
//ファイルロックファンクション
// 引数　　：lock(ロックするファイル名)
// 戻り値　：なし
/*-----------------------------------------------------------------------------------------*/
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
    if ($retry-- <= 0) { myerror();}
    sleep(1);
  }
}

/*-----------------------------------------------------------------------------------------*/
//ファイルロック解除ファンクション
// 引数　　：unlock(解除するファイル名)
// 戻り値　：なし
/*-----------------------------------------------------------------------------------------*/
function unlock($file) {
  $lockdir= "lock/";
  $lockfile= "$lockdir"."$file";
  if (file_exists($lockfile)) {rmdir($lockfile);} //ロック用ディレクトリを削除する
}
