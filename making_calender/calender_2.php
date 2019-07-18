<?php
$year = 2019;
$timestamp = strtotime("{$year}-01-01");
//echo $timestamp;
?>

<?php for($day=1;$day<=12;$day++){ ?>
    <table border = "1" >    
        <caption> <?php echo $day ?></caption>
        <thead>
            <tr>
            　<th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th>  
            </tr>
        </thead>
        <tbody>
            <?php $day_start = mktime(0,0,0,$day,1,$year);
                  $day_end_timestamp = mktime(0,0,0,($day+1),0,$year);
                  $day_end = date("d",$day_end_timestamp);
                  
                  for($i=1;$i<=$day_end;$i++){
                    if($i===1){
                        echo '<tr>';
                        $weekday = date("w",$day_start);
                         echo $weekday;
                        for($w=0;$w<$weekday;$w++){
                            echo "<td></td>";
                        }
                    }
                    echo '<td>'.$i.'</td>';
                    $weekday++;
                                
                    if( 6 < $weekday ) {
                        echo '</tr><tr>';
                        $weekday = 0;
                    }
                }?>
        
	    </tbody>
</table>
                    
                   
                   
                   
                   

        </tbody>    


<?php } ?>



　　</table>