<?php

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連線資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error($connect));
}

 $check = $_POST['checkbox'];
 foreach($check as $value){
    mysqli_query($connect,"DELETE FROM member WHERE memID=$value");
 }

 //debug and return
if(mysqli_error($connect)){
    die('could not connect'.mysql_error());
}else{
    header("Location:memList.php");
}

?>