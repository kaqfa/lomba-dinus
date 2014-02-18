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
        <h2>Group yang Melakukan Aktifitas</h2>
        <div class="block">        	
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Nama Group</th>
						<th>Pembimbing</th>						
						<th>Kontak Tim</th>
						<th>Status</th>
						<th>Score</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($groups as $data)
					<tr class="odd gradeX">
						<td> {{$data->name}} </td>
						<td> {{$data->advisor}} </td>
						<td> {{$data->contact}} </td>
						<td> {{$data->status}} </td>
						<td> {{$data->score}} </td>
						<td>
							{{HTML::link('admin/edit-activity/'.$data['id'], 'tampil', array('class'=>'small-button yellow'))}} 
							{{HTML::link('admin/del-activity/'.$data['id'], 'scoring', array('class'=>'small-button red'))}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop