<?php $theUser = Session::get('theUser'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Dashboard | BlueWhale Admin</title>
	{{ HTML::style('bluewhale/css/reset.css') }}
	{{ HTML::style('bluewhale/css/text.css') }}
	{{ HTML::style('bluewhale/css/grid.css') }}
	{{ HTML::style('bluewhale/css/layout.css') }}
	{{ HTML::style('bluewhale/css/nav.css') }}    
    <!--[if IE 6]>{{ HTML::style('bluewhale/css/ie6.css') }}<![endif]-->
    <!--[if IE 7]>{{ HTML::style('bluewhale/css/ie.css') }}<![endif]-->
	
	@section('jslibs')
    <!-- BEGIN: load jquery -->
    {{ HTML::style('jqui/themes/base/jquery.ui.all.css') }}

    {{ HTML::script('jqui/jquery.js') }}
    {{ HTML::script('jqui/ui/minified/jquery.ui.core.min.js') }}
    {{ HTML::script('jqui/ui/minified/jquery.ui.widget.min.js') }}
    {{-- HTML::script('jqui/ui/minified/jquery.effects.core.min.js') --}}
    {{-- HTML::script('jqui/ui/minified/jquery.effects.slide.min.js') --}}
    {{-- HTML::script('jqui/ui/minified/jquery.ui.accordion.min.js') --}}
    <!-- END: load jquery -->
	@show
	
    {{ HTML::script('bluewhale/js/setup.js') }}
	@section('jsloader')
    <script type="text/javascript">
        $(document).ready(function () {            
        });
    </script>
	@show
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    {{HTML::image('bluewhale/img/logo.png', 'logo')}}</div>
                <div class="floatright">
                    <div class="floatleft">
                        {{HTML::image('bluewhale/img/img-profile.jpg', 'Profile Pic')}}
                        </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello {{$theUser->name}} </li>                            
                            <li> {{HTML::link('admin/logout', 'Logout')}} </li>
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
                <li class="ic-dashboard"><a href="{{URL::to('admin')}}"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href="javascript:"><span>Administrasi</span></a>
                    <ul>
                        <li> {{HTML::link('admin/list-user','Pengguna')}} </li>
                        <li> {{HTML::link('admin/list-group','Group Lomba')}} </li>
                        <li> {{HTML::link('admin/list-contest','Kategori Lomba')}} </li>
                        <li> {{HTML::link('admin/list-activity','Aktivitas')}} </li>
                        <li> {{HTML::link('admin/list-participant','List Peserta')}} </li>                        
                    </ul>
                </li>
                <li class="ic-grid-tables"><a href="javascript:"><span>Aktivitas Lomba</span></a>
                    <ul>
                    @foreach($contestMenu as $menu)
                        <li>{{HTML::link('admin/contest-act/'.$menu->id,$menu->name)}}</li>
                    @endforeach
                    </ul>
                </li>                
                @if($theUser->level == 1)
                <li class="ic-charts"><a href="javascript:"><span>Test Online</span></a> 
                    <ul>
                        <li> {{HTML::link('admin/list-test','Manajemen Test')}} </li>
                        <li> {{HTML::link('admin/test-result','Hasil Tes')}} </li>                        
                    </ul>
                </li>
                @endif
                <li class="ic-notifications"><a href="notifications.html"><span>Pesan</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        
        @yield('mainarea')

		<div class="clear"></div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="http://www.templatescreme.com">BlueWhale Admin</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>