<?php
include("../HTML/header_calender.php");
$year = 2019;
$timestamp = date("$year-1-1");
?>
<h1><?=$year?></h1>
<?php
for($i=1;$i<=12;$i++) { ?>
    <table rules = "all" class = "table">
        <thead >
            <tr>
                <h3><?= $i ?></h3>
            </tr>    
        </thead>
            <tr>
                <td>日</td><td>月</td><td>火</td><td>水</td><td>木</td><td>金</td><td>土</td>
            </tr>
        <tbody>
            <?php
            $day_start = mktime(0,0,0,$i,1,$year);
            $day_end_timestamp = mktime(0,0,0,($i+1),0,$year);
            $day_end = date("d",$day_end_timestamp);
            for($day=1;$day<=$day_end;$day++) {
                if($day === 1) {
                    echo "<tr>";
                    $week = date("w",$day_start);
                    for ($w=0;$w<$week;$w++){
                        echo "<td></td>";
                    }
                }
                echo "<td>", $day ,"</td>";
                $week ++;
                if(6 < $week) {
                    echo "</tr><tr>";
                    $week = 0;
                }
            }
}?> 
        </tbody>
    </table>
