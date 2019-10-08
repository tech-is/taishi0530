<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン成功</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/css/bulletin_board.css">
<style>
    body{
        text-align:center;
    }

    p{
        text-align:center;
        margin-left:0px;
        font-size:30px;
    }
</style>
</head>
<body>
    <p></p>
    <h1>ログイン成功</h1>
    <h3>ようこそ</h3>
    <p><?=$_SESSION['password'] ?>さん</p>
    <a href = "/Login/logout">>>>ログアウト<<<</a>