@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }}	

	{{ HTML::script('tinymce/tinymce.min.js') }}
	<script>
        
		$(function() {
	        tinymce.init({selector:'textarea'});
	    });
	</script>   
@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Soal Lomba</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/question/insert')) }}
            {{Form::hidden('type', 1)}}
            {{Form::hidden('test_id', $testId)}}
				<table class="form">
					<tr>
						<td> {{Form::label('question', 'Pertanyaan')}} </td>
						<td> {{Form::textarea('question')}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optA', 'Pilihan A')}} </td>
						<td> {{Form::text('optA', null, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optB', 'Pilihan B')}} </td>
						<td> {{Form::text('optB', null, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optC', 'Pilihan C')}} </td>
						<td> {{Form::text('optC', null, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optD', 'Pilihan D')}} </td>
						<td> {{Form::text('optD', null, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optE', 'Pilihan E')}} </td>
						<td> {{Form::text('optE', null, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('answer', 'Jawaban Benar')}} </td>
						<td> {{Form::select('answer', array('1'=>'A', '2'=>'B', '3'=>'C', '4'=>'D', '5'=>'E'))}} </td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Submit Pertanyaan')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop