<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบการให้จองคิวให้คำปรึกษาด้านสุขภาพจิต</title>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<?php include './head.php'; ?>
<script type="text/javascript">
        jQuery(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventLimit: true, 
                defaultDate: new Date(),
                timezone: 'Asia/Bangkok',
                events: {
                    url: './dataEvents.php',
                },
                loading: function(bool) {
                    $('#loading').toggle(bool);
                },

                eventClick: function(event) {
                    if (event.url) {
                        $.fancybox({
                            'href': event.url,
                            'type': 'iframe',
                            'autoScale': false,
                            'openEffect': 'elastic',
                            'openSpeed': 'fast',
                            'closeEffect': 'elastic',
                            'closeSpeed': 'fast',
                            'closeBtn': true,
                            onClosed: function() {
                                parent.location.reload(true);
                            },
                            helpers: {
                                thumbs: {
                                    width: 50,
                                    height: 50
                                },

                                overlay: {
                                    css: {
                                        'background': 'rgba(49, 176, 213, 0.7)'
                                    }
                                }
                            }
                        });
                        return false;
                    }
                },
            });
        });
    </script>

</head>

    <!--Nav Bar-->
<!-- <nav class="navbar navbar-expand-sm bg-primary navbar-dark"> -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #003399;">
 
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
  
    <div class="col-md-1 float-left">
        <picture>
            <a href="index.php"><img src="image/Logo.png" class="img-fluid img-thumbnail" ></a>
    
    </picture>
  </div>

 <marquee behavior="alternate" width="70%"  ><FONT SIZE="7" color="#FFFFFF" > ระบบการให้จองคิวให้คำปรึกษาด้านสุขภาพจิต</Font></marquee> 



<ul class="nav navbar-nav navbar-right">
      <li><a href="loginadmin.php"><span style="font-size: 16pt" class="glyphicon glyphicon-user"> Admin</a></li></span>
      <li><a href="login.php"><span style="font-size: 16pt" class="glyphicon glyphicon-user"> User</a></li></span>
    </ul>


</div>  
</nav>
<!--end menu-->
<body >

    <div id="wrapper">
        <div class="container">
            <div class="row">

                <div class='col-md-12'>
                    <div class="panel panel-default">
                        <div class="panel-heading bg-dark">
                            <h3>ปฏิทินการจอง</h3>
                        </div>
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-lg-12">
                                    <div id='calendar'></div>
                                    <div style="margin:10px 0 50px 0;" align="center">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>
