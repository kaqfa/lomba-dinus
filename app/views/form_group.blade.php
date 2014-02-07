@section('jslibs')
	@parent
	
	<!--Fancy Button-->	
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }} 

	{{HTML::style('datatable/css/demo_page.css')}}	
	{{HTML::style('datatable/css/demo_table_jui.css')}}


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
            $('[name=check2]').click(function(){
	        	if( $('[name=check2]').prop( "checked" ) ){	        		
	        		$('[name="nim2"]').removeAttr('disabled');
	        		$('[name="name2"]').removeAttr('disabled');
	        		$('[name="email2"]').removeAttr('disabled');
	        		$('[name="ktm_file2"]').removeAttr('disabled');
	        	} else {
	        		$('[name="nim2"]').attr('disabled', 'disabled');
	        		$('[name="name2"]').attr('disabled', 'disabled');
	        		$('[name="email2"]').attr('disabled', 'disabled');
	        		$('[name="ktm_file2"]').attr('disabled', 'disabled');
	        	}
	        });	
	        $('[name=check3]').click(function(){
	        	if( $('[name=check3]').prop( "checked" ) ){	        		
	        		$('[name="nim3"]').removeAttr('disabled');
	        		$('[name="name3"]').removeAttr('disabled');
	        		$('[name="email3"]').removeAttr('disabled');
	        		$('[name="ktm_file3"]').removeAttr('disabled');
	        	} else {
	        		$('[name="nim3"]').attr('disabled', 'disabled');
	        		$('[name="name3"]').attr('disabled', 'disabled');
	        		$('[name="email3"]').attr('disabled', 'disabled');
	        		$('[name="ktm_file3"]').attr('disabled', 'disabled');
	        	}
	        });		
        });
        
    </script>  
@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Group Lomba</h2>
        <div class="block">
            {{ Form::open(array('url'=>'admin/group/insert')) }}            
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
				<tr>
					<td> {{Form::label('contest_id', 'Kategori Lomba')}} </td>
					<td> {{Form::select('contest_id', $contests)}} </td>
				</tr>
			</table>
			<h4 style="font-size: 13px; margin-top:15px; width: 100%;  text-align:center;">Daftar Anggota Group</h4>
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
						{{Form::hidden('participant_id1', $participantId)}}
						{{Form::hidden('check1', 1)}}
						<td> {{Form::checkbox('checkFalse', 1, true, array('disabled'=>'disabled'))}} </td>
						<td> {{Form::text('nim1')}} </td>
						<td> {{Form::text('name1', $participant->name, array('readonly'=>'readonly'))}} </td>
						<td> {{Form::email('email1', $participant->email, array('readonly'=>'readonly'))}} </td>
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
			<center>{{Form::submit('Simpan Kelompok', array('class'=>'big-button'))}}</center>
			{{Form::close()}}
        </div>
    </div>    
</div>
@stop