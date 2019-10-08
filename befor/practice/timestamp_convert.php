<?php
date_default_timezone_set('Asia/Tokyo');

$time_array = [
    "1425135600"=>[
        "time"=>"03:23:50"
    ],
    "1002898800"=>[
        "time"=>"21:43:21"
    ]
];    

/**
 * echo_time
 * @param $time_array = 時刻の配列
 * @return 年月日時刻、午前か午後を出力
 */
function echo_time($time_array)
{
    foreach($time_array as $timestamp => $date) {
        foreach($date as $value) {
            echo make_time($timestamp)." ".$value." ".judge_time($value)."です<br>";
        }
    }
}

/**
 * make_time
 * @param $timestamp = タイムスタンプ
 * @return タイムスタンプを年月日に変換
 */
function make_time($timestamp)
{
    return date('Y/m/d', $timestamp);
}

/**
 * judge_time
 * @param $value = foreachで取り出した時刻
 * @return $time = 午前or午後
 */
function judge_time($value)
{ 
    $value = intval(substr($value, 0, 2));
    if($value < 12){
        $time = "午前";
    }else{
        $time =  "午後";
    }
    return  $time;
}

echo_time($time_array);