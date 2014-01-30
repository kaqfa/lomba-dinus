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
        <h2>List Kategori Lomba</h2>
        <div class="block">
        	{{HTML::link('admin/create-activity','[Tambah Aktifitas Lomba]')}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Aktifitas</th>
						<th>Deskripsi Aktifitas</th>						
						<th>Kategori Lomba</th>
						<th>Tanggal Aktifitas</th>
						<th>Jenis Aktifitas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($acts as $data)
					<tr class="odd gradeX">
						<td> {{$data['name']}} </td>
						<td> {{$data['description']}} </td>
						<td> {{$data['contest_id']}} </td>
						<td> {{$data['date_from'].' -- '.$data['date_until']}} </td>
						<td> {{$actType[$data['type']]}} </td>
						<td>
							{{HTML::link('admin/edit-contest/'.$data['id'], '[edit]')}} ||  
							{{HTML::link('admin/del-contest/'.$data['id'], '[del]')}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop