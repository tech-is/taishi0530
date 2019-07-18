<?php
$sql = null;
$res = null;
$dbh = null;

try{
    $dbh = new PDO("mysql:host=localhost;dbname=new_kadai;charset=utf8","root","");
    
    echo "接続完了"."<br>";

    $sql = "SELECT*FROM member";

    $res = $dbh->query($sql);

    foreach($res as $value){

            for($i=0;$i<12;$i++){

                echo $value[$i].","."<br>";
            }
                echo "<hr>";
    }
    
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
$dbh = null;

