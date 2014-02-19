@section('test-area')
<!-- h2 stays for breadcrumbs -->
<h2><a href="#">Online Test</a> &raquo; <a href="#" class="active">Soal Nomer {{$numQuest}} </a></h2>
    
<div id="main">
    <form action="" class="jNice">
        <h3>Pertanyaan</h3>
        <fieldset>
            {{$quest->question}}
        </fieldset>

        <h3>Pilihan Jawaban</h3>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td> {{Form::radio('answer', '1')}} {{$quest->optA}} </td>
            </tr>                        
            <tr class="odd">
                <td> {{Form::radio('answer', '2')}} {{$quest->optB}} </td>
            </tr>                        
            <tr>
                <td> {{Form::radio('answer', '3')}} {{$quest->optC}} </td>
            </tr>                        
            <tr class="odd">
                <td> {{Form::radio('answer', '4')}} {{$quest->optD}} </td>
            </tr>                        
            <tr>
                <td> {{Form::radio('answer', '5')}} {{$quest->optE}} </td>
            </tr>                        
        </table>
    </form>
    <br /><br /><br />
</div>
<!-- // #main -->   
@stop