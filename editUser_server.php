<?php

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';


if(empty($_POST['id'])){
    die('id is empty');}

if(empty($_POST['email'])){
    die('email is empty');}

if(empty($_POST['name'])){
    die('name is empty');}

$id=intval($_POST['id']);
$email=$_POST['email'];
$name=$_POST['name'];

//連線資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error($connect));
}
//修改指定資料
mysqli_query($connect,"UPDATE member SET memEmail='$email',memName='$name' WHERE memID='$id'");

//debug and return
if(mysqli_error($connect)){
    die('could not connect'.mysql_error());
}else{
    header("Location:memList.php");
}
?>