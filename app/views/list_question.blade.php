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
        <h2>List Soal Untuk Tes {{$testName}} </h2>
        <div class="block">
        	{{HTML::link('admin/create-question/'.$testId,'[Tambah Soal Tes]')}}
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Pertanyaan</th>
						<th>Opsi Jawaban</th>						
						<th>Jawaban Benar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($quests as $data)
					<tr class="odd gradeX">
						<td> {{$data['question']}} </td>
						<td> {{HTML::ol(array($data['optA'], $data['optB'], $data['optC'], $data['optD'], $data['optE']))}} </td>
						<td> {{$data['answer']}} </td>
						<td>
							{{HTML::link('admin/edit-question/'.$data['id'], '[edit]')}} ||  
							{{HTML::link('admin/del-contest/'.$data['id'], '[del]')}} 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>    
</div>
@stop