<?php
/*--------------------------------------*/
//ユーザー関数
/*--------------------------------------*/
require_once(PATH_SRC . DS . 'basic_func.php');
require_once(PATH_SRC . DS . 'class/Validator.php');
$validator = new Validator;

/*--------------------------------------*/
//引数処理
/*--------------------------------------*/
//フォーム項目のセッション配列初期化
foreach ($_SESSION as $key => $val) {
  if (is_array($val)) {
    // unset($_SESSION[$key]);
  }
}

//POST⇒LOCAL / HIDDEN or SESSION
foreach ($_POST as $key => $val) {
  $_SESSION[$key] = $val;
  if (!isset($$key)) {
    $$key = $val;
  }
}

/*--------------------------------------*/
//エラーチェック
/*--------------------------------------*/
//エラーリストの初期化
if (isset($sys_err_list)) {
  unset($sys_err_list);
}
global $sys_err_list;

$compare = array();
for ($i = 0; $i < count($config->fields); $i++) {
  $field = $config->fields[$i];
  $key = 'field_' . $i;
  $val = isset($$key)? $$key : null;

  if (!empty($field->options->required) && empty($val) && $val !== '0') {
    if ($field->type == 'select' || $field->type == 'radio' || $field->type == 'checkbox') {
      $sys_err_list[$key.'_err'] = '選択してください。';
    } else {
      $sys_err_list[$key.'_err'] = '入力してください。';
    }
    continue;
  }
  if ($field->type == 'text' && !empty($field->options->max) && !$validator->chkMaxLength($val, $field->options->max)) {
    $sys_err_list[$key.'_err'] = $field->options->max . '字以内で入力してください。';
    continue;
  }
  if ($field->type == 'email' && !empty($val) && !$validator->chkEmail($val)) {
    $sys_err_list[$key.'_err'] = '正しく入力してください。';
    continue;
  }
  if ($field->type == 'tel' && !empty($val) && !$validator->chkPhoneNumber($val)) {
    $sys_err_list[$key.'_err'] = '正しく入力してください。';
    continue;
  }
  if (isset($field->options->compare)) {
    $cpkey = $field->options->compare;
    if (isset($compare[$cpkey])) {
      if ($compare[$cpkey] != $val) {
        $sys_err_list[$key.'_err'] = '正しく入力してください。';
        continue;
      }
    } else {
      $compare[$cpkey] = $val;
    }
  }
}

/*--------------------------------------*/
//progress更新
/*--------------------------------------*/
if(!isset($_SESSION['progress']) || $_SESSION['progress'] != 'done'){
  $_SESSION['progress'] = 'confirm';
}

/*--------------------------------------*/
//エラー出力
/*--------------------------------------*/
if ($sys_err_list != '') {
  $sys_mode = 'error';
}

?>