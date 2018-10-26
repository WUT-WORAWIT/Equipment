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
$sql = "SELECT * FROM data WHERE data_sequence = '".$id."'";
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
      <form action="edit.data.process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $obj['data_sequence']?>"/>

					<input type="hidden"  name="dataid" value="<?php echo $obj['data_id']?>">

            <input type="hidden" name="datapic" value="<?php echo $obj['data_pic']?>" />
					</br>
				<div class="form-group">
					<label for="exampleInputPassword1">หมายเลขครุภัณฑ์</label>
					<input rows="4" cols="50" name="dataid"  class="form-control" value="<?php echo $obj['data_id']?>"readonly/>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">รายการ</label>
					<textarea rows="4" cols="50" name="datalist" class="form-control" ><?php echo $obj['data_list']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">คุณสมบัติ</label>
					<textarea rows="4" cols="50" name="dataproperty" class="form-control" ><?php echo $obj['data_property']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">หน่วย</label>
					<textarea rows="4" cols="50" name="dataunit"  class="form-control" ><?php echo $obj['data_unit']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ยี่ห้อ</label>
					<textarea rows="4" cols="50" name="databrand"  class="form-control" ><?php echo $obj['data_brand']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">รุ่น</label>
					<textarea rows="4" cols="50" name="datageneration" v class="form-control" ><?php echo $obj['data_generation']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">หมายเลขเครื่อง</label>
					<textarea rows="4" cols="50" name="datanummachine"  class="form-control" ><?php echo $obj['data_nummachine']?></textarea>
				<div class="form-group">
					<label for="exampleInputPassword1">จำนวนเงิน</label>
					<input type="text" class="form-control" name="dataprice" value="<?php echo $obj['data_price']?>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">วันที่ได้มา</label>
					<textarea rows="4" cols="50" name="dataacstdate"  class="form-control" ><?php echo $obj['data_acstdate']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ผู้ขาย/ผู้รับจ้าง</label>
					<textarea rows="4" cols="50" name="dataseller"  class="form-control" ><?php echo $obj['data_seller']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">หน่วยงานย่อย</label>
					<textarea rows="4" cols="50" name="datasubdivision"  class="form-control" ><?php echo $obj['data_subdivision']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ชื่อผู้ใช้งาน</label>
					<textarea rows="4" cols="50" name="dataname"  class="form-control" ><?php echo $obj['data_name']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">อาคาร</label>
					<textarea rows="4" cols="50" name="databuilding"  class="form-control" ><?php echo $obj['data_building']?></textarea>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ชั้น</label>
					<input type="text" class="form-control" name="dataclass" value="<?php echo $obj['data_class']?>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ห้อง</label>
				<input type="text" class="form-control" name="dataRoom" value="<?php echo $obj['data_Room']?>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ชื่อห้อง</label>
					<textarea rows="4" cols="50" name="dataroomname"  class="form-control" ><?php echo $obj['data_roomname']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">รหัสชุดเบิก</label>
					<input type="text" class="form-control" name="datacode" value="<?php echo $obj['data_code']?>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">ประเภทงบประมาณ</label>
					<textarea rows="4" cols="50" name="datacategory"  class="form-control" ><?php echo $obj['data_category']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">วิธีการที่ได้มา</label>
					<textarea rows="4" cols="50" name="dataobtain"  class="form-control" ><?php echo $obj['data_obtain']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">เลขที่สัญญา</label>
					<textarea rows="4" cols="50" name="datacontractnumber"  class="form-control" ><?php echo $obj['data_contractnumber']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">วันที่สัญญา</label>
					<input type="text" class="form-control" name="datacontractday" value="<?php echo $obj['data_contractday']?>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">สิ้นสุดรับประกัน</label>
					<input type="text" class="form-control" name="dataendwarranty" value="<?php echo $obj['data_endwarranty']?>">
				</div>
          <a href="../../admin/data/datamanage.php" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</a>
          <button type="submit" class="btn btn-success"><i class="far fa-save"></i> บันทึก</button>
        </form>
        <?php
      }
        ?>
      </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.slim.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
