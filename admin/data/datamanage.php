<?php
session_start();
require('../../config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:../login.php");
	}
		$conn = mysqli_connect($server,$username,$password,$dbname);
		$sql = "SELECT * FROM tb_repair ";
		$query = mysqli_query($conn,$sql);
		$sumrows = mysqli_num_rows($query);

		$conn = mysqli_connect($server,$username,$password,$dbname);
		$sql = "SELECT * FROM data ORDER BY data_sequence ASC";
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
		<!-- ไอคอน -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- ฟ้อนไทยสารบัญ -->
		<link rel="stylesheet" href="../../font/fonts/thsarabunnew.css">
		<!-- เชคข้อมูลซ้ำ -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </head>
		<style>
	body {
			background-color: #F8F8FF;
			margin-left:-5px;
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
th {
	table-layout: fixed;

white-space: nowrap;

}
	th, td {

			font-size: 14px;

	}
	.box
  {
   width:800px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:36px;
  }
	</style>
	<script>
   $(document).ready(function(){
     $('#dataid').blur(function(){

       var dataid = $(this).val();

       $.ajax({
        url:'../check1.php?&category=data',
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
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark "style="background: linear-gradient(40deg,#006400,#00CC00)!important;">
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
              <a class="nav-link" href="../list1.php">จัดการข้อมูล</a>
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
    <!-- Begin page content -->
  <br><main role="main" class="container" width="10px">
		<div class="container" >
			<?php
									$pro_search = $_POST['pro_search'];
									$p = '%'.$pro_search.'%';
									$sql_s = "SELECT * FROM data WHERE data_id LIKE '$p'OR data_list LIKE '$p'" ;
									$query = mysqli_query($conn,$sql_s);
				?>
		<div class="row justify-content-center">
									<div class="col-12 col-md-10 col-lg-8">
											<form class="form-group"action="data.php"method="post"style="width:390px;margin-top :-20px;">
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
																	<button style=" font-size: 16px;"class="btn btn-lg btn-success"name="dds" id="dds"onClick="this.form.action='datamanage.php'" type="submit">ค้นหา</button>
															</div>
															<!--end of col-->
													</div>
											</form>
									</div>
									<!--end of col-->
							</div>
		</div><br>
		<form method="post" action="../test.php?&category=data">
			<button style="margin-top :-191px;"type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มข้อมูล</button>
			<input  style="margin-top :-191px;margin-left:10px;" type="submit" class=" btn btn-success" value="พิมพ์" />
<div style="margin-top :-80px;"class="table-responsive " >
<br><table class="table table-sm table-bordered table-hover "style="width:100%;" border="12" >
  <thead class="thead-dark ">
    <tr align="center" >
			<th style="width:15%"scope="col">จัดการ</th>
      <th scope="col">พิมพ์</th>
			<th scope="col">ลำดับที่</th>
			<th scope="col">รูปภาพ</th>
      <th scope="col width="50px"">หมายเลขครุภัณฑ์</th>
      <th scope="col">รายการ</th>
			<th scope="col">คุณสมบัติ</th>
      <th scope="col">หน่วย</th>
			<th scope="col">ยี่ห้อ</th>
      <th scope="col">รุ่น</th>
			<th scope="col">หมายเลขเครื่อง</th>
			<th scope="col">จำนวนเงิน</th>
			<th scope="col">วันที่ได้มา</th>
			<th scope="col">ผู้ขาย/ผู้รับจ้าง&nbsp;</th>
			<th scope="col">หน่วยงานย่อย</th>
			<th scope="col">ชื่อผูใช้งาน</th>
			<th scope="col">อาคาร</th>
			<th scope="col">ชั้น</th>
			<th scope="col">ห้อง</th>
			<th scope="col">ชื่อห้อง</th>
			<th scope="col">รหัสชุดเบิก</th>
			<th style="width:10;"scope="col">ประเภทงบประมาณ</th>
			<th scope="col">วิธีการที่ได้มา</th>
			<th scope="col">เลขที่สัญญา</th>
			<th scope="col">วันที่สัญญา</th>
			<th scope="col">สิ้นสุดรับประกัน</th>
    </tr>
  </thead>
  <tbody>

		<?php
		$n=1;
		while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){

		?>
    <tr>
			<td align="center" >
				<!-- เปิดเเทปใหม่ -->
				<!--<a href="../editData/edit.data.php?id=<?php echo $obj['data_sequence']?>" class="btn btn-warning btn-sm" target="_blank" ><i class="far fa-edit"></i></a>-->
				<a href="../editData/edit.data.php?id=<?php echo $obj['data_sequence']?>" class="btn btn-warning btn-sm"  ><i class="far fa-edit"></i></a>
				<a  style="margin-top:2px;" href="../delete/delete.data.php?id=<?php echo $obj['data_sequence']?>" class="btn btn-danger btn-sm" onClick="javascript:return confirm('คุณต้องการลบ <?php echo $obj['data_name']?> ใช่หรือไม่');"><i class="far fa-trash-alt"></i></a>
				<?php if($obj['data_pic']==""): ?>
				<a href="../qrcode/ger_qr_printer.php?id=<?php echo $obj['data_sequence']?>&category=data"   class="fas fa-qrcode f029" style="font-size:34px;color:black "></a>
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
			<td><?php echo $obj['data_id']?></td>
      <td><?php echo $obj['data_list']?></td>
			<td><?php echo $obj['data_property']?></td>
			<td><?php echo $obj['data_unit']?></td>
			<td><?php echo $obj['data_brand']?></td>
			<td><?php echo $obj['data_generation']?></td>
			<td><?php echo $obj['data_nummachine']?></td>
			<td><?php echo $obj['data_price']?></td>
			<td><?php echo $obj['data_acstdate']?></td>
			<td width="103"><?php echo $obj['data_seller']?></td>
			<td><?php echo $obj['data_subdivision']?></td>
			<td width="103"> <?php echo $obj['data_name']?></td>
			<td><?php echo $obj['data_building']?></td>
			<td><?php echo $obj['data_class']?></td>
			<td><?php echo $obj['data_Room']?></td>
			<td><?php echo $obj['data_roomname']?></td>
			<td><?php echo $obj['data_code']?></td>
			<td><?php echo $obj['data_category']?></td>
			<td><?php echo $obj['data_obtain']?></td>
			<td><?php echo $obj['data_contractnumber']?></td>
			<td><?php echo $obj['data_contractday']?></td>
			<td><?php echo $obj['data_endwarranty']?></td>
    </tr>
<?php
$n++;
}
?>
  </tbody>
</table>
</form>
</div>
</main><br></br>
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
    <form action="../insertData/insert.data.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputPassword1">หมายเลขครุภัณฑ์</label>
    <input type="text" name="dataid" id="dataid" class="form-control"required ></input>
		<span id="availability"></span>
		<br />
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">รายการ</label>
    <textarea rows="4" cols="50" name="datalist" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">คุณสมบัติ</label>
    <textarea rows="4" cols="50" name="dataproperty" class="form-control" ></textarea>
  </div>
	<div class="form-group">
		<label for="exampleInputPassword1">หน่วย</label>
		<textarea rows="4" cols="50" name="dataunit" class="form-control" ></textarea>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">ยี่ห้อ</label>
    <textarea rows="4" cols="50" name="databrand" class="form-control" ></textarea>
  </div>
	<div class="form-group">
		<label for="exampleInputPassword1">รุ่น</label>
		<textarea rows="4" cols="50" name="datageneration" class="form-control" ></textarea>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">หมายเลขเครื่อง</label>
    <textarea rows="4" cols="50" name="datanummachine" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">จำนวนเงิน</label>
    <textarea rows="4" cols="50" name="dataprice" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">วันที่ได้มา</label>
    <textarea rows="4" cols="50" name="dataacstdate" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">ผู้ขาย/ผู้รับจ้าง</label>
    <textarea rows="4" cols="50" name="dataseller" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">หน่วยงานย่อย</label>
    <textarea rows="4" cols="50" name="datasubdivision" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">ชื่อผู้ใช้งาน</label>
    <textarea rows="4" cols="50" name="dataname" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">อาคาร</label>
    <textarea rows="4" cols="50" name="databuilding" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">ชั้น</label>
    <input type="text" class="form-control" name="dataclass" >
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">ห้อง</label>
  <input type="text" class="form-control" name="dataRoom" >
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">ชื่อห้อง</label>
    <textarea rows="4" cols="50" name="dataroomname" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">รหัสชุดเบิก</label>
    <input type="text" class="form-control" name="datacode" >
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">ประเภทงบประมาณ</label>
    <textarea rows="4" cols="50" name="datacategory" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">วิธีการที่ได้มา</label>
    <textarea rows="4" cols="50" name="dataobtain" class="form-control" ></textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputPassword1">เลขที่สัญญา</label>
    <textarea rows="4" cols="50" name="datacontractnumber" class="form-control" ></textarea>
  </div>
	<div class="form-group">
		<label for="exampleInputPassword1">วันที่สัญญา</label>
		<input type="text" class="form-control" name="datacontractday" >
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">สิ้นสุดรับประกัน</label>
		<input type="text" class="form-control" name="dataendwarranty" >
	</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" name="register" class="btn btn-info" id="register">บันทึก</button>
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
