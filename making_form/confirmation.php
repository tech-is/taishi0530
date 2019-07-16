<?php
include('../HTML/header_form.php');
showHeader('confirmation');

$tmppass= md5(uniqid(rand()));

$array = array('name','kana','tell','mail','year','sex');
if($_POST['sex'] == 1){
    $sex = '男';
}else{
    $sex = '女';
}

 
if(isset($_POST['magagine'])) {
    $magagine = '送付する';
    $array[] = "magagine";
}else{
    $magagine = '送付しない';
}

?>
<div class = "body">
<h3>会員登録フォーム</h3>

<form method='post' action='dbconnect.php'>  
    名前:  <?php echo $_POST['name'];?><br>
    カナ:  <?php echo $_POST['kana'];?><br>
    電話:  <?php echo $_POST['tell'];?><br>
    mail:  <?php echo $_POST['mail'];?><br>
    生まれ年:<?php echo $_POST['year'] ?><br>
    性別:  <?php echo $sex?><br>
メールマガジンの送付：
        <?php echo $magagine ?>
            <br>
    <input type = "hidden" name = "password" value = "<?php echo $tmppass ?>" >
    <input type='submit' value='登録' class = "botun" >
<?php


//print_r ($array);
foreach($array as $value){?>
        <input type="hidden" name="<?php echo $value; ?>" value="<?php echo $_POST[$value];?>">
        <?php 

} 



?>

</form>
</div>

<style>
    h3{
        font-size:45px;
    }

    .botun{
        margin-top:40px;
        transform:scale(1.3);
        width:200px;
    }

    .body{
        background-color:#99CC99;
        text-align:center;
        margin:15px;
    }