@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }} 

	{{ HTML::script('tinymce/tinymce.min.js') }}
	<script>
        tinymce.init({selector:'textarea'});
	</script>   
@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form {{$action}} Kategori Lomba</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/contest/insert')) }}
				<table class="form">
					<tr>
						<td> {{Form::label('name', 'Nama Lomba')}} </td>
						<td> {{Form::text('name', null, array('class'=>'mini'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('description', 'Deskripsi Lomba')}} </td>
						<td> {{Form::textarea('description')}} </td>
					</tr>				
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Input Kategori Lomba')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop