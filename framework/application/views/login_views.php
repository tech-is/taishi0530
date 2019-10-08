<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Favicon-->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="/css/bulletin_board.css">
    <style>
        body{
            text-align:center;
        }
        
        p{
            text-align:center;
            margin-left:0px;
            color:red;
        }
    </style>
</head>
<body>
    <h1>ログイン画面</h1>
    <?php echo form_open('Login/check'); ?>
    メールアドレス<br>
    <p></p>
    <input type = "email" name = "mail" id = "mail"><br>
    <p><?= form_error('mail'); ?></p>
    <p></p>
    パスワード<br>
    <p></p>
    <input type = "password" name = "password" id = "password"><br>
    <p><?= form_error('password'); ?></p>
    <p></p>
    <input type = "button" name = "button" value = "ログイン" id = "send">
    <p></p>
    <p><?= isset($error_msg)? $error_msg: false; ?></p>
    </form>
    <!-- デバック用 -->
    <!-- <?php print_r ($this->session->all_userdata());?> -->
    
<!--APIログイン-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    // 送信ボタンをクリック
    $('#send').on("click", function(){
        // POSTで送るログインデータを定義する
        var data = {mail : $('#mail').val(),password : $('#password').val()};
        // Ajax通信でログインチェック
        $.ajax({
            type: "POST",
            url: "Login/check",
            data: data,
            success: function(data,dataType){
                if(data == 1){
                    location.href = "/Login/session_check";
                }else{
                    alert('入力値が正しくありません');
                }
            },
            //Ajax通信が失敗した場合に呼び出されるメソッド
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert('Error : ' + errorThrown);
                $("#XMLHttpRequest").html("XMLHttpRequest : " + XMLHttpRequest.status);
                $("#textStatus").html("textStatus : " + textStatus);
                $("#errorThrown").html("errorThrown : " + errorThrown);
            }
        });
        return false;
    });
</script>
</body>