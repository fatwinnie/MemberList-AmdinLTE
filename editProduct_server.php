<?php 
session_start();

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';


if(empty($_POST['id'])){
    die('id is empty');}

if(empty($_POST['item'])){
    die('item is empty');}

if(empty($_POST['name'])){
    die('name is empty');}

if(empty($_POST['price'])){
    die('price is empty');}
    

$id=intval($_POST['id']);
$item=$_POST['item'];
$name=$_POST['name'];
$price=$_POST['price'];

//連線資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error($connect));
}
//修改指定資料
mysqli_query($connect,"UPDATE products SET product_item='$item',product_name='$name', product_price='$price' WHERE product_id='$id'");

//debug and return
if(mysqli_error($connect)){
    die('could not connect'.mysqli_error($connect));
}else{
    header("Location:productList.php");
}
?>