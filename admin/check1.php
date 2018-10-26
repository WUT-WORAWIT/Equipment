<?php
//check.php
require('../config.inc.php');
$category = $_GET['category'];
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
$conn1 = mysqli_connect($server,$username,$password,$dbname);
if(isset($_POST["data_id"]))
{
  $username = mysqli_real_escape_string($conn1, $_POST["data_id"]);
 $check = "SELECT * FROM $tb  WHERE  data_id ='".$username."'";
 $result1 = mysqli_query($conn1,$check);
 echo mysqli_num_rows($result1);
}
?>
