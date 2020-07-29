<?php session_start();

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';  

// 判斷是否有登入
if(isset($_SESSION['userName']) && $_SESSION['userName']  ){
  if(!empty($_GET['id'])){
      //連線 mysql資料庫
      $connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
      if(!$connect){
            die('Could not connect:'.mysqli_error());}

      
      //查詢id
      $id = intval($_GET['id']); 
      $result = mysqli_query($connect,"SELECT * FROM products WHERE product_id=$id");
      if(mysqli_error($connect)){
          die('can not connect db');
      }
      //獲取結果陣列
      $result_arr = mysqli_fetch_assoc($result);
    } 
      else{
          die('id not define');
      }
  }
  else{
    echo "<script>alert('請先登入')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    die();
    //header("Location:login.php");
  }        
?> 
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

  <title>修改產品資料</title>

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
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
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
            <a href="memList.php" class="nav-link active">
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
            <a href="productList.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Edit product data</h1>
          </div>   
        </div>
      </div>
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <div class="content">
        <!-- Main content -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="editProduct_server.php" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Item</label>
                    <input type="hidden"  name="id" value="<?php echo $result_arr['product_id']?>" >
                    <input type="text" class="form-control" id="exampleInputName" value="<?php echo $result_arr['product_item']?>" name="item">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" value="<?php echo $result_arr['product_name']?>" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">price</label>
                    <input type="text" class="form-control" id="exampleInputName" value="<?php echo $result_arr['product_price']?>" name="price">
                </div>
                      
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">送出修改</button>
                <button type="button" class="btn btn-primary" onclick="location.href='productList.php'">取消返回</button>
              </div>
            </form>
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


</html>
