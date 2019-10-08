<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>一言掲示板</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/css/bulletin_board.css">
</head>
<body>
<!-- フロントの構造 -->
<header>
    <h1>一言掲示板</h1>
    <form method = "post" action = "/bbs/add">
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

<form method = "post" action = "bbs/delete">
    <!-- 投稿文、削除ボタンの生成 -->
    <form method = "post" action = "">
        <input type = "hidden" name = "id" value = "">
            <?php foreach ($comment_list as $comment) { ?>
                    <button type="submit" name = "delete" value = "<?= $comment['id'] ?>" onclick="return check_delete()">削除</button>
                    <?= $comment['id'] = htmlspecialchars($comment['id'], ENT_QUOTES, 'UTF-8') ?><br>
                    <?= $comment['name'] = htmlspecialchars($comment['name'], ENT_QUOTES, 'UTF-8') ?><br>
                    <?= $comment['message'] = htmlspecialchars($comment['message'], ENT_QUOTES, 'UTF-8') ?><br>
                    <?= $comment['time'] = htmlspecialchars($comment['time'], ENT_QUOTES, 'UTF-8') ?><br>
                    <hr>
            <?php } ?>
            <!-- ページネーションの生成 -->
            <?= $this->pagination->create_links();?>
</form>

<!-- 削除ボタンを押したときJSで確認画面を表示 -->
<script type="text/javascript">
    function check_delete(){
        // 「OK」時の処理開始 ＋ 確認ダイアログの表示
        if(window.confirm('本当にいいんですね？')){
        // 「OK」時の処理終了
            return true;
        }
        // 「キャンセル」時の処理開始
        else{
            window.alert('キャンセルされました'); // 警告ダイアログを表示
            return false;
        }
    }
</script>