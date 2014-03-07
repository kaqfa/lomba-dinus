@section('test-area')
<!-- h2 stays for breadcrumbs -->
<h2><a href="#">Online Test</a> &raquo; <a href="#" class="active">Soal Nomer {{$numQuest}} </a></h2>
    
<div id="main">
    <form action="" class="jNice">
        <h3>Pertanyaan</h3>
        <fieldset>
            {{$quest->question}}
            {{Form::hidden('question_id',Request::segment(4), array('id'=>'question_id'))}}
            {{Form::hidden('test_id',Request::segment(3), array('id'=>'test_id'))}}
        </fieldset>

        <h3>Pilihan Jawaban [Jawaban sementara: <span id="jawab">{{$answer}}</span>]</h3>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td> <strong>A.</strong> 
                @if($answer == 'A')
                {{Form::radio('answer', '1', true, array('class'=>'opt'))}} {{$quest->optA}} 
                @else
                {{Form::radio('answer', '1', false, array('class'=>'opt'))}} {{$quest->optA}} 
                @endif
                </td>
            </tr>                        
            <tr class="odd">
                <td> <strong>B.</strong> 
                @if($answer == 'B')
                {{Form::radio('answer', '2', true, array('class'=>'opt'))}} {{$quest->optB}} 
                @else
                {{Form::radio('answer', '2', false, array('class'=>'opt'))}} {{$quest->optB}} 
                @endif
                </td>
            </tr>                        
            <tr>
                <td> <strong>C.</strong> 
                @if($answer == 'C')
                {{Form::radio('answer', '3', true, array('class'=>'opt'))}} {{$quest->optC}} 
                @else
                {{Form::radio('answer', '3', false, array('class'=>'opt'))}} {{$quest->optC}} 
                @endif 
                </td>
            </tr>                        
            <tr class="odd">
                <td> <strong>D.</strong> 
                @if($answer == 'D')
                {{Form::radio('answer', '4', true, array('class'=>'opt'))}} {{$quest->optD}} 
                @else
                {{Form::radio('answer', '4', false, array('class'=>'opt'))}} {{$quest->optD}} 
                @endif 
                </td>
            </tr>                        
            <tr>
                <td> <strong>E.</strong> 
                @if($answer == 'E')
                {{Form::radio('answer', '5', true, array('class'=>'opt'))}} {{$quest->optE}} 
                @else
                {{Form::radio('answer', '5', false, array('class'=>'opt'))}} {{$quest->optE}} 
                @endif
                </td>
            </tr>                        
        </table>
    </form>
    <br /><br /><br />
</div>
<!-- // #main -->   
@stop