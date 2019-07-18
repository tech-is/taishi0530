<?php
// date_default_timezone_set('Asia/Tokyo');

// // タイムスタンプを取得
// $timestamp = time();

// echo date($timestamp);
echo "<br>";
echo date("Y-m-d H:i:s");
echo "<br>";
echo time();

$latitude = 35.693474;

// 経度
$longitude = 139.749889;

// 夏至の日付からタイムスタンプを取得
$date = strtotime('2019-06-21');

echo '日の出時刻：'.date_sunrise( $date, SUNFUNCS_RET_STRING, $latitude, $longitude);

echo "<br>";

$birthday = strtotime("2000-4-1");

$birth_year = (int)date("Y");
$birth_month = (int)date("m",$birthday);
$birth_day = (int)date("d",$birthday);

echo $birth_year,"\n"; 
echo $birth_month,"\n"; 
echo $birth_day ;

$date = null ;
echo "<br>";


//生年月日から現在の年齢を計算する
$birthday = strtotime("1993-11-24");

$birthday_year = (int)date("Y", $birthday);
$birthday_month = (int)date("m", $birthday);
$birthday_day = (int)date("d", $birthday);

$now_year = (int)date("Y");
$now_month = (int)date("m");
$now_day = (int)date("d");

$age = $now_year - $birthday_year  ;

if($birthday_month === $now_month){
    if($birthday_day > $now_day)
     $age--;
}

if($birthday_month > $now_month){
     $age--;
}

echo "ぼくは{$age}才です";


echo date("Y-m-d H:i:s");
echo "<br>";

$timestanp = mktime(0,0,0,3,3,2018);
echo date("Y年m月d日",$timestanp),"は";

switch(date("w",$timestanp)){
    
    case 0;
    echo "日曜日";
    break;

    case 1;
    echo "月曜日";
    break;

    case 2;
    echo "火曜日";
    break;

    case 3;
    echo "水曜日";
    break;

    case 4;
    echo "木曜日";
    break;

    case 5;
    echo "金曜日";
    break;

    case 6;
    echo "土曜日";
    break;

}

$timestamp = strtotime("2019-01-01 12:00:00");

// 2つ目の時刻
$timestamp2 = strtotime("2019-01-10 12:00:00");

// 2つの時刻の差を計算
echo ($timestamp2 - $timestamp)/60/60/24;
echo "<br>";
date_default_timezone_set('Asia/Tokyo');
?>
<h1>日本/東京：時刻</h1>
<h2><?php echo date("y-m-d h:i:s"); ?></h2>

<?php
$datestanp = mktime(0,0,0,4,1,2000);
$datestanp2 = mktime(0,0,0,5,0,2000);

 $i = date("d",$datestanp);
 $i2 = date("d",$datestanp2);


for($i; $i <= $i2; $i++){
    if($i == 01){
        echo $i = 1,"日","\n";
    }else{
echo $i."日","\n";
}
}
?>
<p></p>
<?php
date_default_timezone_set("Asia/Tokyo");
?>
<p><?php echo "誕生日計算";?></p>

<?php

$now_time = date("Y-m-d");
echo $now_time;

echo "<br>";

$birthday = strtotime("1998-8-30");
$birthday_time = date("Y-m-d",$birthday);
echo $birthday_time;

$now_time_Y = (int)date("Y");
$now_time_m = (int)date("m");
$now_time_d = (int)date("d");

$birthday_time_Y = (int)date("Y", $birthday);
$birthday_time_m = (int)date("m", $birthday);
$birthday_time_d = (int)date("d", $birthday);

$answer = $now_time_Y - $birthday_time_Y;

if($now_time_m === $birthday_time_m){
    if($now_time_d < $birthday_time_d){
        $answer--;
    }
}

if($now_time_m < $birthday_time_m){
        $answer--;
}
echo "<br>";
echo $answer;

?>
<p>西暦から和暦へ</p>

<?php
$year = 1998;
$month = "05";
$day = 30;

$birthday = null;
$date = (int)($year.$month.$day);
echo $date;
if(18680125 <= $date && $date <= 19120729){
    $meiji = ($year - 1868)+1;
    if($meiji == 1){
        echo "明治元年";
    }else{
        echo "明治".$meiji."年";
    }
}elseif(19120730 <= $date && $date <= 19261214){
    $taisho = ($year - 1912)+1;
    if($taisho == 1){
        echo "大正元年";
    }else{
        echo "大正".$taisho."年";
    }
}elseif(19261215 <= $date && $date <= 19890107){
    $showa = ($year - 1926)+1;
    if($showa == 1){
        echo "昭和元年";
    }else{
        echo "昭和".$showa."年";
    }    
}elseif(19890108 <= $date && $date <= 20190530){
        $heisei = ($year - 1989)+1;
        if($heisei == 1){
            echo "平成元年";
        }else{
            echo "平成".$heisei."年";
        }
}else{$reiwa = ($year - 2019)+1;
        if($reiwa == 1){
            echo "令和元年";
        }else{
            echo "令和".$reiwa."年";
        }

    }
