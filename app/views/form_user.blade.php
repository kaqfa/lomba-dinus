﻿@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }}    
@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form {{$action}} Pengguna</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/user/insert')) }}
				<table class="form">
					<tr>
						<td> {{Form::label('username', 'Username')}} </td>
						<td> {{Form::text('username', null, array('class'=>'mini'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('passwd', 'Password')}} </td>
						<td> {{Form::password('passwd', null, array('class'=>'mini'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('confirm', 'Konfirmasi Password')}} </td>
						<td> {{Form::password('confirm', null, array('class'=>'mini'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('level', 'Level Pengguna')}} </td>
						<td> {{Form::select('level', array('1'=>'Administrator', '2'=>'Juri Lomba', '3'=>'Peserta Lomba'))}} </td>
					</tr>					
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Input Peserta')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop