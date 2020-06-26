<!DOCTYPE html>
<?php  include('header.php');
if (empty($_SESSION['user'])) header('location:login.php'); 
else {
require_once('connect.php'); 
$email=$_SESSION['user'];
$id=$_GET['id'];

            $sql="select * from hoclai where id='$id'";
            $run=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($run);
            $row=mysqli_fetch_array($run);
            $name=$row['name'];
            $class=$row['class'];
            $mon=$row['mon'];
            $a=explode(' ',$mon);


    if(isset($_POST['save']))
    {
    
    $name1=$_POST['name'];
    $id1=$_POST['id'];
    $class1=$_POST['class'];
    $mon1=$_POST['mon'];
    $demmon="";
    foreach($mon1 as $i) 
{$demmon .=$i." ";}

    
     {
 $sql="update hoclai set id='$id1',name='$name1',class='$class1',mon='$demmon' where id='$id'";

    $run=mysqli_query($conn,$sql);echo "<script>alert('sửa thành công!');</script>";header("Refresh:0");}

    }
    



  } 




?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sửa học lại</title>

</head>
<body id="page-top">
    <div id="wrapper" style="margin-top: -23px;">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../admin_area.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="../myaccount.php"><i class="fas fa-user"></i><span>user</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_product.php?sldong=4&page=1"><i class="fas fa-table"></i><span>Sản phẩm</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_invoice.php?sldong=5&page=1"><i class="far fa-user-circle"></i><span>Hóa đơn</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_email.php?sldong=5&page=1"><i class="fas fa-user-circle"></i><span>Email</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                
        <div class="container-fluid">
            <h3 class="text-dark mb-4" style="padding-top: 10px;">Chỉnh sửa Hóa Đơn học lại</h3>
            <div class="row mb-3">
                <div class="col-lg-4">
                    <div class="card mb-3">




                        <form method="post" enctype="multipart/form-data">
                       
                    </div>
                    
                </div>
                <div class="col-lg-8">
                    <div class="row mb-3 d-none">
                        <div class="col">
                            <div class="card text-white bg-primary shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Sửa học lại</p>
                                </div>
                                <div class="card-body">
                                    




                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>Họ và tên:</strong></label><input class="form-control" type="text" name="name" value="<?php echo "$name"; ?>" size="40" ></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="email"><strong>ID:</strong></label><input class="form-control" type="text" name="id" value="<?php echo "$id" ?>"  ></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="address"><strong>Môn đăng ký:</strong></label>
                                                    <input type="checkbox" name="mon[]" value="PHP" style="margin-left: 20px;" <?php if(in_array('PHP',$a)) echo "checked='checked'" ; ?>>PHP   
                                                     <input type="checkbox" name="mon[]" class="gender" value="SQL" style="margin-left: 20px;" <?php if(in_array('SQL',$a)) echo "checked='checked'" ; ?> >SQL    <input type="checkbox" name="mon" class="gender" value="PHOTOSHOP" style="margin-left: 20px;" <?php if(in_array('PHOTOSHOP',$a)) echo "checked='checked'"; ?>>PHOTOSHOP
                                                     <input type="checkbox" name="mon[]" class="gender" value="JAVA" style="margin-left: 20px;" <?php if(in_array('JAVA',$a)) echo "checked='checked'"; ?>>JAVA
                                                     <input type="checkbox" name="mon[]" class="gender" value="ANDROID" style="margin-left: 20px;" <?php if(in_array('ANDROID',$a)) echo "checked='checked'"; ?>>ANDROID
                                                     <input type="checkbox" name="mon[]" class="gender" value="C#" style="margin-left: 20px;" <?php if(in_array('C#',$a)) echo "checked='checked'"; ?>>C#
                                                    <input type="checkbox" name="mon[]" class="gender" value="ASP.NET" style="margin-left: 20px;" <?php if(in_array('ASP.NET',$a)) echo "checked='checked'"; ?>>ASP.NET
                                                    <input type="checkbox" name="mon[]" class="gender" value="DOHOA" style="margin-left: 20px;" <?php if(in_array('DOHOA',$a)) echo "checked='checked'"; ?> >DOHOA
                                                </div>
                                            </div><br><br>
                                             </div>

                                         


                                            <div class="col">
                                             <div class="form-group"><label for="city"><strong>Lớp:</strong><br></label>
                                                    <select name="class" class="form-control">
                                                            <option value="Chọn lớp">Chọn lớp</option>
                                                            <?php
                                                            $run_option=mysqli_query($conn,"select * from class");
                                                            while ($row_option=mysqli_fetch_array($run_option)){?>
                                                            <option value="<?php echo $tinh=$row_option['name'];?>" <?php if($class==$row_option['name']) {echo "selected";} ?> ><?php echo $row_option['name']; ?></option>
                                                            <?php } ?>        
                                                    </select>
                                                </div>
                                        </div>
                                        
<div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="save">Lưu lại</button>
                                                                <button class="btn btn-primary btn-sm" type="reset" name="reset" value="reset">Reset</button>
                                                                <button class="btn btn-primary btn-sm" name="back" value="back"><a href="javascript:history.back()" style="text-decoration: none; color: #fff;">Quay lại</a></button>

                                        </div>



                                    </div>
                                </div>
                            </div>
                            
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © trinhsydu.com 2020</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>