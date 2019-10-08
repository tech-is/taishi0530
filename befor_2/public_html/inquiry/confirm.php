<?php

require_once 'src/config.php';
session_start();

require_once PATH_SRC . DS . 'confirm_controller.php';
if (isset($sys_mode) && $sys_mode == 'error') {
  require_once PATH_SRC . DS . 'index_controller.php';
}

include PATH_VIEW . DS . 'header.php';
if (isset($sys_mode) && $sys_mode == 'error') {
  include PATH_VIEW . DS . 'form.php';
} else {
  include PATH_VIEW . DS . 'confirm.php';
}
include PATH_VIEW . DS . 'footer.php';