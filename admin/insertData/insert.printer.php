<?php
session_start();
require('../../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
	$dataid1 = $_GET['h'];
	$list = $_GET['list'];
$datasequence 		= $_POST['datasequence'];
$picstatus = '';
$datastatus = '';
$datalist					= $_POST['datalist'];
$datasequence2	 	= $_POST['datasequence2'];
$dataid		        = $_POST['dataid'];
$dataplace 				= $_POST['dataplace'];
$datainstitution	= $_POST['datainstitution'];
$datanote	        = $_POST['datanote'];
/* Mysql Insert */
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "INSERT INTO tb_data (data_sequence,data_id2,data_id1,data_place,data_institution,data_note)
	VALUES ('".$datasequence."','".$dataid."','".$dataid1."','".$dataplace."','".$datainstitution."','".$datanote."')";
$query = mysqli_query($conn,$sql);
if($query) {
	$datastatus = 'OK';
}else {
	$datastatus = 'Failed';
}
echo "บันทึกข้อมูลเรียบร้อย ".$datastatus."</br>";
header("Refresh: 2; URL=../check.php?id=$dataid1&list=$list");
mysqli_close($conn);

?>
