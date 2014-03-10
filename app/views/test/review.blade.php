@section('test-area')
<!-- h2 stays for breadcrumbs -->
<h2><a href="#">Online Test</a> &raquo; <a href="#" class="active">Review Test</a></h2>
    
<div id="main">
    <form action="" class="jNice">
        <h3>Review Tes Keamanan Jaringan</h3>        

        <h3>Jawaban Sementara</h3>
        <table cellpadding="0" cellspacing="0">
            <?php $i = 1; ?>
            @foreach($answers as $data)
            <tr class="odd">
                <td> <strong>Soal Nomer {{$i}} </strong> </td>
                <td> : {{$options[$data->answer]}} </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </table>
    </form>
    <br /><br /><br />
</div>
<!-- // #main -->   
@stop