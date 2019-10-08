
<?php
//ここで画像を作って保存
print_r($_FILES);

if(isset($_FILES)&& isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])){
    if(!file_exists('s_upload')){
        mkdir('s_upload');
    }
    $a = 's_upload/' . basename($_FILES['photo']['name']);
    if(move_uploaded_file($_FILES['photo']['tmp_name'], $a)){
        $msg = $a. 'のアップロードに成功しました';
    }else {
        $msg = 'アップロードに失敗しました';
    }
}



