
<?php
require('../include/config.inc.php');
$category = $_GET['category'];
switch ($category) {
  case 'cabinet':
    $tb = 'tb_cabinet';
    break;
  case 'chair':
    $tb = 'tb_chair';
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
$sql = "SELECT * FROM $tb ";
$box=$_POST['check_list'];
?>
<link rel="icon" type="image/x-icon" href="../images/machine-control-blue-114-160057.png">
<div class="container-fluid ">
<div class="row" >
<?php
for($i=0; $i<count($box); $i++){
$up_id = $box[$i];
$sql = "SELECT * FROM $tb WHERE data_sequence = '$up_id'";
$query = mysqli_query($conn,$sql);
echo"<table border=\"1\"  width=\"350\" ><tr >";
$intRows = 0;
while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
?>
<!doctype html>
<html lang="en">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body style="align:center;">
<style >
  table{margin-left: 12%;
    margin-top: 25;
    align:center;
  }
  td{
    align:center;
  }

</style>

  <?php echo "<td >";
    $intRows++; ?>

  <center>
    <p align = "center">

          <br></br><img  src="qrcode/qrcodegen/<?php echo $obj['data_pic'] ?>"width="130px" height="130px"  ><br>
          <b >รายการ :  <?php  echo $obj['data_list']; ?></b><br>
            <b >รหัสครุภัณฑ์ :  <?php  echo $obj['data_id']; ?></b><br>
      <br></br>
 </p >
        <?php
echo"</td>";
if(($intRows)%2==0)
{
echo"<tr>";
}

?>

<?php
}
echo"</tr></table>";
}

?>
</center>
</div>
</div></br>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
