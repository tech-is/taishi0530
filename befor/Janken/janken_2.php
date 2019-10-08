<?php
include("../HTML/header_janken.php");
?>
<div class="header">

    <h1>ゆるグラミング講座</h1>

</div>

<div class="main">

    <h3>結果は…</h3>

    <?php 

        $bot=rand(0,2);
    
    ?>

    <p><?php if($_POST['janken'] == 0 && $bot == 1 || $_POST['janken'] == 1 && $bot == 2 || $_POST['janken'] == 2 && $bot == 0){

           ?> <p class="lose"> 負け </p> <?php

        }elseif($_POST['janken'] == 0 && $bot == 0 || $_POST['janken'] == 1 && $bot == 1 || $_POST['janken'] == 2 && $bot == 2){

           ?> <p class="win"> 勝ち </p> <?php

        }else{

           ?> <p class="even"> あいこ </p> <?php

        }?></p>  

    <?php

        if($_POST['janken'] == 0){
            echo "あなたはグー！";
        }elseif($_POST['janken'] == 1){
            echo "あなたはチョキ！";
        }else{  
            echo "あなたはパー！";
        }    

        echo "<br>";

        if($bot == 0){
            echo "ロボットはチョキ！";
        }elseif($bot == 1){
            echo "ロボットはパー！";
        }else{
            echo "ロボットはグー！";
        }

    ?>
</div>

    <p class="btn"><a href = "janken_1.php">>>>>もう一度勝負する！！</p>

<div class="footer">
</div>    
<?php


    include("../HTML/footer.php");

?>