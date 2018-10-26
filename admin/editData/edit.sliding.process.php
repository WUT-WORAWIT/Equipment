<?php
session_start();
require('../../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:../login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);

$datastatus = '';
$sql =  "UPDATE tb_sliding SET data_list ='".$_POST['datalist']."',
data_sequence2 ='".$_POST['datasequence2']."',data_id ='".$_POST['dataid']."',data_place ='".$_POST['dataplace']."'
,data_institution ='".$_POST['datainstitution']."',data_note ='".$_POST['datanote']."'WHERE data_sequence = '".$_POST['id']."'" ;

	$query = mysqli_query($conn,$sql);
  if($query) {
  	$datastatus = 'OK';
  }else {
  	$datastatus = 'Failed';
  }
echo "อัพเดข้อมูล ".$datastatus."</br>";
header('Refresh: 2; URL=../../admin/data/dataSliding.php');
	mysqli_close($conn);
?>
