<?php
$test = 'abc';
echo gettype($test);
var_dump(gettype($test));

$a = 123;

if( gettype($a) == 'integer' ) {
    $a = (int)$a;
}else{
    $a = (string)$a;
}

var_dump($a);	// 15

$test = '1';

var_dump(!empty($test));

var_dump(gettype($test));

var_dump(settype($test,'int'));

if((int)$test === 1){
    echo "okokok";
}

$personalData = array(
	"name" => "Alex",
	"gender" => "men",
	"age" => 30,
	"email" => "nickerdoodle@sample.co.jp"
);
print_r(extract($personalData));

print_r($personalData);

$name = 'Alex';
$gender = 'men';
$age = 30;
$email = 'nickerdoodle@sample.co.jp';
$personalData = array();

// 変数を統合
$personalData = compact( "name", "gender", "age", "email");
var_dump($personalData);

// 変数の初期化
$result = null;

// 個人情報
$personalData = array(
	"name" => "Alex",
	"gender" => "men",
	"age" => 30
);

// 連絡先
$contactData = array(
	'email' => 'nickerdoodle@sample.com',
	'phone_number' => '080-xxxx-xxxx'
);

// 住所
$addressData = array(
	'zip_code' => '350-1124',
	'address' => '埼玉県 川越市 新宿町',
	'building' => '川越ヒルズ 305',
);

$result = array_merge( $personalData, $contactData, $addressData);
print_r($result);

// 変数の初期化
$result = null;

// 個人情報
$personalData = array(
	"name" => "Alex",
	"gender" => "men",
	"age" => 30,
	"contact" => array(
		'email' => 'nickerdoodle@sample.com',
		'phone_number' => '080-xxxx-xxxx'
	)
);

// 自宅
$addressData = array(
	'zip_code' => '350-1124',
	'address' => '埼玉県 川越市 新宿町',
	'building' => '川越ヒルズ 305',
	'contact' => array(
		'phone_number' => '049-xxxx-xxxx',
		'fax_number' => '049-xxxx-xxxx'
	)
);

// 緊急連絡先
$emergencyContact = array(
	"contact" => array(
		'emergency' => '090-2222-xxxx',
	)
);

$result = array_merge( $personalData, $addressData, $emergencyContact);
print_r
($result);

$animal = array(
    'dog' => 'bob',
    'cat' => 'red',
    'bird' => 'black',
);

foreach($animal as $value){
        echo $value,"\n";
}

$fruits = ['apple', 'orange', 'melon'];
//値を追加する
$fruits[2] = 'banana';
$fruits[] = 'pineapple';
 
print_r($fruits);

$i = 123;
$a = string;
var_dump(settype($i , $a));