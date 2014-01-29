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
        	{{HTML::link('admin/create-contest','[Tambah Kategori Lomba]')}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Lomba</th>
						<th>Deskripsi Lomba</th>						
						<th>Jumlah Group Terdaftar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contests as $data)
					<tr class="odd gradeX">
						<td> {{$data['name']}} </td>
						<td> {{$data['descriptions']}} </td>
						<td> {{$data['groupnum']}} </td>
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