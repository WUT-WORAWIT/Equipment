<?php
session_start();
require('include/config.inc.php');
$datasequence 		= $_POST['datasequence'];
$picstatus = '';
$datastatus = '';
$target_dir = SRV_ROOT."images/";
$datalist					= $_POST['datalist'];
$dataid		        = $_POST['dataid'];
$dataplace 				= $_POST['dataplace'];
$datainstitution	= $_POST['datainstitution'];
$datanote	        = $_POST['datanote'];
$datastatus				= $_POST['datastatus'];

/* Mysql Insert */
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "INSERT INTO tb_repair (data_sequence,data_list,data_id,data_place,data_institution,data_note,data_status)
	VALUES ('".$datasequence."','".$datalist."','".$dataid."','".$dataplace."',
          '".$datainstitution."','".$datanote."','".$datastatus."')";
$query = mysqli_query($conn,$sql);


if($query) {
	$datastatus = 'OK';
}else {
	$datastatus = 'Failed';
}
$datasequence1 		= $_POST['datasequence1'];
$category = $_POST['category'];
echo "บันทึกข้อมูลเรียบร้อย ".$datastatus."</br>";
header('Refresh: 2; URL=http://192.168.43.76/Equipment/showdata1.php?id='.$datasequence1.'&category='.$category);
mysqli_close($conn);

?>
