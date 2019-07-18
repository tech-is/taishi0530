<?php
include("../HTML/header_janken.php");
?>
<div class="header">

    <h1>人生はじゃんけんの連続だ！</h1>

</div>

<div class="main">

        <h3>練習問題（1）じゃんけん</h3>

        <p class="font">出す手を選んで勝負してください</p>

        <form method="post" action="janken_2.php" class="radio">

            <input  type="radio" name="janken" value="0" class="janken" required>グー

            <input  type="radio" name="janken" value="1" class="janken" required>チョキ

            <input  type="radio" name="janken" value="2" class="janken" required>パー

            <br>
</div>

                <div class="btn">

                    <input type="submit" name="btn" value="勝負する" class="btn-square-little-rich" >
                
                </div>

         </form>

</div>

<div class="footer">
</div>
<?php
include("../HTML/footer.php");
?>