<?php session_start(); ?>
      


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Product List</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>   
    </ul>

 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a  class="brand-link"> 
      <span class="brand-text font-weight-light"><?php echo $_SESSION['userName'] ?></span>  
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="memList_user.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Member List 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
         
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="productList_user.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product List 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product List</h1>
          </div>   
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- Main content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
                
                

                <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" onclick="location.href='logout.php'">登出</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <form action="deleteAll.php" method="post">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      
                      <th>ID</th>
                      <th>product_Item</th>
                      <th>product_Name</th>
                      <th>price</th>
                                      
                    </tr>
                  </thead>
                  <tbody>
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

                    // 此判斷為判定觀看此頁有沒有權限
                    if($_SESSION['userName']){

                    //查詢資料表中的所有資料,並按照id降序排列
                    $result = mysqli_query($connect,"SELECT*FROM products ORDER BY product_id ASC");
                    $row_count = mysqli_num_rows($result); 
                    //echo $row_count; //獲取資料表的資料條數

                    for($i=0;$i<$row_count;$i++){
                        $result_arr = mysqli_fetch_assoc($result);
                        $id = $result_arr['product_id'];
                        $item = $result_arr['product_item'];
                        $name = $result_arr['product_name'];
                        $price = $result_arr['product_price'];
                        //print_r($result_arr);
                        echo "<tr>
                                
                                <td>$id</td>
                                <td>$item</td>
                                <td>$name</td>
                                <td>$price</td>
                                               
                            </tr>"; }
                          }
                          else{
                            echo "<script>alert('請先登入')</script>";
                            //echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
                            header("Location:login.php");
                          }

                    mysqli_close($connect);
                  

                    ?>
                   
                  </tbody>
                </table>
                
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
 
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

<script language="javascript">

    function selectAll(qx){
        var ck = document.getElementsByClassName('CK');

        if(qx.checked){
            for(i=0;i<ck.length;i++){
                ck[i].setAttribute("checked","chekced"); //全選
            }
        } else{
            for(var i=0;i<ck.length;i++){
                ck[i].removeAttribute("checked"); //全部取消
            }
        }
    }

function deleteRecord(id)
{
if(confirm("確定要刪除嗎?")) {
    location.href=`deleteUser.php?id=${id}`;
    alert("刪除成功！");
}else
alert("取消刪除");
}

function delete_confirm() { 
    var msg = confirm('Are you sure you want to delete '); 
    if(msg == false) { 
     return false; 
    } 
} 
</script>
</html>

