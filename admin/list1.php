
<?php
session_start();
require('../config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_repair ";
$query1 = mysqli_query($conn,$sql);
$sumrows = mysqli_num_rows($query1);

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
<a style="margin-left:-920px;margin-top: 20px; font-weight: bold; color:black;" href="editlist.php" type="button" class="btn btn-success">จัดการหมวดหมู่ครุภัณฑ์</a>

	<div class="list-group "class="b" style="width:500px" >
  <button type="button" class="list-group-item list-group-item-action active"style="margin-top: -35px;"><h4>
    <b>หมวดหมู่ครุภัณฑ์</h4>
  </button>

    <a  href="data/datamanage.php" type="button" class="list-group-item list-group-item-action ">เครื่องคอมพิวเตอร์</a>
  <?php
  while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
  ?>
	<div class="list-group ">
  <a href="check.php?id=<?php echo $obj['data_id']?>&list=<?php echo $obj['data_list']?>" type="button" class="list-group-item list-group-item-action "><?php echo $obj['data_list']?></a>
	</div>
<?php } ?>
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
