<?php
/*--------------------------------------*/
//ユーザー関数
/*--------------------------------------*/
require_once(PATH_SRC . DS . 'basic_func.php');
require_once(PATH_SRC . DS . 'class/Form.php');
require_once(PATH_SRC . DS . 'class/Validator.php');
$form = new Form;

/* 設定漏れのチェック */
$config_error = $form->checkConfig($config, new Validator);

/*--------------------------------------*/
//ステータス判定
/*--------------------------------------*/
if (isset($sys_mode) && $sys_mode == 'error') {
  set_errors($sys_err_list);	//エラー時処理
  $config->message = '<span style="color:red">入力内容に誤りがあります。訂正して再度確認ボタンをクリックしてください。</span>';
}


/*--------------------------------------*/
//戻るボタン対策
/*--------------------------------------*/
if (isset($_SESSION['progress'])) {
  if ($_SESSION['progress'] == 'done') {
    $_SESSION = array();
  } else if ($_SESSION['progress'] == 'confirm') {
    if (!isset($sys_mode) || (isset($sys_mode) && $sys_mode != 'error')) {
      foreach($_SESSION as $key => $val) {
        $$key = $val;
      }
    }
  }
}

/*--------------------------------------*/
//フォーム書き戻し
/*--------------------------------------*/
$test = array();
for ($i = 0; $i < count($config->fields); $i++) {
  $field = $config->fields[$i];
  $key = 'field_'.$i;
  $val = '';
  if (isset($$key)) {
    $val = $$key;
  } else if (isset($field->options->value)) {
    $val = $field->options->value;
  }
  $field->options->value = $val;
  $test[] = $val;
}

/*--------------------------------------*/
//エラー処理
/*--------------------------------------*/
function set_errors($sys_err_list){
  foreach($sys_err_list as $errkey => $errval){
    global $$errkey;
    $$errkey = '<span style="color:red">'.$errval.'</span>';
  }
}
