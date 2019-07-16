<?php
include('../HTML/header_form.php');
showHeader('form')
?>

<h1>会員登録フォーム</h1>

<form method="post" action="confirmation.php" >    
        <p>名前: <input  $type="text" name="name"  class="box"></p>
        <p>カナ: <input type="text" name="kana" class="box"></p>
        <p>電話: <input type="text" name="tell" class="box"></p>
        <p>mail: <input type="text" name="mail" class="box"></p>
        <p>生まれ年: <select name='year'class="box-size">
        <?php 
        for ($i=1980; $i<=2019 ; $i++){ ?>
                <option><?php echo $i; ?></option>    
        <?php } 
        ?></p>
    </select><br>

    <p>性別:
    <input type="radio" name="sex" value="1" class="box-size2"　checked>男
    <input type="radio" name="sex" value="2" class="box-size2">女
    </p>
    <p class = "mail">メールマガジン送付:    
        <input type='checkbox' name='magagine' value='1' class="box-width">
    </p>
    <p><input type='submit' value='確認' class="btn btn-primary"></p>
    
<?php
    include("../html/footer.php");
?>