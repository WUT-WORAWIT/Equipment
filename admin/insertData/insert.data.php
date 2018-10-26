<meta charset=utf-8" />
<?php
session_start();
require('../../config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$datasequence 		= $_POST['datasequence'];
$picstatus = '';
$datastatus = '';
$target_dir = SRV_ROOT."images";
$dataid 					= $_POST['dataid'];
$datalist		 			= $_POST['datalist'];
$dataproperty 		= $_POST['dataproperty'];
$dataunit 				= $_POST['dataunit'];
$databrand 				= $_POST['databrand'];
$datageneration 	= $_POST['datageneration'];
$datanummachine 	= $_POST['datanummachine'];
$dataprice 				= $_POST['dataprice'];
$dataacstdate 		= $_POST['dataacstdate'];
$dataseller 			= $_POST['dataseller'];
$datasubdivision 	= $_POST['datasubdivision'];
$dataname 				= $_POST['dataname'];
$databuilding 		= $_POST['databuilding'];
$dataclass 				= $_POST['dataclass'];
$dataRoom 				= $_POST['dataRoom'];
$dataroomname			= $_POST['dataroomname'];
$datacode 				= $_POST['datacode'];
$datacategory 		= $_POST['datacategory'];
$dataobtain 			= $_POST['dataobtain'];
$datacontractnumber = $_POST['datacontractnumber'];
$datacontractday 	= $_POST['datacontractday'];
$dataendwarranty 	= $_POST['dataendwarranty'];
$conn1 = mysqli_connect($server,$username,$password,$dbname);
	$check = "SELECT * FROM data  WHERE  data_id = '$dataid'";
	$result1 = mysqli_query($conn1,$check) or die(mysql_error());
	$num=mysqli_num_rows($result1);
        if($num > 0)
        {
             echo "<script>";
			 echo "alert('กรุณากรอกหมายเลขครุภัณฑ์ใหม่ที่ไม่ซ้ำด้วยครับ !!!');";
			 echo "window.location='../../admin/data/datamanage.php';";
          	 echo "</script>";

		}else{
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "INSERT INTO data (data_sequence,data_pic,data_id,data_list,data_property,data_unit,data_brand,data_generation,
	data_nummachine,data_price,data_acstdate,data_seller,data_subdivision,data_name,data_building,data_class,
	data_Room,data_roomname,data_code,data_category,data_obtain,data_contractnumber,data_contractday,data_endwarranty)
	VALUES ('".$datasequence."','".$_FILES["fileToUpload"]["name"]."','".$dataid."','".$datalist."','".$dataproperty."','".$dataunit."','".$databrand."',
		'".$datageneration."','".$datanummachine."','".$dataprice."','".$dataacstdate."','".$dataseller."','".$datasubdivision."',
		'".$dataname."','".$databuilding."','".$dataclass."','".$dataRoom."','".$dataroomname."','".$datacode."',
		'".$datacategory."','".$dataobtain."','".$datacontractnumber."','".$datacontractday."','".$dataendwarranty."')";
$query = mysqli_query($conn,$sql);
if($query) {
	$datastatus = 'OK';
}else {
	$datastatus = 'Failed';
}
echo "บันทึกข้อมูลเรียบร้อย ".$datastatus."</br>";
header('Refresh: 2; URL=../../admin/data/datamanage.php');
}
mysqli_close($conn);
?>
