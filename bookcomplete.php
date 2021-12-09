<?php
session_start() ;
include('./conDB/config.php');
    // 2. query ข้อมูลจากตาราง users+booking:
    // $query = "SELECT * FROM booking 
    // WHERE status = 'ยืนยัน';
//   WHERE status='ยืนยัน';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบการให้จองคิวให้คำปรึกษาด้านสุขภาพจิต</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./lib/jquery.fancybox.css" type="text/css" media="screen" />

    <!-- fullcalendar -->
    <link href='./fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='./fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <!-- jQuery -->
    <script src="./lib/jquery/dist/jquery.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src='./lib/moment.min.js'></script>
    <script src='./fullcalendar/fullcalendar.min.js'></script>
    <script src='./lib/lang/th.js'></script>
    <script src="./lib/jquery.fancybox.pack.js"></script>

   
</head>

<body id="page-top">

    <?php include('navadmin.php') ?>

    <!-- <button class="btn btn-danger dropdown-toggle" style=" border-radius:90px;" type="button" 
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> $row["status"]</button>

    <div class="dropdown-menu">

      <button class="dropdown-item"  value="Y">จัดส่งแล้ว</button>
    </div> -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                  
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">แสดงข้อมูลทั้งหมด</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">สวัสดี
                                <?= $_SESSION['admin_username'] ?></span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>

                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="loginadmin.php" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                ออกจากระบบ
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <?php
                $thai_month_arr=array(
                    "0"=>"",
                    "1"=>"มกราคม",
                    "2"=>"กุมภาพันธ์",
                    "3"=>"มีนาคม",
                    "4"=>"เมษายน",
                    "5"=>"พฤษภาคม",
                    "6"=>"มิถุนายน", 
                    "7"=>"กรกฎาคม",
                    "8"=>"สิงหาคม",
                    "9"=>"กันยายน",
                    "10"=>"ตุลาคม",
                    "11"=>"พฤศจิกายน",
                    "12"=>"ธันวาคม"                 
                );
                ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

         
                <!-- DataTales Example -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">สรุปรายชื่อการจอง</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_filter" class="dataTables_filter">
                            <form method="post" action="">
                                เลือกเดือน
                                <select name="month_check" id="month_check">
                                <?php for($i=1;$i<=12;$i++){ ?>
                                <option value="<?=sprintf("%02d",$i)?>" <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?> >
                                <?=$thai_month_arr[$i]?>
                                </option>
                                <?php } ?>
                                </select>
                                ปี
                                <select name="year_check" id="year_check">
                                <?php
                                $data_year=intval(date("Y",strtotime("-2 year")));
                                ?>
                                <?php for($i=0;$i<=5;$i++){ ?>
                                <option value="<?=$data_year+$i?>" <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?> >
                                <?=intval($data_year+$i)+543?>
                                </option>
                                <?php } ?>
                                </select>
                                <input type="submit" name="showData" id="showData" value="แสดงข้อมูล" />
                            </form>
<br>
                            </div>
                                                        
                            <?php
                            // ถ้าไม่มีการส่งเดือนและปีมา ให้ใช้เดือนและปีในขณะปัจจุบันนั้น เป้นตัวกำหนด
                            if(!isset($_POST['month_check']) && !isset($_POST['year_check'])){
                                $date_data_check=date("Y-m-");// จัดรูปแบบปีและเดือนของวันปัจจุบันในรูปแบบ 0000-00-
                                $num_month_day=date("t"); // หาจำนวนวันของเดืนอ
                                $use_month_check = $date_data_check;    
                                $start_date_check = $date_data_check."01";
                                $end_date_check = $date_data_check.$num_month_day;
                             
                            }else{ // ถ้ามีการส่งข้อมูล เดือนและปี มา ให้ใช้เดือนและปี ของค่าที่ส่งมาเป้นตำกำหนด
                                $date_data_check=$_POST['year_check']."-".$_POST['month_check']."-"; // จัดรูปแบบปีและเดืนอที่ส่งมาในรูปแบบ 0000-00-
                                $num_month_day=date("t",strtotime($_POST['year_check']."-".$_POST['month_check']."-01")); // หาจำนวนวันของเดืนอ
                                $use_month_check = $date_data_check;        
                                $start_date_check = $date_data_check."01";
                                $end_date_check = $date_data_check.$num_month_day;
                               
                            }
                            ?>
                          
                            
                            <?php 
                            $query = "SELECT  users.user_id, users.user_name,users.user_no, 
                            users.user_tell,users.lne_id , users.facebook,
                            users.user_email,booking.id,booking.status,booking.purpose,booking.booking_start_date,booking.booking_type,booking.problem
                            FROM users 
                            INNER JOIN booking ON users.user_id = booking.user_id
                            WHERE booking.status = 'ยืนยัน' AND booking.booking_start_date  LIKE '%$use_month_check%' 
                            ORDER BY booking_start_date  ASC" ;
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                             
                            
                            ?>

                            <table class="table table-bordered" id="" width="100%" cellspacing="">
                           
                                <thead>
                                    <tr>
                                        <th>วันที่การจอง</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>รหัสนักศึกษา</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>อีเมล</th>
                                        <th>Facebook</th>
                                        <th>Line</th>
                                        <th>อาการ</th>
                                        <th>ลักษณะปัญหา</th>
                                        <th>ขอพบอาจารย์ที่ปรึกษา</th>
                                        <!-- <th>ตรวจสอบ</th> -->
                                        <!-- <th>สถานะ</th> -->
                                    </tr>
                                </thead>
                                <div>



                                    <?php  
                                
                                    while ( $row = mysqli_fetch_array($result)) {

                                    echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>" . $row["booking_start_date"] . "</td> ";
                                        echo "<td>" . $row["user_name"] . "</td> ";
                                        echo "<td>" . $row["user_no"] . "</td> ";
                                        echo "<td>" . $row["user_tell"] . "</td> ";
                                        echo "<td>" . $row["user_email"] . "</td> ";
                                        echo "<td>" . $row["facebook"] . "</td> ";
                                        echo "<td>" . $row["lne_id"] . "</td> ";
                                        echo "<td>" . $row["purpose"] . "</td> ";
                                        echo "<td>" . $row["problem"] . "</td> ";
                                        echo "<td>" . $row["booking_type"] . "</td> ";

                                    echo "</tbody>";

                                    }  
                                    
                                    ?>

                            </table>

                            <?php
                             mysqli_close($con);
                            ?>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

           <form action="pdf1.php" method="post" value="<?php $use_month_check; ?>">
                <center>
                    <input type="submit" class="btn btn-primary" value="ดาวน์โหลด (pdf)"></input>
                </center>
           </form>
        

        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตตรัง</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบหรือไม่ ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">เลือก "Logout" เพื่อออกจากระบบ </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="loginadmin.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>