@section('jslibs')
	@parent
		
	{{ HTML::style('bluewhale/css/fancy-button/fancy-button.css') }}
    <!--Jquery UI CSS-->
	{{ HTML::style('bluewhale/css/themes/base/jquery.ui.all.css') }}    
	<!--jQuery Date Picker-->
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.widget.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.datepicker.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.progressbar.min.js') }}    
    <!-- jQuery dialog related-->
	{{ HTML::script('bluewhale/js/jquery-ui/external/jquery.bgiframe-2.1.2.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.mouse.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.draggable.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.position.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.resizable.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.dialog.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.effects.core.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.effects.blind.min.js') }}
	{{ HTML::script('bluewhale/js/jquery-ui/jquery.effects.explode.min.js') }}
    <!-- jQuery dialog end here-->
    {{ HTML::script('bluewhale/js/jquery-ui/jquery.ui.accordion.min.js') }}
    <!--Fancy Button-->
	{{ HTML::script('bluewhale/js/fancy-button/fancy-button.js') }}
    <!-- Load TinyMCE -->	
@stop

@section('jsloader')
{{ HTML::script('bluewhale/js/tiny-mce/jquery.tinymce.js') }}
<script type="text/javascript">
	$(document).ready(function () {
		setupTinyMCE();
		setupProgressbar('progress-bar');
		setDatePicker('date-picker');
		setupDialogBox('dialog', 'opener');
		$('input[type="checkbox"]').fancybutton();
		$('input[type="radio"]').fancybutton();
	});
</script>

<style type="text/css">
	#progress-bar
	{
		width: 400px;
	}
</style>

@stop

@section('mainarea')
<div class="grid_12">
            
    <div class="box round first">
        <h2>Form {{$action}} Pengguna</h2>
        <div class="block">
            <form>
				<table class="form">
					<tr>
						<td class="col1">
							<label>Normal Input</label>
						</td>
						<td class="col2">
							<input type="text" id="grumble" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Small Input</label>
						</td>
						<td>
							<input type="text" class="mini" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Medium Sized Input</label>
						</td>
						<td>
							<input type="text" class="medium" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Large Input</label>
						</td>
						<td>
							<input type="text" class="large" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Error</label>
						</td>
						<td>
							<input type="text" class="error" />
							<span class="error">This is a required field.</span>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Success</label>
						</td>
						<td>
							<input type="text" class="success" />
							<span class="success">Email address verfified.</span>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Warning</label>
						</td>
						<td>
							<input type="text" class="warning" />
						</td>
					</tr>
					<tr>
						<td>
							<label class="error">
								Label Error</label>
						</td>
						<td>
							<input type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Checkboxes</label>
						</td>
						<td>
							<input type="checkbox" />Checkbox 1
							<input type="checkbox" />Checkbox 2
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Radio Buttons</label>
						</td>
						<td>
							<input type="radio" name="rd1" />
							Male
							<input type="radio" name="rd1" />
							Female
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Select</label>
						</td>
						<td>
							<select id="select" name="select">
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Progress Bar</label>
						</td>
						<td>
							<div id="progress-bar">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Dialog Box</label>
						</td>
						<td>
							<div id="dialog" title="Basic dialog">
								<p>
									This is an animated dialog which is useful for displaying information. The dialog
									window can be moved, resized and closed with the 'x' icon.</p>
							</div>
							<button id="opener">
								Open Dialog</button>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Date Picker</label>
						</td>
						<td>
							<input type="text" id="date-picker" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Attach File</label>
						</td>
						<td>
							<input type="file" />
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top; padding-top: 9px;">
							<label>
								WYSIWYG Editor</label>
						</td>
						<td>
							<textarea class="tinymce"></textarea>
						</td>
					</tr>
				</table>
				</form>
        </div>
    </div>    
</div>
@stop