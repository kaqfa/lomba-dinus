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
								<li>{{$con->name.'('.$con->role.')'}}</li>								
								@endforeach	
								<li>{{HTML::link('admin/create-group/'.$data['id'], '[Tambah Lomba]')}}</li>
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