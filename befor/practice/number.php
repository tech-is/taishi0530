<?php
$number = 1234.574256;
echo number_format($number, 1, '/',' ' );

echo "<br>";

echo  random_int(0 , 19);

$number = null;
echo $number = 123.456;
echo "<br>";
echo round($number, 1),"\n";
echo ceil($number),"\n";
echo floor($number);
echo "<br>";
echo strlen($number);

echo "<br>";

$number = null;
$string_length = 10;
$array = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r',
        's','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K',
        'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',0,1,2,3,4,5,6,7,8,9];

        for($i = 0; $i < $string_length; $i++){
        $number = $array[random_int(0,count($array)-1)];
        echo $number;
        }
echo "<br>";

print_r(getdate());

