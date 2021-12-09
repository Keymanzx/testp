 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary2 sidebar sidebar-dark accordion" id="accordionSidebar">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminpage.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PSU TRANG </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <div class="sidebar-heading">
       <br> สำหรับผู้ดูแลระบบ
    </div>
    
    <!-- จองคิว -->
    <li class="nav-item">
        <a class="nav-link" href="adminpage.php" >
            <i class="fas fa-fw fa-table"></i>
            <span>ตารางการจอง</span>
        </a>
       
    </li>

    <!-- จองคิว -->
    <li class="nav-item">
        <a class="nav-link" href="bookcomplete.php" >
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            <span>สรุปรายการจอง</span>
        </a>
       
    </li>

    <!-- โปรไฟล์ -->
    <li class="nav-item">
        <a class="nav-link " href="patient.php" >
            <i class="fas fa-fw fa-cog"></i>
            <span>ข้อมูลผู้ป่วยในระบบ</span>
        </a>
       
    </li>

    <!-- ออกจากระบบ -->
    <li class="nav-item">
        <a class="nav-link" href="loginadmin.php" data-toggle="modal" data-target="#logoutModal">    
            <i class="fas fa-sign-out-alt"></i>
            <span>ออกจากระบบ</span>
        </a>

    </li>
    
 
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> -->

</ul>
<!-- End of Sidebar -->