<?php
session_start();

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連線資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error($connect));
}
// if user login and has delete / do next
//else die permission deny.
if($_SESSION['userName']){

$id=intval($_GET['id']);
//排空錯誤
if(empty($_GET['id'])){
    die('id is empty');
}

//刪除指定資料
mysqli_query($connect,"DELETE FROM member WHERE memID=$id");

//debug and return
if(mysqli_error($connect)){
    die('could not connect'.mysql_error());
}else{
    header("Location:memList.php");
}
}

else{
    echo "<script>alert('請先登入')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    //header("Location:login.php");
  }

?>