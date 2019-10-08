<?php

//文字列1
$str = 'my dog is very pretty. dog is really cute.';
if(preg_match('/dog/',$str)){
    echo 'true';
}else{
    echo 'false';
}

echo "<br>";

//文字列2
$str = "This is ＣＡＴ.";
$str = mb_convert_kana($str, "r", 'UTF-8' );
echo $str;
echo "<br>";
if(preg_match("/dog/" , $str)){
    echo "true";
}else{
    echo "false";
}

echo "<br>";

//文字列3
$str1 = "This is test string."; $str2 = "これはテスト用の文字列です。";
echo strlen($str1);
echo "<br>";
echo strlen($str2);

echo "<br>";

//文字列4
$str = "3.14149265461841";
echo mb_substr($str, 0 , 4);

echo "<br>";

//文字列5
$str = "[NAME]様 いつもご利用ありがとうございます。";
// の[NAME]を植松に変える。
echo str_replace("[NAME]", "植松", $str);

echo "<br>";

//課題：自作関数＆スクレイピング echo maxkion(); とすると愛媛の今日の最高気温を出す

