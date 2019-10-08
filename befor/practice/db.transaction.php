<?php
$sql = null;
$res = null;
$dbh = null;

try{
    $dbh = new PDO("mysql:host=localhost;dbname=customer;charset=utf8","root","");
    echo "接続完了"."<br>";
    //エラーの表示
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $dbh->beginTransaction();

    for($i=1;$i<=1000;$i++){
        $sql = "INSERT INTO manegiment(user_id,customer_name,customer_kana,tel,zip_adress,aderss,mail,magazine,created_at,updated_at,state)
                            values($i,'morimori','オオモリ','09045689','5457','ozaki@98765','wtrr@ertyuif','1','2019-3-30 14:00','2019-8-09 15:00','1')";
        echo $sql;


        $res = $dbh->query($sql);

        sleep(1);
    }
    try {
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        //コミット
        $dbh->commit();
    } catch(PDOException $e) {
            //ロールバック
        $dbh->rollback();
        throw $e;
    }
} catch(PDOException $e) {
    echo $e -> getMessage();
    die();

}

$dbh = null;
