<?php 
include('header.php');
session_start();
  ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Đổi mật khẩu</title>
<style>
.container {width:300px; height:250px; margin:auto;background-color:#66666659; margin-top:25px; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;}
.text {width:200px; height:40px; margin-left:50px; margin-top:10px; border-radius:20px; }
.login {padding-top:20px; text-align:center;font-size:24px;color:#000; font-weight:bold;}
.submit {width:150px; height:30px; margin-left:80px; margin-top:10px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;transition: transform .2s;}
.noti {text-align:center; color:#FFF; font-size:15px;}
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}

</style>
</head>
<body>
<div class="container">
        <form method="post">
	        <div class="login">Quên mật khẩu</div>
	        <div><input type="email" name="email" placeholder="  Nhập email" class="text"></div>
	        <div><input type="text" name="captra" placeholder="  Nhập mã xác thực từ email" class="text"></div>
	        <div><input type="submit" name="submit" class="submit" value="Lấy lại" ></div>
        </form>
<div class="noti">
<?php 
require_once('connect.php'); 
    if(isset($_POST['submit']))
	{
	   $email1=$_POST['email'];
	   $captra=$_POST['captra'];
	   if(empty($email1)) echo "Vui lòng nhập đầy đủ các trường!";
	   else
	   {
	   	$sql_select_data="select * from khachhang where email='$email1'";
	   	$run=mysqli_query($conn,$sql_select_data);
	   	$row=mysqli_fetch_array($run);
	   	$getemail=$row['email'];

	   	if($email1==$getemail)
	   	{
	   		$password_old=$row['password'];
	   		echo "password của bạn là: $password_old";
	   	}
	   	else echo "Email không tồn tại!";
	   }
	 }
?>
</div>
</div>
</body>
</html>
<?php 
include('footer.php');
?>
