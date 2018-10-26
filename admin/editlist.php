
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

if($datalist	= $_POST['datalist']):
  $dataid	 = $_POST['dataid'];
$sql = "INSERT INTO tb_list (data_id,data_list)
	VALUES ('".$dataid."','".$datalist."')";
$query = mysqli_query($conn,$sql);
header("Refresh: 2; URL=editlist.php");
mysqli_close($conn);
endif;


$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_list ";
$query = mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
		<link rel="icon" type="image/x-icon" href="../images/machine-control-blue-114-160057.png">
    <title>จัดการข้อมูล</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/fontawesome-all.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- เชคข้อมูลซ้ำ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </head>
  <body>
		<style>
		body{background-color: #F8F8FF;}
	main {
		font-family: 'THSarabunNew', sans-serif;
	}
	/*td{
			background-color: #FFFFCC;
	}*/
	<?
	//ขนาดความกว้างของ table
	?>
	td {
		 table-layout:fixed;
		 white-space: nowrap; word-wrap: break-word;
		 }
	th {
		 table-layout: fixed;
	 	 }
	th, td {
		
		 font-size: 14px;
		 }
	</style>
<!--<body bgcolor ='green'>-->
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"style="background: linear-gradient(40deg,#006400,#00CC00)!important;">
        <a class="navbar-brand" href="#">Admin Page!!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active ">
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
<CENTER>

<main role="main" class="container " >
<form method="post" >
  <button style="margin-top: 100px;"type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มข้อมูล</button>
<div style="margin-top :10px;"class="table-responsive " >
<br><table class="table table-sm table-bordered table-hover "style="width:30%;" border="12" >
<thead class="thead-dark ">
<body>
<tr align="center" >
  <th style="width:4.5%"scope="col">จัดการ</th>
  <th style="width:6.5%"scope="col">ลำดับที่</th>
  <th style="width:20%"scope="col">รายการ</th>
</tr>
</thead>
<tbody>
<?php
$n=1;
while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
?>
<tr>
  <td rows="5" align="center" >
    <a href="editlist1.php?id=<?php echo $obj['data_id']?>&list=<?php echo $obj['data_list']?>&category=<?php echo $id?>" class="btn btn-warning btn-sm" ><i class="far fa-edit"></i></a><br>
    <a style="margin-top:2px;"href="delete.list.php?id=<?php echo $obj['data_id']?>" class="btn btn-danger btn-sm" onClick="javascript:return confirm('คุณต้องการลบ <?php echo $obj['data_list']?> ใช่หรือไม่');"><i class="far fa-trash-alt"></i></a>
  </td>
  <td><?php echo $n;?></td>
  <td><?php echo $obj['data_list']?></td>
<?php $n++;} ?>
</tbody>
</table>
</form>

</div>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="editlist.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="exampleInputPassword1">รายการ</label>
<input type="text" class="form-control" name="datalist" value="<?php echo $obj['data_list']?>"></input>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"id="register">บันทึก</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</main><!-- /.container -->
</CENTER>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
