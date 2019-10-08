<?php
include("../html/header.php");
require("phpQuery-onefile.php");

$html = file_get_contents("https://www.jma.go.jp/jp/yoho/341.html");

echo phpQuery::newDocument($html) -> find(".temp");




