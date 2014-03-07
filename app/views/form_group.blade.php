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
<?php		
	if(isset($valGroup)){ // if edit group	
		$i = 0;
		foreach ($members as $member) {
			$participant[$i]['id'] 		= $member->id;
			$participant[$i]['nim'] 	= $member->nim;
			$participant[$i]['name'] 	= $member->name;
			$participant[$i]['email'] 	= $member->email;
			$i++;
		}

		for ($j = $i; $j < 3; $j++) {
			$participant[$j]['id'] 		= 0;
			$participant[$j]['nim'] 	= '';
			$participant[$j]['name'] 	= '';
			$participant[$j]['email'] 	= '';			
		}
	} else { // if create group
		$valGroup = new stdClass();
		$valGroup->id = 0;
		$valGroup->name = '';
		$valGroup->advisor = '';
		$valGroup->contact = $part->contact;
		$valGroup->contest_id = 1;

		$participant[0]['id'] 		= $part->id;
		$participant[0]['nim'] 		= $part->nim;
		$participant[0]['name'] 	= $part->name;
		$participant[0]['email'] 	= $part->email;

		for ($i = 1; $i < 3; $i++) {
			$participant[$i]['id'] 		= 0;
			$participant[$i]['nim'] 	= '';
			$participant[$i]['name'] 	= '';
			$participant[$i]['email'] 	= '';			
		}
		//$participant[0]['id'] = $participantId;
	}
?>
@section('mainarea')
<div class="grid_12">
            
    <div class="box round first fullpage">
        <h2>Form Group Lomba</h2>
        <div class="block">
        @if( $valGroup->id > 0 )
        	{{Form::open(array('url'=>'admin/group/edit'))}}
        	{{Form::hidden('groupId',$valGroup->id)}}        	
        @else
        	{{ Form::open(array('url'=>'admin/group/insert')) }}
        @endif
			<table class="form">
				<tr>
					<td> {{Form::label('name', 'Nama Group')}} </td>
					<td> {{Form::text('name', $valGroup->name, array('class'=>'medium'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('advisor', 'Nama Pembimbing')}} </td>
					<td> {{Form::text('advisor', $valGroup->advisor, array('class'=>'medium'))}} </td>
				</tr>
				<tr>
					<td> {{Form::label('contact', 'Nomor (Hand)Phone')}} </td>
					<td> {{Form::text('contact', $valGroup->contact)}} </td>
				</tr>									
				<tr>
					<td> {{Form::label('contest_id', 'Kategori Lomba')}} </td>
					<td> {{Form::select('contest_id', $contests, $valGroup->contest_id)}} </td>
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
						{{Form::hidden('participant_id1', $participant[0]['id'])}}
						{{Form::hidden('check1', 1)}}
						<td> {{Form::checkbox('checkFalse', 1, true, array('disabled'=>'disabled'))}} </td>
						<td> {{Form::text('nim1', $participant[0]['nim'])}} </td>
						<td> {{Form::text('name1', $participant[0]['name'], array('readonly'=>'readonly'))}} </td>
						<td> {{Form::email('email1', $participant[0]['email'], array('readonly'=>'readonly'))}} </td>
						<td class="center"> {{Form::file('ktm_file1')}} </td>
						<td class="center"> Ketua </td>
					</tr>
					<tr class="even gradeC">
					<?php if($participant[1]['id'] > 0){ $cb = true; $disabled = array(); } 
								else { $cb = false; $disabled = array('disabled'=>'disabled'); }  ?>
						{{Form::hidden('participant_id2', $participant[1]['id'])}}
						<td> {{Form::checkbox('check2', 1, $cb )}} </td>
						<td> {{Form::text('nim2',  $participant[1]['nim'], $disabled )}} </td>
						<td> {{Form::text('name2',  $participant[1]['name'], $disabled )}} </td>
						<td> {{Form::email('email2',  $participant[1]['email'], $disabled )}} </td>
						<td class="center"> {{Form::file('ktm_file2', $disabled )}} </td>
						<td class="center"> Anggota </td>
					</tr>
					<tr class="odd gradeX">
					<?php if($participant[2]['id'] > 0){ $cb = true; $disabled = array(); } 
								else { $cb = false; $disabled = array('disabled'=>'disabled'); }  ?>
						{{Form::hidden('participant_id3', $participant[2]['id'])}}
						<td> {{Form::checkbox('check3', 1, $cb )}} </td>
						<td> {{Form::text('nim3',  $participant[2]['nim'], $disabled )}} </td>
						<td> {{Form::text('name3',  $participant[2]['name'], $disabled )}} </td>
						<td> {{Form::email('email3',  $participant[2]['email'], $disabled )}} </td>
						<td class="center"> {{Form::file('ktm_file3', $disabled )}} </td>
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