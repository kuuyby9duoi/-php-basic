<!DOCTYPE HTML>
<?php ob_start();session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<title>Tài khoản</title>
<style>
* {margin: 0px; padding: 0px;}
body,html {background-color: #f2f2f2;	margin: 0;padding: 0;width: 100%;height: 100%; }

.container {width:60%;  margin:auto; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;text-align: center;position: relative; top: -1500px;}


.submit {width:150px; height:35px; margin-top:20px; background-color: #c12a2ab0; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s;margin-right: 30px; }
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
.noti {text-align:center; color: #fd4747d6; font-size:15px;}
#a {padding-top: 8px;}
.logo1 {width: 300px; height: 130px;}
.passss {position: relative;bottom: 50px;left: 210px; width: 60px;}
.left {height: 50px;line-height: 35px; margin-left: 20px; position: relative;margin-top: 150px;list-style: none;width: 10%; background-color: #c12a2ab0;padding-left: 10px;}
.right {height: 50px;line-height: 35px;position: relative;margin-top: 150px;left:88%;bottom:790px;list-style: none;width: 10%;background-color: #c12a2ab0; padding-left: 10px;}
li {border-radius: 10px; font-weight: bold;display: block;}
a {text-decoration: none;color: #000;}
</style>
</head>
<body>
<ul>
	<li class="left"><a href="edit_pin.php"> Đổi PIN </a></li>
	<li class="left">Thanh Toán Hóa Đơn</li>
	<li class="left">In Sao Kê</li>
	<li class="left"><a href="van_tin.php">Vấn Tin Tài Khoản</a></li>
</ul>
<ul>
	<li class="right"><a href="rut_tien.php">Rút Tiền</a></li>
	<li class="right"><a href="chuyen_khoan.php">Chuyển Khoản</a></li>
	<li class="right">Cá Nhân</li>
	<li class="right"><form method="post"><input type="submit" name="logout" value="Đăng xuất" style="border: none;background-color: #c12a2a00;font-weight: bold;font-size: 16px;"> </li>

</ul>
<div class="container">
        <img src="img/background.jpg" height="50%">

<div class="noti">
<?php 
if(isset($_POST['logout'])){unset($_SESSION['user']); header('location:login.php');}
include('act.php');
    if(isset($_POST['login']))
	{
	   if(empty($_POST['stk'])||empty($_POST['password'])) echo "Quý khách vui lòng nhập đầy đủ thông tin đăng nhập!";
	   else
	   {
	   $test=select_user($_POST['stk'],$_POST['password']);
	 }}
?>
</div>
</div>
</body>
<div class="footer" style="position: relative;bottom: 1815px;"><img src="img/footer.png" width="100%" ></div>
<?php ob_end_flush(); ?>
</html>