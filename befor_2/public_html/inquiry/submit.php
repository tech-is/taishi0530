<?php

require_once 'src/config.php';
session_start();

require_once PATH_SRC . DS . 'submit_controller.php';

include PATH_VIEW . DS . 'header.php';
include PATH_VIEW . DS . 'submit.php';
include PATH_VIEW . DS . 'footer.php';