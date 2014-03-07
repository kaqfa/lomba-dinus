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
        <h2>List Soal Untuk Tes {{$testName}} </h2>
        <div class="block">
        	{{HTML::link('admin/create-question/'.$testId,'+ Tambah Soal Tes', array('class'=>'big-button'))}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Pertanyaan</th>
						<th>Opsi Jawaban</th>						
						<th>Jawaban Benar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach($quests as $data)
					<?php $textAns = array($data['optA'], $data['optB'], $data['optC'], $data['optD'], $data['optE']); ?>
					<tr class="odd gradeX">
						<td> {{$no}} </td>
						<td> {{$data['question']}} </td>
						<td> {{HTML::ol($textAns, array('style'=>'list-style-type:lower-alpha'))}} </td>
						<td> {{$textAns[$data['answer']-1]}} </td>
						<td>
							{{HTML::link('admin/edit-question/'.$data['id'], 'edit', array('class'=>'small-button yellow'))}} 
							{{HTML::link('admin/del-question/'.$data['id'], 'del', array('class'=>'small-button red'))}} 
						</td>
					</tr>
					<?php $no++; ?>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop