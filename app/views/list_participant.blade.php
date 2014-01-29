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
        <h2>Form Group Lomba</h2>
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
					<tr class="odd gradeX">
						<td> A11.2009.01234 </td>
						<td> Giyan Ayu Wulandari </td>
						<td> gigiyayan@gmail.com </td>
						<td class="center"> 08999988123 </td>
						<td>
							<ul>	
								<li>Inovasi Perangkat Lunak (Ketua)</li>
								<li>{{HTML::link('admin/create-group', '[Tambah Lomba]')}}</li>
							</ul>
						</td>
					</tr>
					<tr class="even gradeY">
						<td> A11.2009.01234 </td>
						<td> Giyan Ayu Wulandari </td>
						<td> gigiyayan@gmail.com </td>
						<td class="center"> 08999988123 </td>
						<td>
							<ul>	
								<li>Inovasi Perangkat Lunak (Ketua)</li>
								<li>{{HTML::link('admin/create-group', '[Tambah Lomba]')}}</li>
							</ul>
						</td>
					</tr>
					<tr class="odd gradeX">
						<td> A11.2009.01234 </td>
						<td> Giyan Ayu Wulandari </td>
						<td> gigiyayan@gmail.com </td>
						<td class="center"> 08999988123 </td>
						<td>
							<ul>	
								<li>Inovasi Perangkat Lunak (Ketua)</li>
								<li>{{HTML::link('admin/create-group', '[Tambah Lomba]')}}</li>
							</ul>
						</td>
					</tr>
					<tr class="even gradeY">
						<td> A11.2009.01234 </td>
						<td> Giyan Ayu Wulandari </td>
						<td> gigiyayan@gmail.com </td>
						<td class="center"> 08999988123 </td>
						<td>
							<ul>	
								<li>Inovasi Perangkat Lunak (Ketua)</li>
								<li>{{HTML::link('admin/create-group', '[Tambah Lomba]')}}</li>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop