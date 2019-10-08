<?php
$taboo = "ぽあちんこ";

function Check_data($taboo)
{
    //NGワードのCSVを取得する
    $result = false;
    $file = file_get_contents("ngword.csv");
    $file = mb_convert_encoding($file, 'UTF-8','sjis-win');
    $file = trim($file);
    //配列に入れる
    $array = explode("\r\n",$file);
    //  print_r($array);
    foreach($array as $key => $value){
        if($key == 0){
            continue;
        }
        // echo $value;
    
        //ここでそのNGワードが引数に存在するか検索
        if(strpos($taboo,$value) !== false){
            $result = true;
        }
    }
    return $result;
}

Check_data($taboo);

if(Check_data($taboo) == true) {
    echo "NGワードあり";
}else{
    echo "NGワードなし";
}



// echo $hoge;
// $i = check_data($taboo);
// echo $i;