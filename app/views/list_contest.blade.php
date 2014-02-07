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
        <h2>List Kategori Lomba</h2>
        <div class="block">
        	{{HTML::link('admin/create-contest','+ Tambah Kategori Lomba', array('class'=>'big-button'))}}
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
						<td> {{$data->name}} </td>
						<td> {{$data->description}} </td>
						<td> {{$data->groupnum}} </td>
						<td>
							{{HTML::link('admin/edit-contest/'.$data->id, 'edit', array('class'=>'small-button yellow'))}}  
							{{HTML::link('admin/del-contest/'.$data->id, 'del', array('class'=>'small-button red'))}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop