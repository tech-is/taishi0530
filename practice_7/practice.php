<?php

//ペアプロ
$eof = <<< EOF
あいうえお
かきくけこ
さしすせそ
EOF;

echo $eof;

echo  'いらっしゃいませ';


//繰り返し系
//phpで１～100を関数で出力してください
for($count = 1; $count <= 100; $count++){
    if($count % 10 == 0){
        echo $count."<br>";
    }else{
        echo $count." ";
    }
}

//「phpで１～100を関数で出力しよう」を10でおわらせてください
for($count = 1; $count <= 10; $count++){
    echo $count."\n";
}
echo "<hr>";

//「phpで１～100を関数で出力しよう」を10だけとばしてください
for($count = 1; $count <= 100; $count++){

    if($count == 10){
        echo " ";
    }else{
        echo $count."\n";
    }
}
echo "<hr>";

//「phpで１～100を関数で出力しよう」を3・15・16・55だけとばしてください
for($count = 1; $count <= 100; $count++){
    if($count == 3){
        echo " ";
    }elseif($count == 15){
        echo " ";
    }elseif($count == 16){
        echo " ";
    }elseif($count == 55){
        echo " ";
    }else{
        echo $count."\n";
    }
}
echo "<hr>";

//「phpで１～100を関数で出力しよう」を偶数だけ表示させてください
for($count = 1; $count <= 100; $count++){
    if($count % 2 ==  0){
       echo $count; 
    }else{
        echo " ";
    }
}
echo "<hr>";

//掛け算の九九を繰り返し文で表示させてください
for($y = 1; $y <= 9; $y++){
    for($x = 1; $x <= 9; $x++){
   
        echo $x*$y."\n";
   
    }
echo "<br>";
}
echo "<hr>";

//1から100を順番に足していくプログラムを作って表示させてください。
$y = 0;
for($x = 1; $x <= 100; $x++){
    $y = $y + $x;
   
    echo $y."\n";
}

echo "<hr>";

//関数マスターへの道
function  i(){
    echo "あいうえお";
}
i();

echo "<hr>";

// 面積　
function common($hankei){
        $i = $hankei * $hankei * 3.14;
        return $i;
}
echo common(3)."<br>";
echo common(6);
echo "<hr>";

// メールアドレスの@マークの前の文字列だけ取得する関数を作ってください
$addres = "example@docomo.ne.jp";
echo mb_substr($addres,0,7);
echo "<br><hr>";

// 「すき家の牛丼」この文字列を関数で「吉野家の牛丼」に置換してください
$food = "すき家の牛丼";
echo str_replace("すき家", "吉野家",$food);
echo "<br><hr>";

// 「すき家の牛丼」この文字列の文字数を関数で表示してください
$food = "すき家の牛丼";
echo mb_strlen($food);
echo "<br><hr>";

//これを配列に格納して表示させてください 

$animal = array(
                "ディープインパクト"=>
                   array("父"=>"サンデーサイレンス",
                        "母"=>"ウインドインハーヘア"
                        ),
                "ディープインパクト"=>
                array("父"=>"サンデーサイレンス",
                        "母"=>"ウインドインハーヘア"
                        ),
                "ディープインパクト"=>
                array("父"=>"サンデーサイレンス",
                        "母"=>"ウインドインハーヘア"
                    )               
);
print_r($animal);

echo "<br><hr>";

//復習
//phpで１～100を関数で出力してください
for ($i = 1; $i <= 100 ; $i ++){
    echo $i. " ";
    if ($i % 10 == 0){
        echo "<br>";
    }
}

echo "<br><hr>";

//「phpで１～100を関数で出力しよう」を10でおわらせてください
for ($i = 1; $i <= 10 ; $i ++){
    echo $i. " ";
}

echo "<br><hr>";

//「phpで１～100を関数で出力しよう」を10だけとばしてください
for ($i = 1; $i <= 100 ; $i ++){
    if ($i == 10){
        echo " ";
    }else{
        echo $i;
    }
}

echo "<br><hr>";

//「phpで１～100を関数で出力しよう」を3・15・16・55だけとばしてください
for ($i = 1 ; $i <= 100 ; $i ++){
    if ($i == 3){
        echo " ";
    }elseif($i == 15){
        echo " ";
    }elseif($i == 16){
        echo " ";
    }elseif($i == 55){
        echo " ";
    }else{
        echo $i."\n";
    }
}

echo "<br><hr>";

//「phpで１～100を関数で出力しよう」を偶数だけ表示させてください
for ($i = 1 ; $i <= 100 ; $i++ ){
    if($i % 2 == 0){
        echo $i,"\n";
    }
}

echo "<br><hr>";

//掛け算の九九を繰り返し文で表示させてください
for ($x = 1 ; $x <= 9 ; $x++){
     for ($y = 1 ; $y <= 9 ; $y++){
        echo $x*$y,"\n";
     }
}

echo "<br><hr>";

//1から100を順番に足していくプログラムを作って表示させてください。
$y=0;
for ($x = 1; $x <= 100; $x++){
    $y = $y + $x ;
    echo $y,"\n";
}

echo "<br><hr>";

//メールアドレスの@マークの前の文字列だけ取得する関数を作ってください
$addres = "examplue@ohmoto.taishi";
echo substr ($addres, 0 , 8);

echo "<br><hr>";

//「すき家の牛丼」この文字列を関数で「吉野家の牛丼」に置換してください
$food = "すき家の牛丼";
echo str_replace ("すき家","吉野家",$food);

echo "<br><hr>";

// //「すき家の牛丼」この文字列の文字数を関数で表示してください
// $food = "すき家の牛丼";
// echo md_strlen($food);

// echo "<br><hr>";



?>　

　　　