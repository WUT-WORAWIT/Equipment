<?php
$id = $_GET["id"];
require('include/config.inc.php');
$category = $_GET['category'];
$id=$_GET['id'];
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM tb_list INNER JOIN tb_data ON tb_list.data_id= tb_data.data_id1 WHERE data_sequence = '".$id."'";
$query = mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">
    <title>Please Admin Login</title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet" /><link href="https://fonts.googleapis.com/css?family=Kanit|Roboto" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>
  <style>
  h5{
    white:500px;
  }
  body
  {
    background-color: #F8F8FF;
  }
  </style>


    <header style="margin-top:50px;">
           <!--Navbar-->
           <nav class="navbar fixed-top navbar-expand-lg navbar-dark aqua-gradient">

               <!-- Navbar brand -->
               <a class="navbar-brand" href="#">ข้อมูลครุภัณฑ์</a>

               <!-- Collapse button -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
           </nav>
           <?php
           while ($obj=mysqli_fetch_array($query,MYSQLI_ASSOC)){
           ?>
           <div class="modal-body">
           <form action="addrepair.php" method="post" enctype="multipart/form-data">
           <p>
             <img src="admin/qrcode/qrcodegen/<?php echo $obj['data_pic'] ?>"width="150px" height="150px" style="margin-top:0px; margin-left:34%;" ><br><br>
             <b>รหัสครุภัณฑ์ : <?php  echo $obj['data_id2']; ?></b><br>
             <b>รายการ : <?php  echo $obj['data_list']; ?></b><br>
             <b>สถานที่ตั้ง : <?php  echo $obj['data_place']; ?></b><br>
             <b>หน่วยงาน : <?php  echo $obj['data_institution']; ?></b><br>
           </p>
            <!--<textarea type="label" rows="4" cols="50" name="datalist" class="form-control" ><?php echo $obj['data_list']?></textarea>-->
            <style>
      td.top {
        background-color: #000080;
        text-align: right;
      }

      td.bottom {
        background-color: #F8F8FF;
        padding: 15px;
      }

      </style>
      <script>
      var y1 = 100;   // ตำแหน่งให้แสดงกล่องนับจากข้างบน (เลขยิ่งมาก ยิ่งอยู่ล่าง)
      (document.getElementById) ? dom = true : dom = false;

      function hideIt() {
        if (dom) {document.getElementById("layer1").style.visibility='hidden';}
        if (document.layers) {document.layers["layer1"].visibility='hide';} }

      function showIt() {
        if (dom) {document.getElementById("layer1").style.visibility='visible';}
        if (document.layers) {document.layers["layer1"].visibility='show';} }

      function placeIt() {
        if (dom && !document.all) {document.getElementById("layer1").style.top = window.pageYOffset + (window.innerHeight - (window.innerHeight-y1))}
        if (document.layers) {document.layers["layer1"].top = window.pageYOffset + (window.innerHeight - (window.innerHeight-y1))}
        if (document.all) {document.all["layer1"].style.top = document.body.scrollTop + (document.body.clientHeight - (document.body.clientHeight-y1));}
        window.setTimeout("placeIt()", 10); }

      window.onload=placeIt;
      onResize="window.location.href = window.location.href"
      </script>
            <!-- ตั้งค่าขนาดหน้าต่างที่บรรทัดด้านล่างนี้ครับ
      โดย left คือ ตำแหน่งจากด้านซ้าย (ยิ่งมากยิ่งซ้าย) ส่วนตำแหน่งจากด้านบนแก้ที่ด้านบนของ Code นี้
      -->
      <div id="layer1"  style="position:absolute; left:18px; width:315px; height:100px; top:400px;visibility:hidden; margin-bottom:100px;">
      <table border="1" cellspacing="0" cellpadding="3" >
       <tr >
        <td class="top" >
             <a  href="javascript:hideIt()" style="text-decoration: none"><font face="MS Sans Serif" size="2" color="#ffffff"><b>ปิดหน้าต่าง</b></font></a>
        </td>

       </tr>
       <tr>
        <td class="bottom">

        <!-- เริ่มต้นใส่ Code ข้อความในกล่องที่นี่ -->
        <div class="container">
      <div class="row">
        <div class="col-md-12">

          <form class="" action="comment_db.php" method="post">
            <div class="form-group">
              <div class="col-sm-2" align="right"></div>
                <div class="col-sm-8" align="left">

                  <input type="hidden" name="category" value="<?php echo $category; ?>">
                 <input type="hidden" name="datasequence1" value="<?php echo $id; ?>">
                 <input type="hidden" name="dataid" value="<?php echo $obj['data_id2']; ?>">
                 <input type="hidden" name="datalist" value="<?php echo $obj['data_list']; ?>">
                 <input type="hidden" name="dataplace" value="<?php echo $obj['data_place']; ?>">
                 <input type="hidden" name="datainstitution" value="<?php echo $obj['data_institution']; ?>">
                 <input type="hidden" name="datastatus" value="รอซ่อม">
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
        <div class="form-group">
          <p class="text-center "style="font-family: 'THSarabunNew', sans-serif;font-weight: bold; margin-top:-8px;"> <b>กรุณากรอกรายละเอียดการแจ้งซ่อม</b></p><br>
        <textarea rows="4" cols="50" style="height:100px;" name="datanote"  class="form-control" required></textarea>
        </div>
        <!-- สิ้นสุดการใส่ Code ข้อความในกล่องที่นี่ -->


            <a href="javascript:hideIt()" type="button"  style="margin-left:30px;margin-top :20px;" class="btn btn-success" ><b>ยกเลิก</b></a>
            <input type="submit"  style="margin-left:10px;margin-top :20px;" id="register"value="บันทึก" class="btn btn-primary" >
          </form>
          </div>
        </td>
       </tr>
      </table>
      <br>
      </font>
      </div>
      <form>
        <input type="button"  style="margin-left:88px;margin-top :20px;" value="เเจ้งซ่อมครุภัณฑ์" class="btn btn-success" onClick="showIt()">
      </form>
       </header>
    <?php } ?>
    <script src="js/jquery.slim.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>

      </html>
