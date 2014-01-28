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
            {{ Form::open(array('url'=>'admin/contest/insert')) }}
			<table class="form">
				<tr>
					<td> {{Form::label('name', 'Nama Group')}} </td>
					<td> {{Form::text('name', null, array('class'=>'mini'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('advisor', 'Nama Pembimbing')}} </td>
					<td> {{Form::text('advisor')}} </td>
				</tr>
				<tr>
					<td> {{Form::label('contact', 'Nomor (Hand)Phone')}} </td>
					<td> {{Form::text('contact')}} </td>
				</tr>									
			</table>
			<?php $role = array('1'=>'Ketua', '2'=>'Anggota'); ?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Email</th>
						<th>File KTM</th>
						<th>Sebagai</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td> {{Form::checkbox('check1', 1, true, array('readonly'=>'readonly'))}} </td>
						<td> {{Form::text('nim1', 'A11.2009.01234', array('readonly'=>'readonly') )}} </td>
						<td> {{Form::text('name1', 'Giyan Ayu Wulandari', array('readonly'=>'readonly'))}} </td>
						<td> {{Form::email('email1', 'gigiyayan@gmail.com', array('readonly'=>'readonly'))}} </td>
						<td class="center"> {{Form::file('ktm_file1')}} </td>
						<td class="center"> Ketua </td>
					</tr>
					<tr class="even gradeC">
						<td> {{Form::checkbox('check2', 1, false )}} </td>
						<td> {{Form::text('nim2', '', array('disabled'=>'disabled') )}} </td>
						<td> {{Form::text('name2', '', array('disabled'=>'disabled') )}} </td>
						<td> {{Form::email('email2', '', array('disabled'=>'disabled') )}} </td>
						<td class="center"> {{Form::file('ktm_file2', array('disabled'=>'disabled') )}} </td>
						<td class="center"> Anggota </td>
					</tr>
					<tr class="odd gradeX">
						<td> {{Form::checkbox('check3', 1, false )}} </td>
						<td> {{Form::text('nim3', '', array('disabled'=>'disabled') )}} </td>
						<td> {{Form::text('name3', '', array('disabled'=>'disabled') )}} </td>
						<td> {{Form::email('email3', '', array('disabled'=>'disabled') )}} </td>
						<td class="center"> {{Form::file('ktm_file3', array('disabled'=>'disabled') )}} </td>
						<td class="center"> Anggota </td>
					</tr>
				</tbody>
			</table>
			<center>{{Form::submit('Simpan Kelompok')}}</center>
			{{Form::close()}}
        </div>
    </div>    
</div>
@stop