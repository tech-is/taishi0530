<?php
 include("header.php");

 showHeader('sanple'); 
?>

<!-- <p>画像アップロード</P>
<form action="homework2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="photo">
    <p><input type="submit" value="アップロード" ></p>
</form>-->

<form action="homework.php" method="post" enctype="multipart/form-data">
    <input type="file" name="photo">
    <input type="text" name="aaa">
    <input type="submit" value="アップロード">
</form>