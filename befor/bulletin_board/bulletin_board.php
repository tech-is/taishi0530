<?php
    // HTMLの宣言
    include("header.php");

    // 時間を日本/東京に設定
    date_default_timezone_set('Asia/Tokyo');
    $time=date('Y-m-d H:i:s');
    
    // 削除ボタンを押したときの処理
    if(isset($_POST['delete'])) {
        //DB接続 
        $dbh = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");
        $delete_id = $_POST['delete'];
        // 削除したい投稿のdelete_flagを0から1にする
        $sql = "UPDATE bulletin_board SET delete_flag = 1 WHERE id = ". $delete_id;
        $res = $dbh->query($sql);
    }
?>
<!-- フロントの構造 -->
<header>
    <h1>一言掲示板</h1>
    <form method = "post" action = "bulletin_board.php">
        <p>表示名</p>
        <input type = "text" name = "name" class = "text">
        <p></p>
        <p>一言メッセージ</p>
        <textarea name = "message" class = "message"></textarea>
        <p></p>
        <input type = "submit" name = "btn" value = "投稿">
    </form>
    <hr class= line>
</header>
<?php
    //投稿ボタンを押したときの処理
    try
    {   
        // 表示名、一言メッセージが未入力の場合の処理
        if (isset($_POST['btn'])) {
            if(empty($_POST['message'])) {
            ?>
            <p class = "bad_message">未入力です<br>入力してください</p>
            <?php
            } elseif (empty($_POST['name'])){
            ?> <p class = "bad_message"><?= "未入力です","<br>","入力してください";?></p><?php
            } else {
            $dbh = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");
            
            // DBへ追加
            $stmt = $dbh -> prepare("INSERT INTO bulletin_board (name, message,time,delete_flag) VALUES (:name, :message, :time, :delete_flag)");
            $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $stmt->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
            $stmt->bindValue(':time', $time,);
            $stmt->bindValue(':delete_flag', 0,);
            $stmt->execute();
            }
        }
    } 
    catch(PDOException $e) 
    {
        echo $e -> getMessage();
        die();
    }

    $dbh = null;
?>

<?php
    try
    {
        // delete_flag = 0 の投稿を降順で表示する 
        $dbh = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");
        $sql = "SELECT id,name,message,time FROM bulletin_board WHERE delete_flag = 0 ORDER BY id DESC";
        // DBの内容を配列に入れる
        $rows = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // PRINT_R($rows);

        // 表示しているデータ数を5で割り小数点を切りあげ
        $ceil = count($rows);
        $i = ceil($ceil / 5);
        
        $thump = 5;
        // 最初の画面、ページネーション1の場合
        if(!isset($_GET['num'])  || $_GET['num'] == 1) {
            // 0~5件のデータを取ってくる
            $array = array_slice($rows,0,$thump,true);
            // DBのデータをforeachで回す
            foreach($array as $value) {
?>  
                <!-- 削除ボタンの生成 -->
                <form method = "post" action = "bulletin_board.php">
                    <button name = "delete" value = "<?=$value['id']; ?>" onclick="return check_delete()">削除</button>
                <input type = "hidden" name = "id" value = "<?=$value['id']; ?>">
<?php
                // DBからとってきた名前、投稿文、時間を表示する
                echo 
                "NO",$value['id'],"<br>",
                "表示名：",$value['name'] = htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'),"<br>",
                "メッセージ：",$value['message'] = htmlspecialchars($value['message'], ENT_QUOTES, 'UTF-8'),"<br>",
                "<br>",$value['time'],"<br><hr>";
            }

        }else{
            // その他ページネーションの処理
            $array = array_slice($rows,$_GET['num'] * $thump - 4,5);
            // DBのデータをforeachで回す
            foreach($array as $value) {
?>           
                <!-- 削除ボタンの生成 -->
                <form method = "post" action = "bulletin_board.php">
                <button name = "delete" value = "<?=$value['id']; ?>" onclick="return check_delete()">削除</button>
                <input type = "hidden" name = "id" value = "<?=$value['id']; ?>">
<?php  
                // DBからとってきた名前、投稿文、時間を表示する
                echo 
                "NO",$value['id'],"<br>",
                "表示名：",$value['name'] = htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'),"<br>",
                "メッセージ：",$value['message'] = htmlspecialchars($value['message'], ENT_QUOTES, 'UTF-8'),"<br>",
                "<br>",$value['time'],"<br><hr>";
            }    
        }
    } 
    catch(PDOException $e) 
    {
        echo $e -> getMessage();
        die();
    }

    $dbh = null;
?>

<div> 
    <?php
        // ページネーションの生成
        // データの数によってページネーションの数を変える
        for($num=1; $num<=$i ;$num++) {
            // ボタンを押したときGETで渡す
            ?>
            <a href="bulletin_board.php?num=<?=$num?>">[<?= $num ?>]</a>
            <?php
        }
    ?>
</div>
<?php
    // 二重投稿の対策
            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['message'] !== "" && $_POST['name'] !== ""){
                
                header('Location:http://befor.com/bulletin_board/bulletin_board.php');
            
            }

    
?>
<!-- 削除ボタンを押したときJSで確認画面を表示 -->
<script type="text/javascript">

    function check_delete(){

        // 「OK」時の処理開始 ＋ 確認ダイアログの表示
        if(window.confirm('本当にいいんですね？')){

            location.href = "example_confirm.html"; // example_confirm.html へジャンプ

        }
        // 「OK」時の処理終了

        // 「キャンセル」時の処理開始
        else{

            window.alert('キャンセルされました'); // 警告ダイアログを表示

        }
        // 「キャンセル」時の処理終了

    }

</script>