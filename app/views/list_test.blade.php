@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }} 

	{{HTML::style('datatable/css/demo_page.css')}}	
	{{HTML::style('datatable/css/demo_table_jui.css')}}	
	{{HTML::style('jqui/themes/start/jquery-ui-1.10.4.custom.min.css')}}	

	{{ HTML::script('jqui/ui/minified/jquery.ui.accordion.min.js') }} 
	{{ HTML::script('jqui/ui/minified/jquery.ui.mouse.min.js') }} 
	{{ HTML::script('jqui/ui/minified/jquery.ui.sortable.min.js') }} 	
	{{ HTML::script('datatable/js/jquery.dataTables.min.js') }} 	
	
	<script type="text/javascript">
       $(document).ready(function () {            
            $('.datatable').dataTable({
		        "bJQueryUI": true,
		        "sPaginationType": "full_numbers"
		    });			
        });
    </script>  
@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>List Tes Online</h2>
        <div class="block">
        	@if(Session::get('theUser')->level == 1)
        	{{--HTML::link('admin/create-test','+ Tambah Tes Online', array('class'=>'big-button'))--}}
        	@endif
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Tes</th>
						<th>Deskripsi Tes</th>						
						<th>Tanggal Aktif</th>
						<th>Durasi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tests as $data)
					<tr class="odd gradeX">
						<td> {{$data['name']}} </td>
						<td> {{$data['description']}} </td>
						<td> {{$data['date_from'].' - '.$data['date_until']}} </td>
						<td> {{$data['minutes']}} </td>
						<td>
							{{HTML::link('admin/list-question/'.$data['id'], 'input soal', array('class'=>'small-button green'))}} 
							{{HTML::link('admin/edit-test/'.$data['id'], 'edit', array('class'=>'small-button yellow'))}} 
							{{--HTML::link('admin/del-test/'.$data['id'], 'del', array('class'=>'small-button red'))--}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop