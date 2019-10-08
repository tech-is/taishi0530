<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>関数＆class</title>
</head>
<body>
<?php
    class ReiKawakubo 
    {   
        public function comme_des_garcons($name)
        {
            echo $name.'はギャルソンのブランドです'."<br>";
        }
    }
    $name = array("ギャルソン","ジュンヤワタナベ","ケイニノミヤ","タオクリハラ");
    $close = new ReiKawakubo();
    for($i=0;$i<count($name);$i++){
        echo $close -> comme_des_garcons($name[$i]);
    }
?>
<hr>
<?php
    // 関数
    function judje($sex,$name,$old)
    {            
        if($old >= 12){
            if($sex === 0){
                return "性別:男"."<br>".$name."さん"."<br>";
            }else{
                return "性別:女"."<br>".$name."さん";
            }
        }else{
            if($sex === 0){
                return "性別:男"."<br>".$name."くん"."<br>";
            }else{
                return "性別:女"."<br>".$name."ちゃん";
            }
        }
    }
    echo judje(0,"太郎",12 );
    echo judje(1,"花子",4);
    
?>
<hr>
<?php
    // class
    class Kid
    {
        public function __construct($name)
        {            
            echo $name;
        }

        public function judje($sex,$name,$old)
        {
            if($old >= 12){
                if($sex === 0){
                    return "性別:男"."<br>".$name."さん"."<br>";
                }else{
                    return "性別:女"."<br>".$name."さん";
                }
            }else{
                if($sex === 0){
                    return "性別:男"."<br>".$name."くん"."<br>";
                }else{
                    return "性別:女"."<br>".$name."ちゃん";
                }
            }
        }
    }

    $name = "hoge";
    $obj = new Kid($name);
    echo $obj -> judje(0,"テスト",58);
?>
<hr>
<?php
    // スクレイピング＋class
    require("phpQuery-onefile.php");
    $html = file_get_contents("https://zozo.jp/search/?p_keyv=COMME+des+GARCONS+HOMME+PLUS&p_gtype=2");
    echo $contents = phpQuery::newDocument($html)->find("h2")->text();
?>
</body>
</html>