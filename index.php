<?php
require('include/config.inc.php');
$conn = mysqli_connect($server,$username,$password,$dbname);
//$sql = "SELECT * FROM slide ORDER BY slide_id ASC";
//$query = mysqli_query($conn);//,$sql
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="images/machine-control-blue-114-160057.png">

    <title>ระบบตรวจสอบครุภัณฑ์</title>
    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/mdb.min.css" rel="stylesheet" /><link href="https://fonts.googleapis.com/css?family=Kanit|Roboto" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <!--<body background="images/computer.png"style="width:1200;">-->
    <style>

    footer {
          color: white;
          padding: 15px;
        }
        body {
          background-image: url("http://com.snru.ac.th/wp-content/uploads/2017/10/737.jpg"); background-position: center center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;
          top :50px;
          background-size:1366px 720px;
        	margin: auto;
        	text-align: left;
        	min-width:96px;
          width :12;
          height: 300;
        }

div .im{
  height:100%;
}
.bg-dark1{
  background: -webkit-linear-gradient(50deg,#45cafc,#303f9f);
  background: linear-gradient(40deg,#2096ff,#05ffa3);
}
        pmain-wrapper {
          margin-top: 12PX;
        	width: 100%;
        	height:500px;
        	background-color:#c4d1de;
        }
        .pmain-content {
        	width: 960px;
        	margin: 0 auto;
        }

    </style>

    <div class="img-holder fixed-top "style="margin-top:-15PX; margin-left:14.5%;"><img src="images/Untitled1.jpg" alt="image description "width="959" height="150" alt="Smarty Template Engine">
    <div class="caption">
    <div class="container">
    <div class="row">
    <div class="col-sm">
    <div class="text full">
    </div></div></div></div></div></div>

     <header>
    <nav style="margin-top: 130px;font-weight:normal ; width:959px;margin-left:14.5%;" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark1">
      <a class="navbar-brand" href="#">SNRU COMSCI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data.php?c=dhamm&p=list">ข้อมูลครุภัณฑ์</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="repair.php?c=nature&p=list">รายงานซ่อมครุภัณฑ์</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/login.php">Admin</a>
          </li>
          </ul>
        </div>
      </nav>
     </header>
  <script src="Scripts/jquery.tools.min.js"></script>

  <link href="Scripts/intro.css" rel="stylesheet" type="text/css">

  <div id="pmain-wrapper" style="margin-left:-9.2px;">
  <div class="pmain-content">
  <div class="intro_block"style="margin-top:105PX;">
  	<div class="main_view">
  		<div class="window" style="height:430px">
    			<div class="image_reel img-resize">
  				<img src="images/1.jpg"height="440"width="959"   alt="" />
  				<img src="images/2.jpg"  height="440" width="959"   alt="" />
  				<img style="background-color:#c4d1de;"height="440"src="http://compucomputers.com/wp-content/uploads/2017/06/bunch_of_computer_stuff_1920x700.png" alt="NEW DEALS EVERYDAY!"width="959"   alt="" />
  				<!--<img src="images/slide_two.jpg"   width="959"   alt="" />
  				<img src="images/slide_five.jpg"  width="959"   alt="" />
  				<img src="images/slide_two.jpg"   width="959"   alt="" />
  				<img src="images/slide_one.jpg"   width="959"   alt="" />
  				<img src="images/slide_five.jpg"  width="959"   alt="" />-->
    			</div>
  		</div>
  	</div>
    	 <div class="paging">
  	  	<a href="#" rel="1">1</a>
  	  	<a href="#" rel="2">2</a>
  	  	<a href="#" rel="3">3</a>
  	  	<!--<a href="#" rel="4">4</a>
  	  	<a href="#" rel="5">5</a>
  		  <a href="#" rel="6">6</a>
  	  	<a href="#" rel="7">7</a>
  		<a href="#" rel="8">8</a>-->
  	</div>
    </div>
    </div>
  </div>

  <script type="text/javascript">
$(document).ready(function() {

	//Set Default State of each portfolio piece
	$(".paging").show();
	$(".paging a:first").addClass("active");

	//Get size of images, how many there are, then determin the size of the image reel.
	var imageWidth = $(".window").width();
	var imageSum = $(".image_reel img").size();
	var imageReelWidth = imageWidth * imageSum;

	//Adjust the image reel to its new size
	$(".image_reel").css({'width' : imageReelWidth});

	//Paging + Slider Function
	rotate = function(){
		var triggerID = $active.attr("rel") - 1; //Get number of times to slide
		var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

		$(".paging a").removeClass('active'); //Remove all active class
		$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

		//Slider Animation
		$(".image_reel").animate({
			left: -image_reelPosition
		}, 1500 );

	};
	//Rotation + Timing Event
	rotateSwitch = function(){
		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			$active = $('.paging a.active').next();
			if ( $active.length === 0) { //If paging reaches the end...
				$active = $('.paging a:first'); //go back to first
			}
			rotate(); //Trigger the paging and slider function
		}, 5000); //Timer speed in milliseconds (7 seconds)
	};

	rotateSwitch(); //Run function on launch

	//On Hover
	$(".image_reel a").hover(function() {
		clearInterval(play); //Stop the rotation
	}, function() {
		rotateSwitch(); //Resume rotation
	});
	//On Click
	$(".paging a").click(function() {
		$active = $(this); //Activate the clicked paging
		//Reset Timer
		clearInterval(play); //Stop the rotation
		rotate(); //Trigger rotation immediately
		rotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});
});
</script>

              <footer class="container-fluid text-center fixed-bottom" style="background: linear-gradient(40deg,#2096ff,#05ffa3)!important;margin-bottom;height:50px; width:959px;margin-left:14.5%;">
          <div id="text-wrapper">
          <div class="text-content fixed-bottom"><table width="959" border="0"style="  margin-left:14.5% ;margin-bottom: 5px;" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td><h5><marquee behavior="scroll" direction="left">ยินดีต้อนรับเข้าสู่เว็บไซต์ตรวจสอบครุภัณฑ์</marquee></h5></td>
            </tr>
          </tbody></table>
          </div>
        </div></footer>




      </body>
      </html>
