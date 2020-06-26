<!DOCTYPE HTML>
<?php
include('header.php'); require_once('connect.php'); 
 ob_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
<style>
.container {width:300px; height:340px; margin:auto;background-color:#66666659; margin-top:25px; font-size:16px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;text-align: center;}
.text {width:200px; height:40px; margin-top:20px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 40px;padding-left: 15px;outline: none; }
.login {padding-top:20px; text-align:center;font-size:24px;color:#000; font-weight:bold;}
.submit {width:100px; height:35px;  margin-top:20px; background-color: #cc6f4d73; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s; }
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
.noti {text-align:center; color: #fd4747d6; font-size:15px;}
#a {padding-top: 8px;}
.fogot_pass {text-decoration: none; color: #000; margin-left: 20px;font-size: 12px;transition: transform .2s;font-weight: bold;}
.fogot_pass:hover {transform: scale(1.2);}
</style>
</head>
<body style="background-image: url(img/bg.jpg); background-repeat: no-repeat;">
<div class="container">
        <form method="post">
	        <div class="login">LOGIN</div>
	        <div><input type="email" name="email" placeholder="admin@trinhsydu.com" class="text" autofocus></div>
	        <div><input type="password" name="password" placeholder="*******" class="text"></div>
	        <div><input type="submit" name="submit" class="submit" value="Đăng nhập"><button class="submit" name="register" style="margin-left: 10px;">Đăng ký</button></div>
	        <div id="a"><a href="fogot_pass.php" class="fogot_pass">>Quên mật khẩu</a></div>
        </form>

<div class="noti">
<?php 
if (!empty($_SESSION['user'])) header('location:myaccount.php'); 
include('connect.php');
	if(isset($_POST['register'])) header('location:register.php');
    if(isset($_POST['submit']))
	{
	   $username=$_POST['email'];
	   $password=$_POST['password'];
	   if(empty($username)||empty($password)) echo "Vui lòng nhập đầy đủ thông tin vào các trường";
	   else
	   {
	   $sql="select * from khachhang where email='$username'";
	   $run=mysqli_query($conn,$sql);
	   $num=mysqli_num_rows($run);
	   if($num==1)
       {
       	   $_SESSION['user']=$username;
		   $row=mysqli_fetch_array($run);
		   $pass=$row['password'];
		   if($password==$pass) { header("Location:".$_SERVER['HTTP_REFERER']);}             
		   else echo "Sai password!";	
	   }
	   else echo "Sai tên đăng nhập!";
	 }}
?>
</div>
</div>
</body>
<?php 
;ob_end_flush();
?>
</html>