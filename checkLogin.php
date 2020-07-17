<?php

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error());
}

$id = $_POST['id'];
$pw = $_POST['pw'];

// 查詢資料庫
$result = mysqli_query($connect,"SELECT * FROM member where memEmail='$id'");
$row = mysqli_fetch_assoc($result);

if($id!=null && $pw!=null && $row['memEmail']==$id && $row['psd']==md5($pw)){
    echo '登入成功!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=memList.php>';
} else{
    echo '登入失敗';
    //echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}

?>
