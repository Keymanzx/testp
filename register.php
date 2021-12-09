<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบการให้จองคิวให้คำปรึกษาด้านสุขภาพจิต</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #003399;">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

            <div class="col-md-1 float-left">
                <picture>
                    <a href="index.php"><img src="image/Logo.png" class="img-fluid img-thumbnail"></a>

                </picture>
            </div>

            <marquee direction="right" width="70%">
                <FONT SIZE="6" color="#FFFFFF"> ระบบการให้จองคิวให้คำปรึกษาด้านสุขภาพจิต</Font>
            </marquee>

        </div>
</nav>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">สมัครสมาชิก</h1>
                            </div>

                            <!-- ฟอร์มสมัคร -->

                            <form class="user" action="registersave.php" method="POST" name="register" id="register">
                                <div class="form-group">
                                    <input name="Firstname" type="text" id="Firstname"
                                        class="form-control form-control-user" placeholder="ชื่อ-นามสกุล(ภาษาไทย)"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input name="Num" type="text" id="Num" class="form-control form-control-user"
                                        placeholder="รหัสนักศึกษา 10 หลัก" required>
                                </div>
                                <div>
                                    <select class="form-select" aria-label="Default select example" name="Major"
                                        onchange="check(this);">
                                        <option selected value="search" id="">-เลือกสาขา-</option>
                                        <option value="สาขาวิชาการบัญชี">สาขาวิชาการบัญชี</option>
                                        <option value="สาขาวิชาระบบสารสนเทศทางการบัญชี">สาขาวิชาระบบสารสนเทศทางการบัญชี</option>
                                        <option value="สาขาวิชาการจัดการสารสนเทศและคอมพิวเตอร์">สาขาวิชาการจัดการสารสนเทศและคอมพิวเตอร์</option>
                                        <option value="สาขาวิชาการจัดการธุรกิจผ่านสื่ออิเล็กทรอนิกส์">สาขาวิชาการจัดการธุรกิจผ่านสื่ออิเล็กทรอนิกส์</option>
                                        <option value="สาขาวิชาการประกันภัยและการจัดการความเสี่ยง">สาขาวิชาการประกันภัยและการจัดการความเสี่ยง</option>
                                        <option value="สาขาวิชาการจัดการการท่องเที่ยว">สาขาวิชาการจัดการการท่องเที่ยว</option>
                                        <option value="สาขาวิชาการตลาด">สาขาวิชาการตลาด</option>
                                        <option value="สาขาวิชาการจัดการรัฐกิจ">สาขาวิชาการจัดการรัฐกิจ</option>
                                        <option value="สาขาวิชาภาษาอังกฤษธุรกิจ">สาขาวิชาภาษาอังกฤษธุรกิจ</option>
                                        <option value="สาขาวิชาสถาปัตยกรรม">สาขาวิชาสถาปัตยกรรม</option>
                                        <option value="สาขาวิชาศิลปะการแสดงและการจัดการ">สาขาวิชาศิลปะการแสดงและการจัดการ</option>
                                    </select>
                                </div><br>
                                <div>
                                    <select class="form-select" aria-label="Default select example" name="Cls" id="Cls"
                                        size="1" onchange="check(this);">
                                        <option selected value="search">-เลือกชั้นปี-</option>
                                        <option value="ชั้นปีที่1">ชั้นปีที่1</option>
                                        <option value="ชั้นปีที่2">ชั้นปีที่2</option>
                                        <option value="ชั้นปีที่3">ชั้นปีที่3</option>
                                        <option value="ชั้นปีที่4">ชั้นปีที่4</option>
                                        <option value="ชั้นปีที่5">ชั้นปีที่5</option>
                                    </select>
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" name="Tell" type="text" id="Tell"
                                            placeholder="เบอร์โทรศัพท์" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" name="Email" type="text"
                                            id="Email" placeholder="E-mail (name@example.com)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" name="lne" type="text" id="lne"
                                            placeholder="LINE ID / เบอร์โทรศัพท์" required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" name="Facebook" type="text"
                                            id="Facebook" " 
                                        placeholder=" ชื่อ Facebook" required>
                                    </div>
                                    <td>&nbsp;</td>

                                    <div class="form-group">
                                        <input class="form-control form-control-user" name="Username" type="text"
                                            id="Username" placeholder="Username" required>
                                    </div><br>

                                    <div class="form-group">
                                        <input class="form-control form-control-user" name="Userpass" type="text"
                                            id="Userpass" placeholder="Password" required>
                                    </div>

                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <button type="submit" name="regis" id="regis"
                                        class="btn btn-success btn-user btn-block" value="regis">
                                        สมัครสมาชิก
                                    </button>


                            </form>
                            <td>&nbsp;</td>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">มีบัญชีอยู่แล้วใช่ไหม?</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>