@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }}

	{{ HTML::script('jqui/ui/minified/jquery.ui.datepicker.min.js') }} 

	{{ HTML::script('tinymce/tinymce.min.js') }}
	<script>
        
		$(function() {
	        tinymce.init({selector:'textarea'});
	        $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
	        
	    });
	</script>   
@stop

<?php
if(!isset($activity)){
	$activity = new StdClass();

	$activity->name = '';
	$activity->description = '';
	$activity->contest_id = '';
	$activity->date_from = '';
	$activity->date_until = '';
}
?>

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Aktifitas Lomba</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/activity/insert')) }}
				<table class="form">
					<tr>
						<td> {{Form::label('name', 'Nama Aktifitas')}} </td>
						<td> {{Form::text('name', $activity->name, array('class'=>'mini'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('description', 'Deskripsi Aktifitas')}} </td>
						<td> {{Form::textarea('description', $activity->description)}} </td>
					</tr>	
					<tr>
						<td> {{Form::label('contest_id', 'Untuk Lomba')}} </td>
						<td> {{Form::select('contest_id', $contestMenu, $activity->contest_id)}} </td>
					</tr>
					<tr>
						<td> {{Form::label('date_from', 'Mulai Aktifitas')}} </td>
						<td> {{Form::text('date_from', $activity->date_from, array('class'=>'datepicker'))}}  
							<small>yyyy-mm-dd</small></td>
					</tr>
					<tr>
						<td> {{Form::label('date_until', 'Akhir Aktifitas')}} </td>
						<td> {{Form::text('date_until', $activity->date_until, array('class'=>'datepicker'))}} 
							<small>yyyy-mm-dd</small></td>
					</tr>
					<tr>
						<td> {{Form::label('type', 'Jenis Aktifitas')}} </td>
						<td> {{Form::select('type', array('1'=>'Input Teks', '2'=>'Upload File', '3'=>'Tes Online'))}} </td>
					</tr>			
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Simpan Aktifitas Lomba')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop