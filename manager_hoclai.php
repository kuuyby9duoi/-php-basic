<!DOCTYPE html>
<?php 
include('header.php'); require_once('connect.php'); 
$email1=$_SESSION['user'];
$check_admin=mysqli_query($conn,"select * from khachhang where email='$email1'");
$check=mysqli_fetch_array($check_admin);
$admin1=$check['admin'];$uid1=$check['id'];
if (empty($_SESSION['user'])||$admin1!='true') header('Location:myaccount.php');
ob_start(); $sl=$_GET['sldong'];  $page=$_GET['page']; ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quản lý học lại</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
</head>

<body id="page-top">
    <div id="wrapper" style="margin-top: -25px;">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../admin_area.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../myaccount.php"><i class="fas fa-user"></i><span>user</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="../manager_product.php?sldong=4&page=1"><i class="fas fa-table"></i><span>Sản phẩm</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_invoice.php?sldong=5&page=1"><i class="far fa-user-circle"></i><span>Hóa đơn</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_email.php?sldong=5&page=1"><i class="fas fa-user-circle"></i><span>Email</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               
            <div class="container-fluid">
                <h3 class="text-dark mb-4" style="padding-top: 20px;">Quản lý Bọn học lại </h3>


                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Công cụ:</p>
                            <button name='add' class="btn btn-primary btn-sm"><a href="dk_hoclai.php?id=<?php echo $uid1;?>" style="color: #fff;">Thêm</a></button>
                            <button name="print" class="btn btn-primary btn-sm" onclick="myFunction()">In ra</button><script> function myFunction() {window.print();}</script>
                            <button name="backs" class="btn btn-primary btn-sm"><a href="javascript:history.back()" style="color: #fff;">Quay lại</a></button>
<a class="btn btn-primary btn-sm d-none d-sm-inline-block" name="export" role="button" title="xuất ra file Excell" href="acc.php?acc=export&id=0"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Xuất .xlsx</a>
                            
                    </div>
                    <div class="card-body">
                        <div class="row">

                         <form method="get">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Số dòng hiển thị&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm" name="sldong"><option value="5" <?php if($sl==5) echo "selected"; ?>>5</option><option value="10" <?php if($sl==10) echo "selected"; ?>>10</option><option value="15" <?php if($sl==15) echo "selected"; ?>>15</option><option value="20" <?php if($sl==20) echo "selected"; ?>>20</option><option value="25" <?php if($sl==25) echo "selected"; ?>>25</option><option value="50" <?php if($sl==50) echo "selected"; ?>>50</option><option value="100" <?php if($sl==100) echo "selected"; ?>>100</option></select>&nbsp;</label></div><button type="submit" name="page" class="btn btn-primary btn-sm" value="1">Tải lại</button>
                            </div>
                         </form>

                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Mã SV</th>
                                        <th>Họ và tên</th>
                                        <th>lớp</th>
                                        <th>Môn</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                <?php $run=mysqli_query($conn,"select * from hoclai"); $num=mysqli_num_rows($run);  
                if($page==1) {$start=0; } else {$start=$page*$sl-$sl;}  ; 
                $run2=mysqli_query($conn,"select * from hoclai limit $start,$sl");
                while ($row_option=mysqli_fetch_array($run2)) { 
                    $mon=$row_option['mon'];
                    $a=explode(' ',$mon); $zz=count($a); if($zz>5)$zz=5; ?>

                <tr id="body_table">
                    <td><?php echo $row_option['id']; ?></td>
                    <td><?php echo $row_option['name']; ?></td>
                    <td><?php echo $row_option['class']; ?></td>
                    <td><?php for ($i=0; $i < $zz; $i++) {echo $a[$i]."<br>"; 
                    }  ?></td>
                    <td>
                        <a name="edit" style="font-size: 10px;" class="btn btn-primary btn-icon-split" role="button" href="edithoclai.php?id=<?php echo $row_option['id']; ?>" ><span class="text-white-50 icon"><i class="fas fa-flag"></i></span><span class="text-white text">Sửa</span></a>
                    
                        <a style="font-size: 10px;" class="btn btn-danger btn-icon-split" name="chmod" role="button" onclick="return confirm('Bạn có chắc xóa vĩnh viễn sản phẩm này?')" href="acc.php?id=<?php echo $row_option['id']; ?>&acc=delete_hoclai" title="xóa dell lấy lại đc luôn!"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Xóa</span></a>
                    </td>
                </tr>
                <?php } ?>  
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                         <td><strong>Mã SV</strong></td>
                                         <td><strong>Họ và tên</strong></td>
                                         <td><strong>lớp</strong></td>
                                         <td><strong>Môn</strong></td>
                                         <td><strong>Thao tác</strong></td>
                                         
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"><?php if($sl>$num) echo "Hiển thị $num trên $num Đơn học lại";
                                           else echo "Hiển thị $sl trên $num Đơn học lại";
                                     ?>
                                    



                                </p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                   
                                        <?php $cc=ceil($num/$sl); for ($j=1; $j <= $cc; $j++) { echo "<li class='page-item'><a class='page-link' href='manager_hoclai.php?sldong=$sl&page=$j'>$j</a></li>";}
                                         ?>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white bounce animated sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © trinhsydu.com 2020</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>



