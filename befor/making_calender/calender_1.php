<?php
include("../HTML/header_calender.php");

date_default_timezone_set('Asia/Tokyo');


$datetime = strtotime("Y-n-j");

$datetime_year = (int)date("Y");

$time = mktime(0,0,0,4,1,2019);
echo date('w',$time);

?>

<h1><?php echo $datetime_year."年"; ?></h1>

<?php

for($i=1;$i<=12;$i++){



$datetime_month = (int)date($i,$datetime);
?>

<h3><?php echo $datetime_month."月"; ?></h3>



    <table class = "table" border = "2" rules = "all">
    <tr>
    <th class="red">日</th> 
    <th>月</th> 
    <th>火</th>
    <th>水</th> 
    <th>木</th> 
    <th>金</th>
    <th class="blue">土</th>
    </tr>

    <?php
    $datestanp = mktime(0,0,0,$i,1,2019);
    $datestanp_2 = mktime(0,0,0,$i+1,0,2019);

    $day = date("j",$datestanp);
    $day_2 = date("j",$datestanp_2);

    echo "<td></td>";



    for($day; $day <= $day_2; $day++){
        

        if(($day % 7 ) == 0){

        echo "<tr></tr>";
        }
        // }elseif($day == 01){

        //     $day=1;
            
        // }?>


        <td><?php echo $day; ?></td> 
        
    <?php } ?>


    <td></td>
    <td></td>
    <td></td>
    

    </table>

<?php } ?>
