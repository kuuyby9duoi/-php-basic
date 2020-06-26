<!DOCTYPE HTML>
<html>
<?php include('header.php');
require_once('connect.php'); 
ob_start();?>
<head>
<meta charset="utf-8">
<title>Bài 1</title>
<style type="text/css">
#all {width: 900px; height: 550px; background-color: #79797985; margin: auto; font-family: arial;margin-top: 100px; 
border-radius: 15px;color: #ffffffc2;}
#text1 {padding-top:20px; margin:auto; text-align:center; margin-top:80px; font-weight:bold;}
.text2 {height: 15px; color:#000000; margin-top:10px; width:250px; float:left; padding-left:10px;font-weight: bold; line-height: 25px;}
.inputtext { width: 400px;  margin-top: 10px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 35px;padding-left: 15px;}
.radio {width:15px; height:20px; margin-top:7px; margin-left: 30px; vertical-align: bottom;}
select {width:100px; height:20px; margin-top:10px;}
#button {text-align:center;  margin-top:15px;}
button {width: 100px; height: 40px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 20px; transition: transform .2s;}
button:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
select {border-radius: 10px; border: #80d894d6 1px solid; border-radius: 20px;padding-left: 8px; height: 25px;}
option {color: #fff;background-color: #cc6f4d73;}
option:hover {color: #000;background-color: #80d894d6;}
.noti {height: 15px;width: 800px; height: 80px; color:#ff0201bd;margin-left: 45px; margin-top:10px;padding-left:10px; line-height: 25px;border-radius: 20px;}
</style>
</head>
<body style="background-image: url(img/background.png);">
<form method="post">
    <div id="all">
    <div id="text1">THÊM KHÁCH HÀNG MỚI</div>
    <div class="text2">Tên khách hàng</div>
    <div><input type="text" name="name" class="inputtext" placeholder="Nguyễn Văn A"></div>
    <div class="text2">Giới tính</div>
    <div><input type="radio" name="gt" class="radio" value="Nam" checked>Nam 
         <input type="radio" name="gt"  class="radio" value="Nữ">Nữ</div>
    <div class="text2">Quê quán</div>
    <div> <select name="quequan" class="quequan">
    	<option selected>Chọn tỉnh</option>
    	<?php
    	$run_option=mysqli_query($conn,"select * from quequan");
    	while ($row_option=mysqli_fetch_array($run_option)){?>
                <option value="<?php echo $row_option['address']; ?>"><?php echo $row_option['address']; ?></option>
         <?php } ?>        
          </select></div>
    <div class="text2">Điện thoại:</div>
    <div><input type="number" name="sdt" class="inputtext" placeholder="0360000000"></div>
    <div class="text2">Email:</div>
    <div><input type="email" name="email" class="inputtext" placeholder="user@gmail.com"></div>
    <div class="text2">Sở thích:</div>
    <div><input type="checkbox" name="sothich[]" class="radio" value="Thẩm du">Thẩm du
         <input type="checkbox" name="sothich[]" class="radio" value="Cà khịa" checked>Cà khịa </div>
    <div class="text2">Mật khẩu:</div>
    <div><input type="password" name="password" class="inputtext" placeholder="**********"></div>
    <div class="text2">Nhập lại mật khẩu:</div>
    <div><input type="password" name="repassword" class="inputtext" placeholder="**********"></div>
    <div id="button">
         <button  name="login" value="login">Đăng nhập</button>
        <button type="reset" name="reset"  value="reset">Reset</button> 
        <button type="submit" name="submit"  value="Đăng ký">Đăng ký</button>
        </div>	
<div class="noti" >
<?php
if(isset($_POST['login'])) header('location:login.php');
if(isset($_POST['submit']))
{
echo "<style>.noti {background-color: #ffffffa8;}</style>";
$demsothich="";
$name=$_POST['name'];
$gioitinh=$_POST['gt'];
$address=$_POST['quequan'];
$phone=$_POST['sdt'];
$email=$_POST['email'];
$sothich=$_POST['sothich'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$path='upload/defaut.jpg';
$admin='false';
foreach($sothich as $i) 
{$demsothich .=$i."";}
 if(empty($name)||empty($address)||empty($phone)||empty($email)||empty($password)||empty($repassword)||$address=='Chọn tỉnh') echo "Vui lòng nhập đầy đủ thông tin vào các trường";
	   else
	   {
        if($password==$repassword){
            $sqlcheck="select * from khachhang where email='$email'";
            $runcheck=mysqli_query($conn,$sqlcheck);
            $numcheck=mysqli_num_rows($runcheck);
            if($numcheck==1) echo "email đã tồn tại!";
            else
            {
            $sql="insert into khachhang (name,gender,address,phone,email,hobby,password,path_avatar,admin) value('$name','$gioitinh','$address','$phone','$email','$demsothich','$password','$path','$admin')";
            $run=mysqli_query($conn,$sql);
            if($run) echo "Thêm mới thành công!";
            else echo "Không được nhé!";
            }}
        else echo "Mật khẩu và nhập lại mật khẩu không khớp!";}}?>
            
        </div>
   </div>
</form>
</body>
<footer style="margin-top: 150px;"><?php include('footer.php');ob_end_flush();?></footer>

</html>

