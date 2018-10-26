<?php
require('include/config.inc.php');

$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_list ";
$query2 = mysqli_query($conn,$sql);

$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM data  ";
$query = mysqli_query($conn,$sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="images/machine-control-blue-114-160057.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>ข้อมูลครุภัณฑ์</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="css/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="font/fonts/thsarabunnew.css">
  </head>


  <body>
    <style>
    body {
      background-color: #F8F8FF;
      margin-left: -4px;
    }
    td{
      background-color: #EAEAEA;
    }
    table{
        font-family: 'THSarabunNew', sans-serif;
    }
    <?
    //ขนาดความกว้างของ table
    ?>
    th {
    table-layout: fixed;

    white-space: nowrap


    }
    th, td {
    margin-right:50px;
      font-size: 16px;

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

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background: linear-gradient(40deg,#2096ff,#05ffa3)!important;">
      <a class="navbar-brand" href="#">SNRU COMSCI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($_GET['c']==''){ echo "active'";}?>">
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
    <h3 style=" margin-left:45;"><B>หมวดหมู่</B></h3><br>
    <div class="btn-group"style=" margin-top:-15px;">
    <button type="button"class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="font-size: 16px;background: linear-gradient(40deg,#0A82FF,#2096ff)!important;"><B>เครื่องคอมพิวเตอร์<B></button>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
      <?php
      while ($obj=mysqli_fetch_array($query2,MYSQLI_ASSOC)){
      ?>
      <div class="list-group ">
      <a class="dropdown-item" href="showdata2.php?id=<?php echo $obj['data_id']?>&list=<?php echo $obj['data_list']?>"><?php echo $obj['data_list']?></a>
      </div>
    <?php } ?>
      <div class="dropdown-divider"></div>
    </div>
    <button class="btn btn-success " class="glyphicon glyphicon-print"style=" margin-left:20px ;font-size:16px; "onclick="printContent('div1')">พิมพ์</button>
  </div>
  <div class="table-responsive "id="div1" >
    <p style=" margin-top:-18px;margin-left:40px;" type="text"  name="btnsave"  id="btnsave" ><?=date('Y-m-d H:i:s')?></p>
      <br><h3 class="text-center "top"50px" left"50px" style=" margin-top: -12px;font-family:'THSarabunNew', sans-serif;font-weight: bold;" >  ตารางเครื่องคอมพิวเตอร์ </h3><br>
      <table class=" table-sm  table-hover " style=" "border="1" width="210%"  bordercolor="#000000"  >
        <thead style="background-color: #CFCFCF;">
      	<body>
          <tr align="center" style="margin-left: 80px; margin-top:50px;" >
            <th scope="col"><B>ที่</B></th>
            <th scope="col "><B>หมายเลขครุภัณฑ์</B></th>
            <th scope="col"><B>รายการ</B></th>
      			<th scope="col"><B>คุณสมบัติ</B></th>
            <th scope="col"><B>หน่วย</B></th>
      			<th scope="col"><B>ยี่ห้อ</B></th>
            <th scope="col"><B>รุ่น</B></th>
      			<th scope="col"><B>หมายเลขเครื่อง</B></th>
      			<th scope="col"><B>จำนวนเงิน</B></th>
      			<th scope="col"><B>วันที่ได้มา</B></th>
      			<th scope="col"><B>ผู้ขาย/ผู้รับจ้าง&nbsp;</B></th>
      			<th scope="col"><B>หน่วยงานย่อย</B></th>
      			<th scope="col"><B>ชื่อผูใช้งาน</B></th>
      			<th scope="col"><B>อาคาร</B></th>
      			<th scope="col"><B>ชั้น</B></th>
      			<th scope="col"><B>ห้อง</B></th>
      			<th scope="col"><B>ชื่อห้อง</B></th>
      			<th scope="col"><B>รหัสชุดเบิก</B></th>
      			<th style="width:10;"scope="col"><B>ประเภทงบประมาณ</B></th>
      			<th scope="col"><B>วิธีการที่ได้มา</B></th>
      			<th scope="col"><B>เลขที่สัญญา</B></th>
      			<th scope="col"><B>วันที่สัญญา</B></th>
      			<th scope="col"><B>สิ้นสุดรับประกัน</B></th>
          </tr>
        </thead>
        <tbody>

      		<?php
          $n=1;
      		while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
      		?>
          <tr>
            <th style="background-color: #EAEAEA"><?php echo $n;?></th>
            <td ><?php echo $obj['data_id']?></td>
            <td style="column-width:110px;white-space: normal; "><?php echo $obj['data_list']?></td>
      			<td><?php echo $obj['data_property']?></td>
      			<td><?php echo $obj['data_unit']?></td>
      			<td><?php echo $obj['data_brand']?></td>
      			<td><?php echo $obj['data_generation']?></td>
      			<td><?php echo $obj['data_nummachine']?></td>
      			<td><?php echo $obj['data_price']?></td>
      			<td><?php echo $obj['data_acstdate']?></td>
      			<td width="103"><?php echo $obj['data_seller']?></td>
      			<td><?php echo $obj['data_subdivision']?></td>
      			<td width="103"> <?php echo $obj['data_name']?></td>
      			<td><?php echo $obj['data_building']?></td>
      			<td><?php echo $obj['data_class']?></td>
      			<td><?php echo $obj['data_Room']?></td>
      			<td><?php echo $obj['data_roomname']?></td>
      			<td><?php echo $obj['data_code']?></td>
      			<td><?php echo $obj['data_category']?></td>
      			<td><?php echo $obj['data_obtain']?></td>
      			<td><?php echo $obj['data_contractnumber']?></td>
      			<td><?php echo $obj['data_contractday']?></td>
      			<td><?php echo $obj['data_endwarranty']?></td>
          </tr>
      <?php
      $n++;
      }
      ?>
        </tbody>
      </table>
      </div>
    </main><!-- /.container -->
</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
