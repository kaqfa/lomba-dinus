<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tes Online Lomba Keamanan Jaringan</title>

<!-- CSS -->
{{HTML::style('transdmin/style/css/transdmin.css')}}
{{HTML::style('counter/jquery.countdown.css')}}
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
{{HTML::script('jqui/jquery.js')}}
{{HTML::script('counter/jquery.plugin.min.js')}}
{{HTML::script('counter/jquery.countdown.js')}}
{{--HTML::script('transdmin/style/js/jNice.js')--}}
<script type="text/javascript">
    $(document).ready(function(){        
        var now = new Date();        
        $('#counter').countdown(
            {until: +{{$timeLeft}}, format: 'HMS', expiryUrl: '{{URL::to('/admin')}}'}
            );

        $('.opt').click(function(){            
            var item = $(this);
            $.post( "{{URL::to('/admin/test/answer')}}", 
                { question_id: $('#question_id').val(), test_id: $('#test_id').val(), answer: item.val() }, 
                function(data){
                    $('#jawab').html(data);
                });
        });
    });    
</script>
<style type="text/css">
    #counter {width: 180px; height: 30px; position: fixed; bottom: 15px; right: 20px; padding-top: 5px;}
</style>
</head>

<body>
	<div id="wrapper">
    	<div id="counter"></div>
        <!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>TestKeamanan Online</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="javascript:void()" class="active">LOMBA KEAMANAN JARINGAN</a></li><!-- Use the "active" class for the active menu item  -->
        	<li class="logout"> {{HTML::link('/admin/contest-act/'.$test->activity_id, 'SELESAI')}} </li>
            <li class="logout">{{HTML::link('/admin/test-review/'.$test->id, 'REVIEW')}}</li>
        </ul>
        <!-- // #end mainNav -->        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	@section('testMenu')
                    <ul class="sideNav">
                    <?php $num = 1; ?>
                        @foreach($leftMenu as $quest)
                    	<li>@if($quest->question_id == Request::segment(4))
                                {{HTML::link('/admin/test/'.Request::segment(3).'/'.$quest->question_id, 
                                    'Soal Nomer '.$num++, array('class'=>'active'))}}
                            @else
                                {{HTML::link('/admin/test/'.Request::segment(3).'/'.$quest->question_id, 
                                    'Soal Nomer '.$num++)}}
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @show
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                

                @yield('test-area')
                
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
    </div>
    <!-- // #wrapper -->
</body>
</html>
