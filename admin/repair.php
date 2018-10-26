
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
header('Refresh: 1; URL=repair.php');
}
$id = $_GET["id"];
if (isset($id)) {
	$conn2 = mysqli_connect($server,$username,$password,$dbname);
	$sql1 = "DELETE FROM tb_repair WHERE data_sequence = '".$id."' ";
	$query1 = mysqli_query($conn2,$sql1);
	header('Refresh: 1; URL=repair.php');
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
		<link href="../css/fontawesome-all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../font/fonts/thsarabunnew.css">
  </head>
  <body>
		<style>
	body {

			background-color: #F8F8FF;
	}
	table{
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
		 white-space: normal; word-wrap: break-word;
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
            <li class="nav-item ">
              <a class="nav-link " href="list1.php">จัดการข้อมูล</a>
            </li>
						<li class="nav-item active">
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
	<br><h3 class="text-center"style="font-family: 'THSarabunNew', sans-serif; " ><B>ตารางรายงานซ่อมครุภัณฑ์ </B></h3><br>
<main role="main" class="container " >
<table class=" table-sm table-hover " style="width:98%"border="1" bordercolor="#000000"  >
	<thead style="background-color: #CFCFCF;">
		<tr align="center">
			<th style="width: 6%"><b>ลำดับที่</b></th>
			<th style="width:15%"><b>รายการ</b></th>
			<th style="width:13%"><b>หมายเลขครุภัณฑ์</b></th>
			<th style="width:7%"scope="col" ><b>สถานที่ตั้ง</b></th>
			<th style="width:16%"scope="col" ><b>หน่วยงาน</b></th>
			<th style="width:18%"scope="col" ><b>หมายเหตุ</b></th>
			<th style="width:8%"scope="col" ><b>สถานะ</b></th>
			<th style="width:8%" scope="col" ><b>อนุมัติซ่อม</b></th>
			<th style="width:3%"scope="col" ><b>#</b></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$n=1;
		while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		?>
		<tr class="table">
			<form>
			<td><?php echo $n;?></td>
			<td class="i"><?php echo $obj['data_list']?></td>
			<td ><?php echo $obj['data_id']?></td>
			<td ><?php echo $obj['data_place']?></td>
			<td ><?php echo $obj['data_institution']?></td>
			<td ><?php echo $obj['data_note']?></td>
			<?php if($obj['data_status']=="พร้อมใช้งาน"): ?><td  style="color:black;background-color: #7AF67A;">  <?php echo $obj['data_status']?> </td><?php endif;?>
			<?php if($obj['data_status']=="รอซ่อม"): ?><td style="background-color: #FFD1B7;">  <?php echo $obj['data_status']?> </td><?php endif;?>
			<td align="center" ><a class="btn btn-primary btn-sm"href="repair.php?&datastatus=<?php echo $obj['data_sequence'];?>">อนุมัติ</a></td>
				<?//<td style="word-wrap: break-word"><?php echo wordwrap($obj['data_note'],30,"<br/>",true)?></td?>
					<td>
					<a href="repair.php?id=<?php echo $obj['data_sequence']?>" class="btn btn-danger btn-sm" onClick="javascript:return confirm('คุณต้องการลบ <?php echo $obj['data_name']?> ใช่หรือไม่');"><i class="far fa-trash-alt"></i></a>
				  </td>
			</form>
		</tr>
<?php
$n++;
}
?>
	</tbody>
</table><br><br>

</main><!-- /.container -->
</CENTER>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/jquery.slim.js"></script>
		<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
