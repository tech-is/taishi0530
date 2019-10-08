<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>未来へメールを！</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/bulletin_board.css">
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
	<h1>MAIL TO THE FUTURE</h1>
    <?php echo form_open('Mail_future'); ?>
        あなたのメアド<br><input type = "text" name = "my_adress"><br><p></p>
        送り先<br><input type = "text" name = "send_adress"><br><p></p>
        いつ届けますか？<br><select name = "year">
            <?php for($year=2018;$year<=2045;$year++){ ?>
            <option ><?= $year?></option>
            <?php } ?>
        </select>
        <select name = "month">
            <?php for($month=1;$month<=12;$month++){ ?>
            <option ><?= $month?></option>
            <?php } ?>
        </select>
        <select name = "day">
            <?php for($day=1;$day<=31;$day++){ ?>
            <option ><?= $day?></option>
            <?php } ?>
        </select><br><p></p>
        本文<br><textarea></textarea>
        <br><input type = "submit"value = "未来へ送信" >
    </form>
</body>