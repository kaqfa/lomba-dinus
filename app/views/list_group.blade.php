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
        <h2>List Pengguna Sistem</h2>
        <div class="block">
        	{{HTML::link('admin/create-group','[Tambah Group]')}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Group</th>
						<th>Ketua Group</th>
						<th>Dosen Pembimbing</th>
						<th>Kontak Group</th>
						<th>Kategori Lomba</th>						
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($groups as $data)
					<tr class="odd gradeX">
						<td> {{$data['name']}} </td>
						<td> {{$data['leader']}} </td>
						<td> {{$data['advisor']}} </td>
						<td> {{$data['contact']}} </td>
						<td> {{$data['contest']}} </td>
						<td> Status Terakhir </td>
						<td>
							{{HTML::link('admin/edit-group/'.$data['id'], '[edit]')}} ||  
							{{HTML::link('admin/del-group/'.$data['id'], '[del]')}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop