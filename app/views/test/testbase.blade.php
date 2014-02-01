<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transdmin Light</title>

<!-- CSS -->
{{HTML::style('transdmin/style/css/transdmin.css')}}
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
{{HTML::script('jqui/jquery.js')}}
{{HTML::script('transdmin/style/js/jNice.js')}}
</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>TestKeamanan Online</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="#" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="#">SIMPAN SEMENTARA</a></li>
        	<li class="logout"><a href="#">SELESAI</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	@section('testMenu')
                    <ul class="sideNav">
                        @for($num = 1; $num <= 15; $num++)
                    	<li>@if($num == Request::segment(3))
                            {{HTML::link('/admin/test/'.$num, 'Soal Nomer '.$num, array('class'=>'active'))}}
                            @else
                            {{HTML::link('/admin/test/'.$num, 'Soal Nomer '.$num)}}
                            @endif
                        </li>
                        @endfor
                    </ul>
                    @show
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Print resources</a></h2>
                
                <div id="main">
                    @yield('test-area')
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
    </div>
    <!-- // #wrapper -->
</body>
</html>