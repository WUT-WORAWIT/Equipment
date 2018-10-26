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
switch ($category) {
  case 'cabinet':
    $tb = 'tb_cabinet';
    break;
  case 'chair':
    $tb = 'tb_chair';
    break;
	case 'circu':
		$tb = 'tb_circu';
		break;
  case 'computer':
    $tb = 'tb_computer';
    break;
  case 'dcabinet':
    $tb = 'tb_dcabinet';
    break;
  case 'document':
    $tb = 'tb_document';
    break;
  case 'printer':
    $tb = 'tb_printer';
    break;
  case 'rack':
    $tb = 'tb_rack';
    break;
  case 'sliding':
    $tb = 'tb_sliding';
    break;
  case 'steel':
    $tb = 'tb_steel';
    break;
  case 'table':
    $tb = 'tb_table';
    break;
  case 'data':
    $tb = 'data';
    break;
}
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM $tb WHERE data_sequence = '".$id."'";
$query = mysqli_query($conn,$sql);
$obj=mysqli_fetch_array($query,MYSQLI_ASSOC);


$PNG_WEB_DIR = 'qrcodegen/';

$filename = $PNG_WEB_DIR.$category.$id.'.png';
$filenamepic = $category.$id.'.png';
$errorCorrectionLevel = 'Q';
$matrixPointSize = 8;
QRcode::png('http://192.168.43.76/Equipment/show.php?id='.$id.'&category='.$category, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "UPDATE $tb SET data_pic = '".$filenamepic."' WHERE data_sequence = '".$id."'";
$query = mysqli_query($conn,$sql);

switch ($category) {
  case 'cabinet':
    header("Location:../data/datacabinet.php");
    break;
  case 'chair':
    header("Location:../data/dataChair.php");
    break;
	case 'circu':
		header("Location:../data/dataCircu.php");
		break;
  case 'computer':
    header("Location:../data/dataComputer_desk.php");
    break;
  case 'dcabinet':
    header("Location:../data/dataDocument_cabinet.php");
    break;
  case 'document':
    header("Location:../data/dataDocument_racks.php");
    break;
  case 'printer':
    header("Location:../data/dataPrinter.php");
    break;
  case 'rack':
    header("Location:../data/dataRack.php");
    break;
  case 'sliding':
    header("Location:../data/dataSliding.php");
    break;
  case 'steel':
    header("Location:../data/dataSteel_cabinet.php");
    break;
  case 'table':
    header("Location:../data/dataTable.php");
    break;
  case 'data':
    header("Location:../data/datamanage.php");
    break;
}

?>
