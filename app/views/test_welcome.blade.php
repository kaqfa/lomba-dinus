
@section('mainarea')

<div class="grid_12">
            
    <div class="box round first">
        <h2>{{$activity->name}}</h2>
        <div class="block">            
            <div> {{$activity->description}} </div>
            @if(Session::has('message'))
                <p class="alert">{{ Session::get('message') }}</p>
            @endif
            <div>
                {{HTML::link('admin/start-test/'.$testId, 'MULAI TES SEKARANG', array('class'=>'big-button'))}}                
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
</div>
@stop