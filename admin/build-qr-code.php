<?php
session_start();
 include('../../phpqrcode/qrlib.php');
if($_SESSION['UserID'] == "")
	{
		header("location:login.php");
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>
		<style>
	body {
			background-color: #F8F8FF;
	}
	</style>
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Admin Page!!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">สร้าง QR-CODE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin/data/datamanage.php">จัดการข้อมูล</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">ออกจากระบบ</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Begin page content -->
    <main role="main" class="container">
      <div id="sites-canvas-main" class="sites-canvas-main">
<div id="sites-canvas-main-content">
<table xmlns="http://www.w3.org/1999/xhtml" cellspacing="0" class="sites-layout-name-one-column sites-layout-hbox"><tbody><tr><td class="sites-layout-tile sites-tile-name-content-1"><div dir="ltr"><div><br />
</div>
<div style="text-align:center">เว็บที่ใช้สร้าง QR-Code : <a href="http://tools.thaibizcenter.com/qrcode/" target="_blank" rel="nofollow">http://tools.thaibizcenter.com/qrcode/</a></div>
<div class="sites-embed-align-center-wrapping-off"><div class="sites-embed-border-on sites-embed sites-embed-full-width" style="width:100%;"><h4 class="sites-embed-title">สร้าง QR-Code</h4><div class="sites-embed-content sites-embed-type-ggs-gadget"><div><iframe title="สร้าง QR-Code" width="100%" height="600" scrolling="no" frameborder="0" id="465615323" name="465615323" allowtransparency="true" class="igm" src="javascript:void(0);"></iframe><script>JOT_postEvent('registerForRpc', this, ['-2765875429657321563', 465615323, '//jquer5njp5sb6h1mrbe78kjsjbudut64-a-sites-opensocial.googleusercontent.com/gadgets/ifr?url\x3dhttp://hosting.gmodules.com/ig/gadgets/file/110543442524307353585/include-gadget.xml\x26container\x3denterprise\x26view\x3ddefault\x26lang\x3dth\x26country\x3dALL\x26sanitize\x3d0\x26v\x3dbe87ba265ecdd6cc\x26libs\x3dcore:dynamic-height:settitle\x26mid\x3d9\x26parent\x3dhttps://sites.google.com/site/blmqrcode/srang-qr-code#up_pref_title\x3dInclude+gadget\x26up_pref_height\x3d600\x26up_pref_url\x3dhttps://qrcode.kaywa.com/\x26st\x3de%3DAIHE3cCl6arJyPGey9XL%252FSxzYYNzOGLgZ864lmsWsFzVu5EfA7hnCPnGsu5nd7RS2NoM9kKxhTYWd28JZnSkY3ASlcCghEwqFKRPRv2IO5XElXNdrr9hKlLMMtEuY653Y2O3nfDDWDlM%26c%3Denterprise\x26rpctoken\x3d-2765875429657321563'])</script></div></div></div></div><br /></div></td></tr></tbody></table>
</div>
</div>

<?php
  $fileName = md5($codeContents).'.png';
  $pngAbsoluteFilePath = 'img/'.$fileName;
  $urlRelativeFilePath = 'img/'.$fileName;
  if (!file_exists($pngAbsoluteFilePath))
       QRcode::png($codeContents, $pngAbsoluteFilePath);
 ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.slim.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
