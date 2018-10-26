<?php
session_start();
require('../../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);
$dataid1 = $_GET['h'];
$id = $_GET["id"];
if (isset($id)) {
	$sql = "DELETE FROM tb_data WHERE data_sequence = '".$id."' ";
	$query = mysqli_query($conn,$sql);
	  	if(mysqli_affected_rows($conn)) {
	  		 echo "ลบข้อมูลสำเร็จ";
	       header("location:../check.php?id=$dataid1");
	  	}
	  	mysqli_close($conn);
}else {
	header("location:../check.php?id=$dataid1");
}
?>
