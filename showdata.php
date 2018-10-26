
<?php
require('include/config.inc.php');
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
  case 'circu':
    $tb = 'tb_circu';
    break;
}
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM $tb ";
$query = mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="images/machine-control-blue-114-160057.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ข้อมูลครุภัณฑ์</title>
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php echo $objtitle;?></title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font/fonts/thsarabunnew.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>


  <body>
    <style>
    body {
      background-color: #F8F8FF;

    }
    table{
        font-family: 'THSarabunNew', sans-serif;
    }

    th {
    	table-layout:fixed;
    white-space: nowrap;

    }
    td{
      table-layout:fixed;
      white-space: nowrap;
      background-color: #EAEAEA;
    }
    	th, td {
    			font-size: 14px;
    	}
    </style>
    <script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}</script>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark aqua-gradient "style="background: linear-gradient(40deg,#0066FF,#05ffa3)!important;">
      <a class="navbar-brand" href="#">SNRU COMSCI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($_GET['c']==''){ echo "active'";}?>" >
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if($_GET['c']=='dhamm'){ echo "active";}?>">
            <a class="nav-link" href="data.php?c=dhamm&p=list">ข้อมูลครุภัณฑ์</a>
            </li>
          <li class="nav-item <?php if($_GET['c']=='nature'){ echo "active";}?>">
            <a class="nav-link" href="repair.php?c=nature&p=list">รายงานซ่อมครุภัณฑ์</a>
            </li>
          <li class="nav-item <?php $_GET['c']=='culture'?>">
            <a class="nav-link" href="admin/login.php">Admin</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container " >
      <body class="container ">
      <h3 style=" margin-left:65px ;"><B>หมวดหมู่</B></h3></br>
      <div class="form-group"class="container "style=" margin-left:65px ;margin-top:-17px;">
      <div class="btn-group" >
        <?
        if($tb =='tb_printer'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>เครื่องปริ้นเตอร์<B></button>
        <?}else if($tb =='tb_rack'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>ตู้เเร็ก<B></button>
        <?}else if($tb == 'tb_sliding'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>ตู้บานเลื่อน<B></button>
        <?}else if($tb == 'tb_computer'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>โต๊ะวางเครื่องคอมพิวเตอร์<B></button>
        <?}else if($tb == 'tb_cabinet'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>ตู้<B></button>
        <?}else if($tb == 'tb_steel'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>ตู้เหล็ก<B></button>
        <?}else if($tb == 'tb_circu'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>กล้องโทรทัศน์วงจรปิด<B></button>
        <?}else if($tb == 'tb_table'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>โต๊ะประชุมรูปไข่<B></button>
        <?}else if($tb == 'tb_document'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>ชั้นวางเอกสาร<B></button>
        <?}else if($tb == 'tb_dcabinet'){?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>ตู้เก็บเอกสารบานเลื่อนกระจก<B></button>
        <?}else {?>
        <button type="button"  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>เก้าอี้ทำงาน<B></button>
        <?}?>
      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute;  top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
        <a class="dropdown-item" href="data.php?&category=printer&c=dhamm&p=list">เครื่องคอมพิวเตอร์</a>
        <a class="dropdown-item" href="showdata.php?&category=printer&c=dhamm&p=list">เครื่องปริ้นเตอร์</a>
        <a class="dropdown-item" href="showdata.php?&category=rack&c=dhamm&p=list">ตู้เเร็ก</a>
        <a class="dropdown-item" href="showdata.php?&category=sliding&c=dhamm&p=list">ตู้บานเลื่อน</a>
        <a class="dropdown-item" href="showdata.php?&category=computer&c=dhamm&p=list">โต๊ะวางเครื่องคอมพิวเตอร์</a>
        <a class="dropdown-item" href="showdata.php?&category=cabinet&c=dhamm&p=list">ตู้</a>
        <a class="dropdown-item" href="showdata.php?&category=steel&c=dhamm&p=list">ตู้เหล็ก</a>
        <a class="dropdown-item" href="showdata.php?&category=circu&c=dhamm&p=list">กล้องโทรทัศน์วงจรปิด</a>
        <a class="dropdown-item" href="showdata.php?&category=table&c=dhamm&p=list">โต๊ะประชุมรูปไข่</a>
        <a class="dropdown-item" href="showdata.php?&category=document&c=dhamm&p=list">ชั้นวางเอกสาร</a>
        <a class="dropdown-item" href="showdata.php?&category=dcabinet&c=dhamm&p=list">ตู้เก็บเอกสารบานเลื่อนกระจก</a>
        <a class="dropdown-item" href="showdata.php?&category=chair&c=dhamm&p=list">เก้าอี้ทำงาน</a>

       </div>
    </div>
    <button class="btn btn-success "  style="font-size:16px;"style=" margin-left:20px ;"onclick="printContent('div1')"><i class="glyphicon glyphicon-print"></i>พิมพ์</button>
    </div>

      <div class="table-responsive container" id="div1">
<?php
        if($tb == 'tb_printer'){?>
        <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -1px;font-family:'THSarabunNew', sans-serif; font-weight: bold;" >  ตารางเครื่องปริ้นเตอร์ </h3><br>
        <?}else if($tb == 'tb_rack'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" > ตารางตู้เเร็ก </h3><br>
        <?}else if($tb == 'tb_sliding'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" > ตารางตู้บานเลื่อน </h3><br>
        <?}else if($tb == 'tb_computer'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางโต๊ะวางเครื่องคอมพิวเตอร์ </h3><br>
        <?}else if($tb == 'tb_cabinet'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางตู้ </h3><br>
        <?}else if($tb == 'tb_steel'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางตู้เหล็ก </h3><br>
        <?}else if($tb == 'tb_circu'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางกล้องโทรทัศน์วงจรปิด </h3><br>
        <?}else if($tb == 'tb_table'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางโต๊ะประชุมรูปไข่ </h3><br>
        <?}else if($tb == 'tb_document'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางชั้นวางเอกสาร </h3><br>
        <?}else if($tb == 'tb_dcabinet'){?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางตู้เก็บเอกสารบานเลื่อนกระจก </h3><br>
        <?}else {?>
          <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางเก้าอี้ทำงาน </h3><br>
        <?}?>
      <table class=" table-sm table-hover container"style="width:90%;" border="1"bordercolor="#000000"   >
        <thead style="background-color: #CFCFCF;">
          <tr align="center" >
            <th style="width:2%" scope="col"><B>ลำดับที่</B></th>
            <th style="width:15%"scope="col"><B>รายการ</B></th>
            <th style="width:4.5%"scope="col"><B>เครื่องที่ </B></th>
            <th style="width:4.5%"scope="col"><B>หมายเลขครุภัณฑ์</B></th>
      			<th style="width:7%"scope="col"><B>สถานที่ตั้ง</B></th>
            <th style="width:10%"scope="col"><B>หน่วยงาน</B></th>
      			<th style="width:15%"scope="col"><B>หมายเหตุ</B></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $n=1;
          while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
          ?>
          <tr>
            <td><?php echo $n;?></td>
            <td><?php echo $obj['data_list']?></td>
            <td><?php echo $n;?></td>
      			<td><?php echo $obj['data_id']?></td>
      			<td><?php echo $obj['data_place']?></td>
      			<td><?php echo $obj['data_institution']?></td>
      			<td><?php echo $obj['data_note']?></td>
          </tr>
      <?php
      $n++;
      }
      ?>
        </tbody>
      </table>
      </div>
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>

</html>
