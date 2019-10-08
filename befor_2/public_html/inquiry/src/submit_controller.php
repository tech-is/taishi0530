<?php
/*--------------------------------------*/
//設定
/*--------------------------------------*/
require_once('basic_func.php');

//エンコード設定
ini_set("default_charset","UTF-8");
mb_language("uni");

//完了画面表示設定
$message = '送信が完了しました。ご利用ありがとうございました。<br /><br /><a href="./">フォームへ戻る</a>';
if ($_SESSION['progress'] == 'done') {
  $message = '送信はすでに完了しております。再度ご利用いただくには一旦トップページにお戻りください。<br /><br /><a href="./">トップページへ</a>';
}

/*--------------------------------------*/
//POST処理
/*--------------------------------------*/

// 確認メールの送信先
$confirm_mailto = '';

if ($_SESSION['progress'] != 'done') {
  for ($i = 0; $i < count($config->fields); $i++) {
    $field = $config->fields[$i];
    $key = 'field_' . $i;
    if (!isset($_SESSION[$key])) {
      continue;
    }
    $val = $_SESSION[$key];

    if ($field->type == 'email') {
      $confirm_mailto = $val;
    }

    if (is_array($val)) { // 複数回答を文字列データに直す
      $val_tmp = '';
      foreach($val as $val2){
        $val_tmp .= $val2.'　';
      }
      $val = $val_tmp;
    }

    $sys_senddata[$field->label] = unhtmlentities($val);
  }
}
/*if(count($_SESSION) > 1){echo "true";}else{echo "false";}
echo count($_SESSION);exit;*/

/*--------------------------------------*/
//メール送信
/*--------------------------------------*/
if (($_SESSION['progress'] != 'done') && (count($_SESSION) > 1)) {
  //送信時間・IPアドレスを取得
  $sys_date = date('Y/m/d D G:i');
  $sys_ip = getenv("REMOTE_ADDR");
  $headername = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($config->sender,"JIS","UTF-8"))."?=";
  $header = 'From: "'.$headername.'" < '.$config->mailfrom.' >';

  //メールテンプレート読込み・置換
  $body = file_get_contents(PATH_SRC . DS . 'mail_tmp.txt');
  $body2 = file_get_contents(PATH_SRC . DS . 'mail_tmp2.txt');
  foreach ($sys_senddata as $key => $val) {
    $values[] = '■' . strip_tags($key) . "\n" . $val;
  }
  $values = implode("\n\n", $values);
  $body = str_replace('{$values}', $values, $body);
  $body = str_replace(
    array('{$sender}', '{$sys_date}', '{$sys_ip}'),
    array($config->sender, $sys_date, $sys_ip),
    $body
  );
  $body2 = str_replace('{$values}', $values, $body2);
  $body2 = str_replace('{$sender}', $config->sender, $body2);

  //POSTされなかった変数の削除
  $body = preg_replace('/{\$.*?}/','',$body);
  $body2 = preg_replace('/{\$.*?}/','',$body2);
  //環境により文字化けが生じる場合はbase64エンコード
  //$body = base64_encode($body);
  //サーバー環境により、成功時にtrueが戻らないため、フラグの初期値trueをtrueに
  $result1 = true;
  $result2 = true;
  $result1 = mb_send_mail($config->mailto, $config->subject, $body, $header);
  sleep(1);
  $result2 = mb_send_mail($confirm_mailto, $config->subject2, $body2, $header);
}

/*-----------------------------*/
//送信エラー
/*-----------------------------*/
/*if($_SESSION['progress'] != 'done'){
if($result1 != false){
$message = '何らかの原因によりメールの送信に失敗しました。<br />少し時間をおいて最初から操作を行ってください。（ブラウザの「戻る」ボタンは使用しないでください。<br /><br /><a href="index.php">フォームへ戻る</a>';
}
}*/
if(count($_SESSION) <= 1){
  $message = '有効なセッションが確認できませんでした。<br />トップページへ戻り最初から操作を行ってください。（ブラウザの「戻る」ボタンは使用しないでください。）<br /><br /><a href="./">トップへ戻る</a>';
}

/*--------------------------------------*/
//セッション初期化・progress更新
/*--------------------------------------*/
if ($_SESSION['progress'] != 'done'){
  $_SESSION = array();
  $_SESSION['progress'] = 'done';
}

?>