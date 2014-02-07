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
        <h2>List Partisipan Lomba</h2>
        <div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>NIM</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Kontak</th>
						<th>Lomba yang diikuti</th>
					</tr>
				</thead>
				<tbody>
					@foreach($participants as $data)
					<tr class="odd gradeX">
						<td> {{$data['nim']}} </td>
						<td> {{$data['name']}} </td>
						<td> {{$data['email']}} </td>
						<td class="center"> {{$data['contact']}} </td>
						<td>
							<ul>	
								@foreach($data['contests'] as $con)
								<li><strong>{{$con->contest}}</strong></li>
								@endforeach	
								<li>{{HTML::link('admin/create-group/'.$data['id'], 'Tambah Lomba', array('class'=>'small-button green'))}}</li>
							</ul>
						</td>
					</tr>
					@endforeach					
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop