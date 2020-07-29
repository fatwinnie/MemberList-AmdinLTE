<?php
session_start();
if($_SESSION['userName']){

if(!isset($_POST['item'])){
    die('items is not define');
}
if(!isset($_POST['name'])){
    die('name is not define');
}
if(!isset($_POST['price'])){
    die('psd is not define');
}


$item = $_POST['item'];
$name = $_POST['name'];
$price = $_POST['price'];


if(empty($item)){
    die('emil is empty');
}
if(empty($name)){
    die('name is empty');
}
if(empty($price)){
    die('psd is empty');
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
$sql="INSERT INTO products (product_item,product_name,product_price) 
VALUES ('$_POST[item]','$_POST[name]','$_POST[price]')";
if (!mysqli_query($connect,$sql))
  {
  die('Error: ' . mysqli_error($connect));
  }
  else{
    header("Location:productList.php");}
  }
  else{
    echo "<script>alert('請先登入')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    //header("Location:login.php");
  }



?>