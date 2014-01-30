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

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Aktifitas Lomba</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/act-contest/save')) }}
				<table class="form">
					<tr>
						<td> {{Form::label('name', 'Nama Aktifitas')}} </td>
						<td> {{Form::text('name', $act['name'], array('class'=>'mini'))}} </td>
					</tr>
					@if($act['type'] == '2')
					<tr>
						<td> {{Form::label('file', 'Upload Berkas')}} </td>
						<td> {{Form::file('file')}} </td>
					</tr>
					<tr>
						<td> {{Form::label('contest_id', 'Tipe Berkas')}} </td>
						<td> {{Form::select('contest_id', array('1'=>'Dokumen', '2'=>'PDF', '3'=>'Slide'))}} </td>
					</tr>
					@endif
					<tr>
						<td> {{Form::label('description', 'Keterangan')}} </td>
						<td> {{Form::textarea('description')}} </td>
					</tr>	
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Submit Aktifitas')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop