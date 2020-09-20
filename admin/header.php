<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
	
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft"> <font color="#ffffff" style="font-size:20px">
                    Admin panel</font></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/kizsnd1.jpg" alt="Profile Pic" style="width:10px;height:10px;"/></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey"></span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class=""><a href="inserting_routes.php"><span>Routes</span></a> </li>
                <li class="ic-school"><a href="post_charter.php"><span>Charter Service First</span></a>
                    
                </li>
                <li class="ic-typography"><a href="inserting_about.php"><span>About</span></a></li>
				<li class=""><a href="inserting_profiles.php"><span>Profiles</span></a></li>
                <li class="ic-grid-tables"><a href="inserting_fleet.php"><span>Fleet</span></a></li>
            
            </ul>
			
        </div>