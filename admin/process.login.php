<?php
session_start();
require('../include/config.inc.php');
$adminuser = $_POST['username'];
$adminpassword = $_POST['password'];
$conn = mysqli_connect($server,$username,$password,$dbname);
$sql = "SELECT * FROM admin WHERE admin_user = '".$adminuser."' AND admin_password = '".$adminpassword."' ";
$query = mysqli_query($conn,$sql);
$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if(!$result)
	{
			echo "Username and Password Incorrect!";

	}
	else
	{
			$_SESSION["UserID"] = $result["admin_id"];
			session_write_close();
      header("location:admin.php");
	}
mysqli_close($conn);

?>
