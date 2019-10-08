<?php
    // sessionスタート
    session_start();
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
        header('Location:../bulletin_board/bulletin_board.php');
        exit;   
    }
    // HTML宣言
    include("header_login.php");    
?>
<!-- 未入力だった場合の処理 -->
<script type = "text/javascript">
    // 未入力がある場合エラーメッセージを表示
    function check_value()
    {
        // メアドが未入力の場合 
        if(document.getElementById('mail').value == ""){
            document.getElementById('error_mail').innerHTML = 'メアドを入力してください';
            error = true;
        }
        // パスワードが未入力の場合
        if(document.getElementById('password').value == ""){
            document.getElementById('error_password').innerHTML = 'パスワードを入力してください';
            error = true;
        }
        return ! error;
    }
</script>
<h1>ログインページ</h1>
<form method = "post" action = "" name = "login" OnSubmit = "return check_value()">
    メールアドレス<br>
    <input type = "text" name = "mail" id = "mail"><br>
    <div id = "error_mail" style = "color:red"></div><br>
    パスワード<br>
    <input type = "text" name = "password" id = "password" ><br>
    <div id = "error_password" style = "color:red"></div><br>
    <input type = "submit" name = "check" value = "ログイン"><br><br>
    <a href = "new_registration.php" >新規登録はこちら<a>
</form>   
<?php
    // 入力されている場合
    if(isset($_POST['check'])){
        if(isset($_POST['mail']) && isset($_POST['password'])) {
            try
            {
                $dbh = new PDO("mysql:host=localhost;dbname=login;charset=utf8","root","");
                // DBから取り出し
                $sql = "SELECT mail_addres FROM member where mail_addres = '{$_POST['mail']}' ";
                $stmt = $dbh -> query($sql);
                $rows = $stmt -> fetch();
                // print_r($rows);
                if($rows['mail_addres'] == $_POST['mail']){
                    header('Location:../bulletin_board/bulletin_board.php');
                    exit;
                }else{
                    echo "<br>","入力に誤りがあります","<br>","やり直してください";
                }
            }
            catch(PDOException $e)
            {
                echo $e -> getMessage();
                die();
            }
        }
    }
    ?>

