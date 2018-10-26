

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
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="../../../../../favicon.ico">

   <title>จัดการข้อมูล</title>
   <link href="../../css/bootstrap.min.css" rel="stylesheet">
   <link href="../../css/fontawesome-all.min.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="../../css/sticky-footer-navbar.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" integrity="sha384-DmABxgPhJN5jlTwituIyzIUk6oqyzf3+XuP7q3VfcWA2unxgim7OSSZKKf0KSsnh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
 </head>
 <script>
  $(document).ready(function(){
    $('#username').blur(function(){

      var username = $(this).val();

      $.ajax({
       url:'../check1.php',
       method:"POST",
       data:{data_id:username},
       success:function(data)
       {
        if(data  != '0')
        {
         $('#availability').html('<span class="text-danger">Username not available</span>');
         $('#register').attr("disabled", true);
        }
        else
        {
         $('#availability').html('<span class="text-success">Username Available</span>');
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
  <div class="container box">
   <div class="form-group">
    <h3 align="center">Live Username Available or not By using PHP Ajax Jquery</h3><br />
    <label>Enter Username</label>
    <input type="text" name="username" id="username" class="form-control" />
    <span id="availability"></span>
    <br /><br />
    <button type="button" name="register" class="btn btn-info" id="register" disabled>Register</button>
    <br />
   </div>
   <br />
   <br />
  </div>
	<div class="container box">
	<div class="form-group">
		<input type="text" name="username" id="username" class="form-control" />
		<span id="availability"></span>
		<br /><br />
	</div></div>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มข้อมูล</button>
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
			<br /><br />
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
	    <script src="../../js/bootstrap.min.js"></script>
 </body>
</html>
