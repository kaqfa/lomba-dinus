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
        <h2>List Pengguna Sistem</h2>
        <div class="block">
        	{{HTML::link('admin/create-user','+ Tambah Pengguna', array('class'=>'big-button'))}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
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
					<?php $no = 1; ?>
					@foreach($users as $data)
					<tr class="odd gradeX">
						<td> {{$no}} </td>
						<td> {{$data['username']}} </td>
						<td> {{$data['name']}} </td>
						<td> {{$data['email']}} </td>
						<td> {{$data['contact']}} </td>
						<td> {{$userLevel[$data['level']]}} </td>
						<td> {{$data['last_login']}} </td>
						<td> {{($data['status'] == 1 ? 'Aktif' : 'Non-Aktif') }} </td>
						<td>
							{{HTML::link('admin/edit-user/'.$data['id'], 'edit', array('class'=>'small-button yellow'))}} 
							{{HTML::link('admin/del-user/'.$data['id'], 'del', array('class'=>'small-button red'))}} 
						</td>
					</tr>
					<?php $no++; ?>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop