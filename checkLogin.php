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
if($id!=null && $pw!=null && $row['userName']==$id && $row['password']==$pw){
    $rank = mysqli_query($connect,"SELECT user_rank FROM user where userName='$id' and password='$pw'");
    session_start(); 
    $_SESSION['userName'] = $id;   
    $_SESSION['user_rank'] = $rank;
    //echo '登入成功!';
    
    switch($_SESSION['user_rank']){
        case 1:
            header("location: memList.php");
            break;
        case 2:
            header("location: productList.php");
            break;
        case 3:
            header("location: adduser.php");
            break;
          //default:
           // header("location: login.php");
           // break;
        }

    }
    //$rank = mysqli_query($connect,"SELECT user_rank FROM user where userName='$id' and password='$pw'");
    //$result = mysqli_query($connect,"SELECT * FROM user_role where user_id='$id'");  
    //$_SESSION['role'] = 'root';
    //echo '登入成功!'; 
    //echo '<meta http-equiv=REFRESH CONTENT=1;url=memList.php>';
    
 
else{
    echo '登入失敗';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}

?>
