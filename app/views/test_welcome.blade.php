
@section('mainarea')

<div class="grid_12">
            
    <div class="box round first">
        <h2>Test Online Keamanan Jaringan</h2>
        <div class="block">
            <h3>Selamat Mengerjakan Test</h3>
            <p>Tes adalah hal yang sangat bagus, silahkan mulai tes dengan melakukan klik di bawah ini.</p>
            <div>
                {{HTML::link('admin/test/'.$pageNum, 'MULAI TES SEKARANG !!!')}}
            </div>
            
            <div class="clear">
            </div>
        </div>
    </div>
</div>
@stop