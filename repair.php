<?php
require('include/config.inc.php');
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_repair  ";
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
    <title>รายงานซ่อมครุภัณฑ์</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/mdb.min.css" rel="stylesheet" /><link href="https://fonts.googleapis.com/css?family=Kanit|Roboto" rel="stylesheet" />
    <link rel="stylesheet" href="font/fonts/thsarabunnew.css">
  </head>



    <style>
    body {

      background-color: #F8F8FF;

    }
    table{
        font-family: 'THSarabunNew', sans-serif;
    }
    td{
      background-color: #EAEAEA;
      table-layout:fixed;
    white-space: nowrap;
    word-wrap: break-word;

    }
    <?
    //ขนาดความกว้างของ table
    ?>
    th {
      table-layout:fixed;
    }
    th, td {
      font-size: 16px;

    }
    </style>
    <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark aqua-gradient "style="background: linear-gradient(40deg,#2096ff,#05ffa3)!important;">
      <a class="navbar-brand" href="#">SNRU COMSCI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
    </br>
    <CENTER>
<br><h3 class="text-center "style="font-family: 'THSarabunNew', sans-serif;font-weight: bold;" > <b>ตารางรายงานซ่อมครุภัณฑ์ </b></h3><br>

        <?php
                    $pro_search = $_POST['pro_search'];
                    $p = '%'.$pro_search.'%';
                    $sql_s = "SELECT * FROM tb_repair WHERE data_id LIKE '$p'OR data_list LIKE '$p'" ;
                    $query = mysqli_query($conn,$sql_s);
          ?>
          <div class="container">
          <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm"action="repair.php"method="post"style="width:390px;">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="pro_search"type="search" placeholder="ค้นหารายการครุภัณฑ์ หรือ พ.ศ.">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">ค้นหา</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
          </div><br>

    <main role="main" class="container " >
      <table class=" table-sm table-hover " style="width:90%"border="1" bordercolor="#000000"  >
      	<thead style="background-color: #CFCFCF;">
      		<tr align="center">
      			<th style="width: 5%"><b>ลำดับที่</b></th>
      			<th style="width:14%"><b>รายการ</b></th>
      			<th style="width:10%"><b>หมายเลขครุภัณฑ์</b></th>
      			<th style="width:5%"scope="col" ><b>สถานที่ตั้ง</b></th>
      			<th style="width:7%"scope="col" ><b>หน่วยงาน</b></th>
      			<th style="width:20%"scope="col" ><b>หมายเหตุ</b></th>
      			<th style="width:7%"scope="col" ><b>สถานะ</b></th>

      		</tr>
      	</thead>
      	<tbody>
      		<?php
      		$n=1;
      		while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
      		?>
      		<tr class="table">
      			<td><?php echo $n;?></td>
      			<td class="i"><?php echo $obj['data_list']?></td>
      			<td ><?php echo $obj['data_id']?></td>
      			<td ><?php echo $obj['data_place']?></td>
      			<td ><?php echo $obj['data_institution']?></td>
      			<td ><?php echo $obj['data_note']?></td>

      			<?php if($obj['data_status']=="พร้อมใช้งาน"): ?><td  style="color:black;background-color: #65FFBA;">  <?php echo $obj['data_status']?> </td><?php endif;?>
            <?php if($obj['data_status']=="รอซ่อม"): ?><td style="background-color: #FFD1B7;">  <?php echo $obj['data_status']?> </td><?php endif;?>
            </form>
      		</tr>
      <?php
      $n++;
      }
      ?>
      	</tbody>
      </table><br></br>

        </main><!-- /.container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../js/jquery.slim.js"></script>
        <script src="../js/bootstrap.min.js"></script>
      </CENTER>
        </body>
      </html>
