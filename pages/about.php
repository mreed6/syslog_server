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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../documentation/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../documentation/demo/demo.css" rel="stylesheet" />

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="../documentation/img/sidebar-4.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo"><a href="./dashboard.php" class="simple-text logo-normal">
            Syslog Server
        </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="./dashboard.php">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="./about.php">
                        <i class="material-icons">perm_device_information</i>
                        <p>About Page</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./Citations.php">
                        <i class="material-icons">library_books</i>
                        <p>Citations</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <span class="nav-tabs-title">About</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                                    <i class="material-icons">build</i> Syslog Server
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                       <p>
                                       <p>
<h4> Project summary</h4>
<ul>
   <li>Our class project is that we are making a syslog server that will gather logs from client computers, or hardware, and store them on the server for an Admin to view and look at. It keeps it organized, easy to access and easy to read for all Administrators trying to monitor these devices.
   </li>
</ul>
<h4>Background</h4>
<ul>
   <li>
      How to use the service: the user would request from the Admin of the Syslog server that they would like to have their system logs organized and backed up on a daily basis. They would then be added to the Syslog server database, and organized through the Syslog host machine. Their logs would then be associated with their username via the online Admin Dashboard where the Admin can see all the clients organized and backed up system logs that have their device name on it.
   </li>
</ul>
<h4>Project overview describing:</h4>
<ul>
   <li>What is the service?</li>
   <ul>
      <li>
         This service provides the System administrator to easily keep track of all the system log files for all the devices in the departments or etc… this interface allows him/her to log in and easily view all these files to read and see what is happening on what device/system.
      </li>
   </ul>
   <li>How to implement the service?</li>
   <ul>
      <li>
         To implement this service you would need to enable rsyslog service on the main server, and configure the rsyslog.conf file to enable traffic coming from outside sources on TCP port 514, or UDP port 514 or both. Then specify the path of all incoming traffic to a specific spot on the machine.
      </li>
      <li>
         To enable file redirection you need to open rsyslog.conf file and input "$template RemoteLogs,"/var/log/client_devices/%HOSTNAME%/%PROGRAMNAME%.log""
      </li>
      <ul>
         <li>In this example we stored ours in the “client_devices” path, you can make that any directory you wish.</li>
         <ul>
            <li>Restart the service for rsyslog with “sudo systemctl restart rsyslog”</li>
         </ul>
      </ul>
      <li>After the server in set up, you need to enable the same syslog service on the device and edit the rsyslog.conf file to allow file transfer being sent to @@’ipaddress’:’portnumber’ ours would be @@35.223.28.98:514 at the end of the rsyslog.conf file.</li>
   <ul>
      <li>
         Restart the service the same way you restarted the service on the server.
      </li>
   </ul>
   </ul>

</ul>
<h4>Group member contribution</h4>
<ul>
   <li>Camron Grant:</li>
   <ul>
      <li>
         Created test VMs outside of the internal ip where the syslog server was held.
      </li>
      <li>
         Created Citations page.
      </li>
      <li>
         Created a php function to count the number of logs and users.
      </li>
      <li>
         Linked the logout php function that Darius created to all the webpages.
      </li>
      <li>
         Overall site clean up.
      </li>
      <li>
         Project About Page.
      </li>
   </ul>
</ul>
<ul>
   <li>Darius Banks:</li>
   <ul>
      <li>
         Create PHPMyAdmin Database containing administrator login information.
      </li>
      <li>
         Administrator Login pages including PHP code to connect to database, login, and logout.
      </li>
   </ul>
</ul>
<ul>
   <li>Michael Reed:</li>
   <ul>
      <li>
         Create the syslog server in google cloud vm centos 7, rsyslog was installed and updated on the vm and configured the rsyslog.conf file to be able to receive logs through a tcp 514 port and UDP port 514.
      </li>
      <li>
         Started the rsyslog service on the vm.
      </li>
      <li>
         Also created a directory path to store all incoming client log files and store them on the server.
         <ul>
            <li>
               Enabled the rsyslog.conf file to direct all files to specified path of $template RemoteLogs,”/var/log/client_devices/%HOSTNAME%/%PROGRAMNAME%.log””
            </li>
         </ul>
      </li>
      <li>
         Created PHP Dashboard and the PHP log file page to display devices and devices logs when clicking on specified device name in page.
      </li>
   </ul>
</ul>
<h4>Screenshots of the Project in Action:</h4>
<ol>
    <li><img src="../documentation/img/vm1.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
        <ul>
            <li>
            The picture above shows the saved log file paths.
            </li>
        </ul>
    <li><img src="../documentation/img/vm2.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
    <ul>
            <li>
            This picture shows the client devise we have on the syslog server host machine.
            </li>
        </ul>
    <li><img src="../documentation/img/vm3.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
    <ul>
            <li>
            The picture above shows the configuration file for the Syslog server
            </li>
        </ul>
    <li><img src="../documentation/img/vm4.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
    <ul>
            <li>
            The picture above shows the bash script for our backup scheme using rsync
            </li>
        </ul>
    <li><img src="../documentation/img/vm5.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
    <ul>
            <li>
            The picture above shows the file location as to where the backup is being saved at
            </li>
        </ul>
    <li><img src="../documentation/img/webpage1.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
    <ul>
            <li>
            The picture above shows the dashboard of our client devices
            </li>
        </ul>
    <li><img src="../documentation/img/webpage2.png" alt="oppsie woopsie uwu looks like this image is broken"></li>
    <ul>
            <li>
            The picture above shows the shows the log files of a client device
            </li>
        </ul>
</ol>
</p>
</p>
                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by Micahel Reed, Cam Grant, Darius Banks.
                </div>
            </div>
        </footer>
    </div>
</div>
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
<script src="../documentation/js/plugins/fullcalendar.min.js"></script>
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
                $body = $body('body');

                $input = $body(this);

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

</html>