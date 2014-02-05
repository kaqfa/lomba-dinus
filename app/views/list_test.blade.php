@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }} 

	{{HTML::style('bluewhale/css/table/demo_page.css')}}	
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.accordion.min.js') }} 
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.mouse.min.js') }} 
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.sortable.min.js') }} 
	{{ HTML::script('bluewhale/js/table/jquery.dataTables.min.js') }} 	
	
	<script type="text/javascript">
        $(document).ready(function () {            
            $('.datatable').dataTable();			
        });
    </script>  
@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>List Tes Online</h2>
        <div class="block">
        	{{HTML::link('admin/create-contest','[Tambah Tes Online]')}}
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
							{{HTML::link('admin/list-question/'.$data['id'], '[input soal]')}} ||
							{{HTML::link('admin/edit-test/'.$data['id'], '[edit]')}} ||  
							{{HTML::link('admin/del-test/'.$data['id'], '[del]')}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop