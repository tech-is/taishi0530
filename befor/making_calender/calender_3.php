<?php
    // HTNL宣言読み込み
    include("header_calender.php");
    // CSV読み込み
    function get_holidays()
    {
        $file = file_get_contents("./syukujitsu.csv");
        // 文字化け対策
        $file = mb_convert_encoding($file, 'UTF-8','sjis-win');
        // 改行で分割
        $i = explode("\n",$file);
        $ret = array();
        // keyに年月日が入り、valueに祝日名がはいる
        foreach($i as $key => $value) {
            if($key == 0) {
                continue;
            }
            if($value == "") {
                continue;
            }
            $line = explode(",", $value);
            $ret[$line[0]] = $line[1];
        } 
        return $ret;
    }
    $holidays = get_holidays();
?>
<div class="header">
    <?php
        // 昨年、来年ボタンを押されたときの処理
        if(isset(($_GET['back_year']))) {
            $year = $_GET['back_year'] -1;
        }elseif(isset($_GET['next_year'])){
            $year = $_GET['next_year'] +1;
        }else{
            $year = date('Y');
        }
    ?>
    <h1>
        <?=$year?>
    </h1>

    <!-- valueが送られる -->
    <form action="calender_3.php" method="get">
        <button type="submit"  name="back_year" value="<?= $year ?>" class="btn btn-link">前年＜＜</button>
        <button type="submit"  name="next_year" value="<?= $year ?>" class="btn btn-link">翌年＞＞</button>
    </form>
<table  class = "table table-bordered">
    <thead>
        <tr>
            <?php
                for($m=1;$m<=12;$m++){
                    if(isset(($_GET['back_month']))) {
                            $month = $_GET['back_month'] -1;
                    }elseif(isset($_GET['next_month'])) {
                            $month = $_GET['next_month'] +1;
                    }else{
                            $month = date("n");
                    }
                }?>    
                    <h3><?php echo  $month; ?></h3>

                        <form action="calender_3.php" method="get">
                            <button type="submit" name="back_month" value="<?= $month?>" class="btn btn-link">前月＜＜</button>
                            <button type="submit" name="next_month" value="<?= $month?>" class="btn btn-link">翌月＞＞</button>
                        </form>                      
        </tr>  
    </thead>  
</div>
    <tr class="week">
        <th class = "red">日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th class = "blue">土</th>
    </tr>
    <tbody>
        <?php
            $day_start = mktime(0,0,0,$month,1,$year);
            $day_end_timestamp = mktime(0,0,0,($month+1),0,$year);
            $day_end = date("d",$day_end_timestamp);
            for($day=1;$day<=$day_end;$day++) {
                if($day === 1) {
                    echo "<tr>";
                    $week = date("w",$day_start);
                    for ($w=0;$w<$week;$w++){
                        // 空白のところの色を入れる
                        if($w == 0){
                            echo "<td class='red'></td>";
                        }elseif($w == 6){
                            echo "<td class='blue'></td>";

                        }else{
                            echo "<td></td>";
                        }
                        
                    }
                }
                $key = $year."/".$month."/".$day;
                // echo $holidays[$key];
                // 一度内容をなくしておかないと、一つの月に
                $holiday_name = "";
                // $holidaysに祝祭日のデータ、$keyにカレンダーのデータ
                if(isset($holidays[$key])){
                    $holiday_name = $holidays[$key];
                }
                //todayと土曜日と日曜日と祝日で色を変えれるようにする
                if($week == 0){
                    echo "<td class='red'>", $day ,"</td>"; 
                }elseif($week == 6){
                    echo "<td class='blue'>", $day ,"</td>";
                }elseif(isset($holidays[$key])){
                    echo "<td class='holidays'>", $day,"<br>",$holiday_name,"</td>";
                }elseif($day == date('j')){
                    echo "<td class='today'>",$day,"</td>";
                }else{
                    echo "<td>", $day ,"</td>";
                }
                // tdが6を超えたら改行する
                    $week ++;
                if(6 < $week) {
                
                    echo "</tr><tr>";
                    $week = 0;
                } 

            }                   
        ?> 
    </tbody>
</table>
<?php
    include("../HTML/footer.php");
?>