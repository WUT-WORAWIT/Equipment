
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
$datastatus = '';
$sql =  "UPDATE tb_list SET data_list ='".$_POST['datalist']."'WHERE data_id = '".$_POST['id']."'" ;

	$query = mysqli_query($conn,$sql);
  if($query) {
  	$datastatus = 'OK';
  }else {
  	$datastatus = 'Failed';
  }
echo "อัพเดข้อมูล ".$datastatus."</br>";
header('Refresh: 1; URL=editlist.php');
	mysqli_close($conn);
endif;


$id = $_GET["id"];
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_list WHERE data_id = '".$id."'";
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
		 background-color: #EAEAEA; table-layout:fixed;
		 white-space: nowrap; word-wrap: break-word;
		 }
	th {
		 table-layout: fixed;
	 	 }
	th, td {
		background-color: #F8F8FF;
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
    <main role="main" class="container">
      <?php
      while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
      ?>
      <form action="editlist1.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $obj['data_id']?>"/>
        <br>
        <div class="form-group">
          <label for="exampleInputPassword1">รายการ</label>
          <textarea rows="4" cols="50" name="datalist" class="form-control"><?php echo $obj['data_list']?></textarea>
        <br></div>
          <a href="editlist.php" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</a>
          <button type="submit" class="btn btn-success"><i class="far fa-save"></i> บันทึก</button>
        </form>
        <?php
      }
        ?>
      </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
