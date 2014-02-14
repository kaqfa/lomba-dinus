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
            {{ Form::open(array('url'=>'admin/act-contest/save', 'files'=>true)) }}
            {{ Form::hidden('activity_id', $act['id']) }}
				<table class="form">
					<tr>
						<td> {{Form::label('activity', 'Nama Aktifitas')}} </td>
						<td> {{Form::text('activity', $act['name'], array('class'=>'mini'))}} </td>
					</tr>
					@if($act['type'] == '2')
					<tr>
						<td> {{Form::label('file', 'Upload Berkas')}} </td>
						<td> {{Form::file('file')}} {{HTML::link('/dl/group_act/'.$groupAct->file,$groupAct->file)}} </td>
					</tr>
					<tr>
						<td> {{Form::label('file_type', 'Tipe Berkas')}} </td>
						<td> {{Form::select('file_type', array('1'=>'Dokumen', '2'=>'PDF', '3'=>'Slide'),
													$groupAct->file_type )}} </td>
					</tr>
					@endif
					<tr>
						<td> {{Form::label('description', 'Keterangan')}} </td>
						<td> {{Form::textarea('description', $groupAct->description)}} </td>
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