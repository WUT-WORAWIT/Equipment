<?php
session_start();
include('../../phpqrcode/qrlib.php');
require('../../config.inc.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
$category = $_GET['category'];
$id=$_GET['id'];

$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_data  WHERE data_sequence = '".$id."'";
$query = mysqli_query($conn,$sql);
$obj=mysqli_fetch_array($query,MYSQLI_ASSOC);


$PNG_WEB_DIR = 'qrcodegen/';

$filename = $PNG_WEB_DIR.$id.'.png';
$filenamepic = $id.'.png';
$errorCorrectionLevel = 'Q';
$matrixPointSize = 8;
QRcode::png('http://192.168.43.76/Equipment/showdata1.php?id='.$id.'&category='.$category, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "UPDATE tb_data SET data_pic = '".$filenamepic."' WHERE data_sequence = '".$id."'";
$query = mysqli_query($conn,$sql);


    header("Location:../check.php?id=$category");

?>
