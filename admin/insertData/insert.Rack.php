<?php
session_start();
require('../../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$datasequence 		= $_POST['datasequence'];
$picstatus = '';
$datastatus = '';
$target_dir = SRV_ROOT."images";
$datalist					= $_POST['datalist'];
$datasequence2	 	= $_POST['datasequence2'];
$dataid		        = $_POST['dataid'];
$dataplace 				= $_POST['dataplace'];
$datainstitution	= $_POST['datainstitution'];
$datanote	        = $_POST['datanote'];
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$_FILES["fileToUpload"]["name"]))
{
	$picstatus = 'OK';
}
else {
	$picstatus = 'Failed';
}
/* Mysql Insert */
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "INSERT INTO tb_rack (data_sequence,data_pic,data_list,data_sequence2,data_id,data_place,data_institution,data_note)
	VALUES ('".$datasequence."','".$_FILES["fileToUpload"]["name"]."','".$datalist."','".$datasequence2."','".$dataid."','".$dataplace."',
          '".$datainstitution."','".$datanote."')";
$query = mysqli_query($conn,$sql);
if($query) {
	$datastatus = 'OK';
}else {
	$datastatus = 'Failed';
}
echo "บันทึกข้อมูลเรียบร้อย ".$datastatus."</br>";
header('Refresh: 2; URL=../../admin/data/dataRack.php');
mysqli_close($conn);

?>
