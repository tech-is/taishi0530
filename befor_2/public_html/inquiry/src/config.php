<?php

// パス
define('DS', DIRECTORY_SEPARATOR);
define('FORM_ROOT', dirname(dirname(__FILE__)));
define('PATH_SRC', FORM_ROOT . DS . 'src');
define('PATH_LOCK', FORM_ROOT . DS . 'lock');
define('PATH_SESSION', FORM_ROOT . DS . 'private' . DS . 'session');
define('PATH_VIEW', FORM_ROOT . DS . 'view');

$config = json_decode(file_get_contents(PATH_SRC . DS . 'config.json'));

// セッションパス
session_save_path('private/session/');
