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
        	{{HTML::link('admin/create-activity','+ Tambah Aktifitas Lomba', array('class'=>'big-button'))}}
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
						<td> {{$data['contest']['name']}} </td>
						<td> {{$data['date_from'].' -- '.$data['date_until']}} </td>
						<td> {{$actType[$data['type']]}} </td>
						<td>
							{{HTML::link('admin/edit-contest/'.$data['id'], 'edit', array('class'=>'small-button yellow'))}} 
							{{HTML::link('admin/del-contest/'.$data['id'], 'del', array('class'=>'small-button red'))}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop