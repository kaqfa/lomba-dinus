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
        	{{HTML::link('admin/create-user','[Tambah Pengguna]')}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Username</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Kontak</th>
						<th>Level</th>
						<th>Last Login</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $data)
					<tr class="odd gradeX">
						<td> {{$data['username']}} </td>
						<td> {{$data['name']}} </td>
						<td> {{$data['email']}} </td>
						<td> {{$data['contact']}} </td>
						<td> {{$userLevel[$data['level']]}} </td>
						<td> {{$data['last_login']}} </td>
						<td> {{($data['status'] == 1 ? 'Aktif' : 'Non-Aktif') }} </td>
						<td>
							{{HTML::link('admin/user-edit/'.$data['id'], '[edit]')}} ||  
							{{HTML::link('admin/user-del/'.$data['id'], '[del]')}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop