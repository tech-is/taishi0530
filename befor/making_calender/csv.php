<?php
setlocale(LC_ALL, 'ja_JP.UTF-8');
function get_holidays()
{
    $file = file_get_contents("./syukujitsu.csv");
    $file = mb_convert_encoding($file, 'UTF-8','sjis-win');
    $i = explode("\n",$file);
    $ret = array();
    foreach($i as $key => $value){
        if($key == 0){
            continue;
        }
        if($value == ""){
            continue;
        }
        $line = explode(",",$value);
        // print_r($line);
        $ret[$line[0]] = $line[1];
    } 
    return $ret;
}




// print_r($i);
$holidays = get_holidays();
print_r($holidays);

// $i = array_shift($i);
// print_r($i);
// foreach($i as $value){
        // $array = explode(",",$value);
        //   print_r($array);
        // $array = str_replace("/","",$array);
        // print_r($array);
        // echo $array[0];
        // print_r($key);
        // echo $array[1];
         
    // }
// for($i=1; $i<=90;$i++){
// $time = date("Y-n-j",$key);
// echo $time;
// }

// $syukujitsu = array($key => $values);

// print_r($syukujitu);

    //  for()
//for($i=1; $i <=929;$i++){
    
// $file = explode(",",$file);
    // print_r($file);
//}

// var_dump( strstr($file, ',') );


// $file = explode("\n",$file);
// print_r($file);
//  print_r($file);

// foreach($file as $value){
//            echo $value;
// }




         // if($key%2 == 0 || $key == 0){
        //     echo $value;
        // }
    

// explodeで分割して配列に入れる
// $array = explode("\n",$file);
// mb_convert_variables($array);
// print_r($array);
// $valueだけを取り出す
// foreach($array as $value){
//     mb_convert_encoding($value);
//     echo $value;
// }


// print_r($array);




// $row = 1;
// // ファイルが存在しているかチェックする
// if (($handle = fopen("syukujitsu.csv", "r")) !== FALSE) {
//     // 1行ずつfgetcsv()関数を使って読み込む
//     while (($data = fgetcsv($handle))) {
//         echo "${row}行目\n";
//         $row++;
//         foreach ($data as $value) {
//             echo "「${value}」\n";
//         }
//     }
//     fclose($handle);
// }
