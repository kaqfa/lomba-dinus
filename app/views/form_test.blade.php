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
if(!isset($test)){
	$test = new StdClass();

	$test->name = '';
	$test->description = '';
	$test->activity_id = '';
	$test->date_from = '';
	$test->date_until = '';
	$test->minutes = 60;
}
?>

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Ujian Online</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/test/save')) }}
            @if(isset($test->id))
            {{Form::hidden('id', $test->id)}}
            @endif
				<table class="form">
					<tr>
						<td> {{Form::label('name', 'Nama Tes')}} </td>
						<td> {{Form::text('name', $test->name, array('class'=>'mini'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('description', 'Deskripsi Tes')}} </td>
						<td> {{Form::textarea('description', $test->description)}} </td>
					</tr>	
					<!--tr>
						<td> {{Form::label('activity_id', 'Untuk Aktifitas')}} </td>
						<td> {{Form::select('activity_id', $select, $test->activity_id)}} </td>
					</tr-->
					<tr>
						<td> {{Form::label('date_from', 'Mulai Tes')}} </td>
						<td> {{Form::text('date_from', $test->date_from, array('class'=>'datepicker'))}}  
							<small>yyyy-mm-dd</small></td>
					</tr>
					<tr>
						<td> {{Form::label('date_until', 'Akhir Tes')}} </td>
						<td> {{Form::text('date_until', $test->date_until, array('class'=>'datepicker'))}} 
							<small>yyyy-mm-dd</small></td>
					</tr>
					<tr>
						<td> {{Form::label('minutes', 'Lama Ujian')}} </td>
						<td> {{Form::text('minutes', $test->minutes)}} menit</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Simpan Data Ujian')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop