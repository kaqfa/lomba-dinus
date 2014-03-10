
@section('mainarea')

<div class="grid_12">
            
    <div class="box round first">
        <h2>{{$activity->name}}</h2>
        <div class="block">                        
            @if(Session::has('message'))
                <div class="message warning">
                    <h5>Warning ... !!!</h5>
                    <p>{{ Session::get('message') }}</p>
                </div>                
            @endif
            <p>{{$activity->description}}</p>
            <div class="message info">
                <h5>Informasi</h5>                
                <p>Test ini hanya dapat di lakukan antara tanggal 
                <strong>{{date("j F Y", strtotime($theTest->date_from))}} 
                - {{date("j F Y", strtotime($theTest->date_until))}}</strong> </p>
                @if(isset($testStart))
                    <?php 
                        $timeStart = new DateTime($testStart->created_at);                         
                        $timeStart->add(new DateInterval('PT7H'));
                    ?>
                    <p>Test telah dimulai pada pukul
                    <strong>{{$timeStart->format('H:i:s')}}</strong> dan akan berakhir pada  
                    <strong>{{$timeStart->add(new DateInterval('PT'.$theTest->minutes.'M'))->format('H:i:s')}}</strong> </p>
                @endif
            </div>
            <div>
                {{HTML::link('admin/start-test/'.$testId, 'MULAI TES SEKARANG', array('class'=>'big-button'))}}                
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
</div>
@stop