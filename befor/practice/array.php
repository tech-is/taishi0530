<?php
//配列１

$hose = array (
  'ディープインパクト' =>
        array('父：' => 'サンデーサイレンス',
              '母：' => 'ウインドインハ－ヘア'),
  'トウカイテイオー' =>
        array('父：' => 'シンボリルドルフ',
            '母：' => 'トウカイナチョラル'),         
  'スペシャルウィーク' =>
        array('父：' => 'サンデーサイレンス',
                '母：' => 'キャンペンガール'),   
  'スーパークリーク' =>
        array('父：' => 'ノーアテンション',
              '母：' => 'ナイスデイ'),   
  'メジロマックイーン' =>
        array('父：' => 'メジロティターン',
            '母：' => 'メジロオーロラ'),   
  'ダイユウサク' =>
        array('父：' => 'ノノアルコ',
              '母：' => 'クニノキヨコ'),             
);

print_r($hose);

//配列2

$add_hose = array (
    'トウカイテイオ' =>
        array('父：' => 'サンデーサイレンス',
              '母：' => 'トウカイナチュラル')
);

print_r(array_merge($hose, $add_hose));

//配列３

$add_hose =
    array('父：' => 'シンボリルドルフ',
          '母：' => 'ワキア');

$hose['サイレンススズカ'] = $add_hose;
print_r($hose);

//配列4

ksort($hose);
print_r($hose);

//配列5
echo "<br>","<hr>";
print_r(array_rand($hose, 5));

echo "<br>","<hr>";
//配列6
print_r($hose);
echo "<hr>";
echo $hose['ディープインパクト']['父：'];

//配列7
array_splice($hose, 2, 1);
print_r($hose);
echo"<br>","<hr>";

//配列8
foreach($hose as $key1 => $value1){
    echo $key1 . "<br>";
    echo "父：". $value1['父：'] . "<br>";
    echo "母：". $value1['母：'] . "<br>";;
}

//配列9

$text = array(
    "果物" => array("リンゴ","みかん","イチゴ","スイカ"),
    "野菜" => array("キャベツ","人参","大根","セロリ"),
    "炭水化物" => array("ごはん","パン","パスタ","")
    );

print_r($text);
echo "<br>","<hr>";
foreach($text as $key1 => $value1){
        echo "[".$key1."]";
        $rand = rand(0,3);
        echo $value1[$rand].","."<br>";
        
}

