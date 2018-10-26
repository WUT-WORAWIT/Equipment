<?php
session_start();
require('../../config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:../admin/login.php");
	}
	$conn = mysqli_connect($server,$username,$password,$dbname);
	$sql = "SELECT * FROM tb_repair ";
	$query = mysqli_query($conn,$sql);
	$sumrows = mysqli_num_rows($query);
$id = $_GET["id"];
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_cabinet WHERE data_sequence = '".$id."'";
$query = mysqli_query($conn,$sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../../images/machine-control-blue-114-160057.png">

    <title>จัดการข้อมูล</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/fontawesome-all.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"style="background: linear-gradient(40deg,#006400,#00CC00)!important;">
        <a class="navbar-brand" href="#">Admin Page!!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id ="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="../admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../list.php">จัดการข้อมูล</a>
            </li>
						<li class="nav-item ">
							<a class="nav-link" href="../repair.php">แจ้งซ่อม&nbsp;<span class="badge badge-light"><?php echo $sumrows;?></span></a>
						</li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

		<!-- Begin page content -->
    <main role="main" class="container">
      <?php
      while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
      ?>
      <form action="edit.cabinet.process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $obj['data_sequence']?>"/>
				<br>
				<div class="form-group">
					<label for="exampleInputPassword1">หมายเลขครุภัณฑ์</label>
					<input rows="4" cols="50" name="dataid"  class="form-control" value="<?php echo $obj['data_id']?>"readonly/>
				</div>
					<div class="form-group">
						<label for="exampleInputPassword1">รายการ</label>
						<textarea rows="4" cols="50" name="datalist" class="form-control" ><?php echo $obj['data_list']?></textarea>
					<br><div class="form-group">
						<label for="exampleInputPassword1">สถานที่ตั้ง</label>
						<textarea rows="4" cols="50" name="dataplace"  class="form-control" ><?php echo $obj['data_place']?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">หน่วยงาน</label>
						<textarea rows="4" cols="50" name="datainstitution" v class="form-control" ><?php echo $obj['data_institution']?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">หมายเหตุ</label>
						<textarea rows="4" cols="50" name="datanote"  class="form-control" ><?php echo $obj['data_note']?></textarea>
	          <a href="../../admin/data/datacabinet.php" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</a>
	          <button type="submit" class="btn btn-success"><i class="far fa-save"></i> บันทึก</button>
	        </form>
        <?php
      }
        ?>
      </main>
<footer class="footer">
  <div class="container">
    <span class="text-muted"></span>
  </div>
</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.slim.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
