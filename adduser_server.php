<?php
session_start();
if($_SESSION['userName']){

if(!isset($_POST['email'])){
    die('email is not define');
}
if(!isset($_POST['name'])){
    die('name is not define');
}
if(!isset($_POST['psd1'])){
    die('psd is not define');
}
if(!isset($_POST['psd2'])){
    die('repsd is not define');
}

$email = $_POST['email'];
$name = $_POST['name'];
$psd = $_POST['psd1'];
$repsd = $_POST['psd2'];

if(empty($email)){
    die('emil is empty');
}
if(empty($name)){
    die('name is empty');
}
if(empty($psd)){
    die('psd is empty');
}
if(empty($repsd)){
    die('repsd is empty');
}

//isset判斷的是 "變數"
//empty判斷的是 "值"

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error());
}
//mysqli_query($connect,"INSERT INTO member (memEmail,memName,psd,REpsd) VALUES ('$email','$name','$psd','$repsd')");
$sql="INSERT INTO member (memEmail,memName,psd,REpsd) 
VALUES ('$_POST[email]','$_POST[name]',md5('$_POST[psd1]'),md5('$_POST[psd2]'))";
if (!mysqli_query($connect,$sql))
  {
  die('Error: ' . mysqli_error($connect));
  }
  else{
    header("Location:memList.php");}
  }
  else{
    echo "<script>alert('請先登入')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    //header("Location:login.php");
  }



?>