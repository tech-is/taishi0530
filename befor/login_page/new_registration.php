<?php
    // HTML宣言
    include("header_login.php");
    // sessionスタート
    session_start();
?>
<script type = "text/javascript">
    // 未入力がある場合エラーメッセージを表示
    function check_value()
    {
        var error = false;
        // 名前が未入力の場合
        if(document.getElementById('name').value == ""){
            document.getElementById('error_name').innerHTML = '名前を入力してください';
            error = true;
        }
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
<?php
    // 新規登録
    if(isset($_POST['check'])) {
        if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['password'])) {
            try
            {
                $dbh = new PDO("mysql:host=localhost;dbname=login;charset=utf8","root","");
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // DBへ追加
                // パスワードをハッシュ化
                $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt = $dbh -> prepare("INSERT INTO member (name,mail_addres,password) VALUES (:name,:mail_addres,:password)");
                $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
                $stmt->bindValue(':mail_addres', $_POST['mail'], PDO::PARAM_STR);
                $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
                $stmt->execute();
                header('Location:new_registration_success.php');
            }
            catch(PDOException $e)
            {
                echo $e -> getMessage();
                die();
            }
        }
    }        
?>
<h1>新規登録ページ</h1>
<form method = "post" action = "" name = "login" OnSubmit = "return check_value()">
    名前<br>
    <input type = "text" name = "name" id = "name"><br>
    <div id = "error_name" style = "color:red"></div><br>
    メールアドレス<br>
    <input type = "text" name = "mail" id = "mail"><br>
    <div id = "error_mail" style = "color:red"></div><br>
    パスワード<br>
    <input type = "text" name = "password" id = "password" ><br>
    <div id = "error_password" style = "color:red"></div><br>
    <input type = "submit" name = "check" value = "登録"><br><br>
</form>    