<?php
/*
Uploadify 后台处理 Demo
Author:POOY
Date:2012-12-26
uploadify 后台处理 ：http://www.pooy.net/uploadify-houtai.html
*/

//设置上传目录
$path = '../../upload/product/';
if (isset($_GET['cat'])) {
    if ('news' == $_GET['cat']) {
        $path = '../../upload/news/';
    } elseif ('hetongtmp' == $_GET['cat']) {
        $path = '../../upload/contract_template/';
    }
}
if (!empty($_FILES)) {
    //得到上传的临时文件流
    $tempFile = $_FILES['Filedata']['tmp_name'];

    //允许的文件后缀
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'pdf');

    $fileParts = pathinfo($_FILES['Filedata']['name']);

    //最后保存服务器地址
    if (!is_dir($path)) {
        mkdir($path);
    }
    $fileName = time().mt_rand().'.'.$fileParts['extension'];
    if (move_uploaded_file($tempFile, $path.$fileName)) {
        echo $fileName;
    } else {
        echo $fileName.'上传失败！';
    }

    /* 	if (in_array($fileParts['extension'],$fileTypes)) {
            copy($tempFile,$targetFile);
            echo $_FILES['Filedata']['name'];//上传成功后返回给前端的数据
            file_put_contents($_POST['id'].'.txt','上传成功了！');
        } else {
            echo '不支持的文件类型';
        } */
}
