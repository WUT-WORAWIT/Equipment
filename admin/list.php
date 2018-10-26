
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

$id_post = $_GET['datastatus'];
if(isset($_GET['datastatus']) == TRUE){
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql2 = "UPDATE tb_repair SET data_status='พร้อมใช้งาน' WHERE data_sequence='$id_post'";
$query2 = mysqli_query($conn,$sql2);
header('Refresh: 2; URL=http://localhost/Attractions/admin/repair.php');
}
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
		<!-- Custom styles for this template -->
		<link href="../css/starter-template.css" rel="stylesheet">
		<!-- Bootstrap core CSS -->
		<link href="css/mdb.min.css" rel="stylesheet" /><link href="https://fonts.googleapis.com/css?family=Kanit|Roboto" rel="stylesheet" />
		<link rel="stylesheet" href="../font/fonts/thsarabunnew.css">
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
		 background-color: #EAEAEA; table-layout:fixed;
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
              <a class="nav-link" href="#">จัดการข้อมูล</a>
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
	<div class="list-group "class="b" style="width:500px">
  <button type="button" class="list-group-item list-group-item-action active"><h4>
    <b>หมวดหมู่ครุภัณฑ์</h4>
  </button>
  <a  href="data/datamanage.php" type="button" class="list-group-item list-group-item-action ">เครื่องคอมพิวเตอร์</a>
  <a href="data/dataPrinter.php" type="button" class="list-group-item list-group-item-action">เครื่องปริ้นเตอร์</a>
  <a href="data/dataRack.php" type="button" class="list-group-item list-group-item-action">ตู้เเร็ก</a>
  <a href="data/dataSliding.php" type="button" class="list-group-item list-group-item-action">ตู้บานเลื่อน</a>
	<a href="data/dataComputer_desk.php" type="button" class="list-group-item list-group-item-action">โต๊ะวางเครื่องคอมพิวเตอร์</a>
	<a href="data/datacabinet.php" type="button" class="list-group-item list-group-item-action">ตู้</a>
	<a href="data/dataSteel_cabinet.php" type="button" class="list-group-item list-group-item-action">ตู้เหล็ก</a>
	<a href="data/dataCircu.php" type="button" class="list-group-item list-group-item-action">กล้องโทรทัศน์วงจรปิด</a>
	<a href="data/dataTable.php" type="button" class="list-group-item list-group-item-action">โต๊ะประชุมรูปไข่</a>
	<a href="data/dataDocument_racks.php" type="button" class="list-group-item list-group-item-action">ชั้นวางเอกสาร</a>
	<a href="data/dataDocument_cabinet.php" type="button" class="list-group-item list-group-item-action">ตู้เก็บเอกสารบานเลื่อนกระจก</a>
	<a href="data/dataChair.php" type="button" class="list-group-item list-group-item-action">เก้าอี้ทำงาน</a>
</div><br></br></b>

</main><!-- /.container -->
</CENTER>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/jquery.slim.js"></script>
		<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
