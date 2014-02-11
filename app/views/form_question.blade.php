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

<?php
if(!isset($quest)){ 
	$quest = new StdClass;	
	$quest->question = '';
	$quest->optA = '';
	$quest->optB = '';
	$quest->optC = '';
	$quest->optD = '';
	$quest->optE = '';
	$quest->answer = '';
	$quest->test_id = $testId;
}
?>

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Soal Lomba</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/question/save')) }}
            {{Form::hidden('type', 1)}}
            {{Form::hidden('test_id', $quest->test_id)}}
            @if(isset($quest->id))
            {{Form::hidden('id',$quest->id)}}
            @endif
				<table class="form">
					<tr>
						<td> {{Form::label('question', 'Pertanyaan')}} </td>
						<td> {{Form::textarea('question', $quest->question)}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optA', 'Pilihan A')}} </td>
						<td> {{Form::text('optA', $quest->optA, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optB', 'Pilihan B')}} </td>
						<td> {{Form::text('optB', $quest->optB, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optC', 'Pilihan C')}} </td>
						<td> {{Form::text('optC', $quest->optC, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optD', 'Pilihan D')}} </td>
						<td> {{Form::text('optD', $quest->optD, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('optE', 'Pilihan E')}} </td>
						<td> {{Form::text('optE', $quest->optE, array('class'=>'medium'))}} </td>
					</tr>
					<tr>
						<td> {{Form::label('answer', 'Jawaban Benar')}} </td>
						<td> {{Form::select('answer', array('1'=>'A', '2'=>'B', '3'=>'C', '4'=>'D', '5'=>'E'), 
										$quest->answer)}} </td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							{{Form::submit('Simpan Pertanyaan')}}
						</td>
					</tr>
				</table>
				{{Form::close()}}
        </div>
    </div>    
</div>
@stop