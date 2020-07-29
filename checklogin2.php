<?php

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){die('Could not connect:'.mysqli_error());
}
      
$id = $_POST['id'];
$pw = $_POST['pw'];

// 查詢資料庫
$result = mysqli_query($connect,"SELECT * FROM user where userName='$id'");

$row = mysqli_fetch_assoc($result);
if(如果資料庫查到資料){
    $_SESSION['isLogined']= 1;
    $_SESSION['userName']= $row['userName'];
    $_SESSION['userID']= $row['userID'];
    導向至後台首頁
    $_SESSION['member']['list']=1;
    

    }
   
    
 
else{
    echo '登入失敗';
    //echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}

?>
