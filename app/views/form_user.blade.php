@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }}    
@stop

<?php 
	$passMessage = '<span style="color:#888;">jika password tidak ingin diubah, biarkan kosong</span>';
	$usernameAttr = array('class'=>'mini', 'readonly'=>'readonly');
	if(!isset($valUser)){
		$valUser = new stdClass();
		$valUser->username = '';
		$valUser->password = '';
		$valUser->name = '';
		$valUser->email = '';
		$valUser->contact = '';
		$valUser->level = 0;

		$usernameAttr = array('class'=>'mini');

		$passMessage = '';
	}
?>

@section('mainarea')
<div class="grid_12">

    <div class="box round first fullpage">
        <h2>Form {{$action}} Pengguna</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/user/insert')) }}
            @if(isset($valUser->id))
            	{{Form::hidden('id', $valUser->id)}}
            @endif
			<table class="form">
				<tr>
					<td> {{Form::label('username', 'Username')}} </td>
					<td> {{Form::text('username', $valUser->username, $usernameAttr)}} </td>
				</tr>
				<tr>
					<td> {{Form::label('passwd', 'Password')}} </td>
					<td> 
						{{Form::password('passwd', null, array('class'=>'mini'))}} 
						{{$passMessage}}
					</td>
				</tr>
				<tr>
					<td> {{Form::label('confirm', 'Konfirmasi Password')}} </td>
					<td> {{Form::password('confirm', null, array('class'=>'mini'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('name', 'Nama Lengkap')}} </td>
					<td> {{Form::text('name', $valUser->name, array('class'=>'medium'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('email', 'Email')}} </td>
					<td> {{Form::email('email', $valUser->email, array('class'=>'medium'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('contact', '(Hand)Phone')}} </td>
					<td> {{Form::text('contact', $valUser->contact, array('class'=>'mini'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('level', 'Level Pengguna')}} </td>
					<td> 
						{{Form::select('level', $userLevel, $valUser->level)}} 
					</td>
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