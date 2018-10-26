<?php
session_start();
require('../config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
	$conn = mysqli_connect($server,$username,$password,$dbname);
	$sql = "SELECT * FROM tb_repair ";
	$query = mysqli_query($conn,$sql);
	$sumrows = mysqli_num_rows($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
		<link rel="icon" type="image/x-icon" href="../images/machine-control-blue-114-160057.png">
    <title>หน้าหลักผู้ดูแลระบบ</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>
		<style>
	body {
			background-color: #F8F8FF;
	}
	</style>
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"style="background: linear-gradient(40deg,#006400,#00CC00)!important;">
        <a class="navbar-brand" href="#">Admin Page!!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list1.php">จัดการข้อมูล</a>
            </li>
						<li class="nav-item ">
							<a class="nav-link" href="repair.php">แจ้งซ่อม&nbsp;<span class="badge badge-light"><?php echo $sumrows;?></span></a>
						</li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">ออกจากระบบ</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">สวัสดี Admin !!</h1>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.slim.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
