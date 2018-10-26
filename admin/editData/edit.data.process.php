<?php
session_start();
require('../../include/config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:../login.php");
	}
$conn = mysqli_connect($server,$username,$password,$dbname);
$picstatus = '';
$datastatus = '';
$picname = '';

$sql =  "UPDATE data SET data_id ='".$_POST['dataid']."',data_list ='".$_POST['datalist']."',
data_property ='".$_POST['dataproperty']."',data_unit ='".$_POST['dataunit']."',data_brand ='".$_POST['databrand']."'
,data_generation ='".$_POST['datageneration']."',data_nummachine ='".$_POST['datanummachine']."',data_price ='".$_POST['dataprice']."'
,data_acstdate ='".$_POST['dataacstdate']."',data_seller ='".$_POST['dataseller']."',data_subdivision ='".$_POST['datasubdivision']."'
,data_name ='".$_POST['dataname']."',data_building ='".$_POST['databuilding']."',data_class ='".$_POST['dataclass']."'
,data_Room ='".$_POST['dataRoom']."',data_roomname ='".$_POST['dataroomname']."',data_code ='".$_POST['datacode']."'
,data_category ='".$_POST['datacategory']."',data_obtain ='".$_POST['dataobtain']."',data_contractnumber ='".$_POST['datacontractnumber']."'
,data_contractday ='".$_POST['datacontractday']."',data_endwarranty ='".$_POST['dataendwarranty']."'
WHERE data_sequence = '".$_POST['id']."'" ;

	$query = mysqli_query($conn,$sql);
  if($query) {
  	$datastatus = 'OK';
  }else {
  	$datastatus = 'Failed';
  }
echo "อัพเดข้อมูล ".$datastatus."</br>";
header('Refresh: 2; URL=../../admin/data/datamanage.php');
	mysqli_close($conn);
?>
