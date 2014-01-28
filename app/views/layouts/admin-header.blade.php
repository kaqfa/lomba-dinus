<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Dashboard | BlueWhale Admin</title>
    <link rel="stylesheet" type="text/css" href="bluewhale/css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="bluewhale/css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="bluewhale/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="bluewhale/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="bluewhale/css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    {{ HTML::script('bluewhale/js/jquery-1.6.4.min.js') }}
    {{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.core.min.js') }}
    {{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.widget.min.js') }}
    {{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.accordion.min.js') }}
    {{ HTML::script('bluewhale/js/jquery-ui/jquery.effects.core.min.js') }}
    {{ HTML::script('bluewhale/js/jquery-ui/jquery.effects.slide.min.js') }}
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    {{ HTML::script('bluewhale/js/jqPlot/jquery.jqplot.min.js') }}
    {{ HTML::script('bluewhale/js/jqPlot/plugins/jqplot.barRenderer.min.js') }}
    {{ HTML::script('bluewhale/js/jqPlot/plugins/jqplot.pieRenderer.min.js') }}
    {{ HTML::script('bluewhale/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js') }}
    {{ HTML::script('bluewhale/js/jqPlot/plugins/jqplot.highlighter.min.js') }}
    {{ HTML::script('bluewhale/js/jqPlot/plugins/jqplot.pointLabels.min.js') }}
    
    <!-- END: load jqplot -->
    {{ HTML::script('bluewhale/js/setup.js') }}
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
                <div class="floatleft">
                    <img src="bluewhale/img/logo.png" alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="bluewhale/img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <li><a href="#">Config</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey">Last Login: 3 hours ago</span>
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
                <li class="ic-dashboard"><a href="/admin"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href="javascript:"><span>Admin</span></a>
                    <ul>
                        <li><a href="form-controls.html">Peserta</a> </li>
                        <li><a href="buttons.html">Lomba</a> </li>
                        <li><a href="form-controls.html">Pengguna</a> </li>
                        <li><a href="table.html">Group</a> </li>
                    </ul>
                </li>
                <li class="ic-grid-tables"><a href="javascript:"><span>Lomba</span></a>
               		 <ul>
                        <li><a href="image-gallery.html">Deskripsi</a> </li>
                        <li><a href="gallery-with-filter.html">Upload Aplikasi</a> </li>
                        <li><a href="gallery-with-filter.html">Upload Source Code</a> </li>
                    </ul>
                </li>
                <li class="ic-notifications"><a href="notifications.html"><span>Pesan</span></a></li>
            </ul>
            
        </div>
        <div class="clear">
        </div>
        
        @yield('mainarea')

        
