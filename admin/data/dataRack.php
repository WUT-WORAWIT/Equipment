
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

$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_rack ORDER BY data_sequence ASC";
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- เชคข้อมูลซ้ำ -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  </head>
  <body>
		<style>
	body {
			background-color: #F8F8FF;
			margin-left:-21px;
	}
	/*td{
			background-color: #FFFFCC;
	}*/
	<?
	//ขนาดความกว้างของ table
	?>
	th {
		table-layout:fixed;
	white-space: normal;
	word-wrap: break-word;
	}
	td{
	  table-layout:fixed;
	}
	th, td {
			font-size: 14px;
	}
	</style>
<!--<body bgcolor ='green'>-->
    <header>
			<script>
		   $(document).ready(function(){
		     $('#dataid').blur(function(){

		       var dataid = $(this).val();

		       $.ajax({
		        url:'../check1.php?&category=rack',
		        method:"POST",
		        data:{data_id:dataid},
		        success:function(data)
		        {
		         if(data  != '0')
		         {
		          $('#availability').html('<span class="text-danger">รหัสครุภัณฑ์นี้ถูกใช้งานแล้ว</span>');
		          $('#register').attr("disabled", true);
		         }
		         else
		         {
		          $('#availability').html('<span class="text-success">สามารใช้งานรหัสครุภัณฑ์นี้ได้</span>');
		          $('#register').attr("disabled", false);
		         }
		        }
		       })

		    });
		   });
		  </script>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"style="background: linear-gradient(40deg,#006400,#00CC00)!important;">
        <a class="navbar-brand" href="#">Admin Page!!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
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
<body>
	<br>
    <!-- Begin page content -->
  <main role="main" class="container" width="10px">
		<div class="container">
			<?php
							$pro_search = $_POST['pro_search'];
							$p = '%'.$pro_search.'%';
							$sql_s = "SELECT * FROM tb_data WHERE data_id LIKE '$p'" ;
							$query = mysqli_query($conn,$sql_s);
				?>
		<div class="row justify-content-center">
									<div class="col-12 col-md-10 col-lg-8">
											<form class="form-group"action="dataPrinter.php"method="post"style="width:390px;margin-top :-20px;">
													<div class="card-body row no-gutters align-items-center">
															<div class="col-auto">
																	<i class="fas fa-search h4 text-body"></i>
															</div>
															<!--end of col-->
															<div class="col">
																	<input style=" font-size: 16px;"class="form-control form-control-lg form-control-borderless" name="pro_search"type="search" placeholder="ค้นหา ปี พ.ศ.">
															</div>
															<!--end of col-->
															<div class="col-auto">
																	<button style=" font-size: 16px;"class="btn btn-lg btn-success"name="dds" id="dds"onClick="this.form.action='dataRack.php'" type="submit">ค้นหา</button>
															</div>
															<!--end of col-->
													</div>
											</form>
									</div>
									<!--end of col-->
							</div>
		</div><br>
		<form method="post" action="../test.php?&category=rack">
			<button style="margin-top :-191px;"type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มข้อมูล</button>
			<input  style="margin-top :-191px;margin-left:10px;" type="submit" class=" btn btn-success" value="พิมพ์" />
			<div style="margin-top :-80px;"class="table-responsive " >
		<br><table class="table table-sm table-bordered table-hover "style="width:90%;" border="12" >
  <thead class="thead-dark ">
	<body>
		<tr align="center" >
			<th style="width:4.5%"scope="col">จัดการ</th>
      <th style="width:4.5%"scope="col">พิมพ์</th>
      <th style="width:6.5%"scope="col">ลำดับที่</th>
			<th scope="col">รูปภาพ</th>
      <th style="width:20%"scope="col">รายการ</th>
      <th style="width:7%"scope="col">เครื่องที่</th>
      <th style="width:14%"scope="col">หมายเลขครุภัณฑ์</th>
			<th style="width:9%"scope="col">สถานที่ตั้ง</th>
      <th style="width:16%" scope="col">หน่วยงาน</th>
			<th style="width:16%"scope="col">หมายเหตุ</th>
    </tr>
  </thead>
  <tbody>
		<?php
		$n=1;
		while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		?>
    <tr>
			<td align="center">
				<a href="../editData/edit.rack.php?id=<?php echo $obj['data_sequence']?>" class="btn btn-warning btn-sm" ><i class="far fa-edit"></i></a><br>
				<a style="margin-top:2px;" href="../delete/dilete.dataRack.php?id=<?php echo $obj['data_sequence']?>" class="btn btn-danger btn-sm" onClick="javascript:return confirm('คุณต้องการลบ <?php echo $obj['data_name']?> ใช่หรือไม่');"><i class="far fa-trash-alt"></i></a>
				<?php if($obj['data_pic']==""): ?>
					<a href="../qrcode/ger_qr_printer.php?id=<?php echo $obj['data_sequence']?>&category=rack"   class="fas fa-qrcode f029" style="font-size:34px;color:black "></a>
				<?php endif; ?></td>
				<td align="center">
				<input type="checkbox" name="check_list[]" value="<?php echo $obj['data_sequence']?>" />
			</td>

			<th><?php echo $n;?></th>
			<td>
				<?php
				if($obj['data_pic']!=""):
				echo "<img src='../qrcode/qrcodegen/".$obj['data_pic']."' width='100px'>";
				endif;
				?>
			</td>
			<td><?php echo $obj['data_list']?></td>
      <td><?php echo $n;?></td>
			<td><?php echo $obj['data_id']?></td>
			<td><?php echo $obj['data_place']?></td>
			<td><?php echo $obj['data_institution']?></td>
			<td><?php echo $obj['data_note']?></td>
    </tr>
		<?php
		$n++;
}
?>
  </tbody>
</table></form>
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
            <form action="../insertData/insert.Rack.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputPassword1">รายการ</label>
								<input type="text" class="form-control" name="datalist" >
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">หมายเลขครุภัณฑ์</label>
								<input type="text" name="dataid" id="dataid" class="form-control" required ></input>
								<span id="availability"></span>
								<br />
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">สถานที่ตั้ง</label>
								<textarea rows="4" cols="50" name="dataplace" class="form-control" ></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">หน่วยงาน</label>
								<textarea rows="4" cols="50" name="datainstitution" class="form-control" ></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">หมายเหตุ</label>
								<textarea rows="4" cols="50" name="datanote" class="form-control" ></textarea>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
