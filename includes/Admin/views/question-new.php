
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('New Question', 'beatnik-quiz'); ?></h1>

	<?php var_dump($this->errors); ?>
	<form action="" method="POST">
		<table class="form-table">
			<tbody class="input_fields_wrap input_qfields_wrap">
				<tr>
					<th scope="row">
						<label for="quiz_id"><?php _e('Quiz Title', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<?php
						global $wpdb;
						global $result;
						$result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quizes ");
						?>
						<select name="quiz_id">
						  <option value="">Select Your Quiz Title</option>
						  <?php
						  foreach( $result as $value ) { ?>
						    <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
						  <?php
						  }
						?>
						</select>

					</td>
				</tr>

			<div>
				<div>
				<tr>
					<th scope="row">
						<label for="question"><?php _e('Question', 'beatnik-quiz'); ?></label>
						<input type="file" name="question" id="question" class="regular-text" value="">
					</th>
				</tr>
				</div>
				<div>
				<tr>
					<th scope="row">
						<label for="answer[]"><?php _e('Answer', 'beatnik-quiz'); ?></label>
						<input type="text" name="answer[]"  value=""/>
					</th>
					<th scope="row">
						<label for="correct[]"><?php _e('Correct Answer?', 'beatnik-quiz'); ?></label>
						<input type="checkbox" name="correct[]"  value="false"/>
					</th>
					<td>
						<button class="add_field_button">Add More Answer</button>
						
					</td>
					
				</tr>
				</div>
			</div>
					
			</tbody>
		</table>

		<?php wp_nonce_field( 'new-question' ); ?>

		<?php submit_button( __( 'Save Question', 'beatnik-quiz' ), 'primary', 'submit_question' ); ?>
	</form>

</div>

<script src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'js/jquery.min.js'; ?>"></script>


<script type="text/javascript">  
  
    $(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<tr><th scope="row"><label for="answer"><?php _e('Answer', 'beatnik-quiz'); ?></label><input type="text" name="answer[]"  value=""/></th><td class="remove_field"><button>Remove</button></td></tr><th scope="row"><label for="correct[]"><?php _e('Correct Answer?', 'beatnik-quiz'); ?></label><input type="checkbox" name="correct[]"  value="false"/></th>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('tr').remove(); x--;
	})
});
  
</script>  


<!-- <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addQus = $('.add_qus'); //Add button selector
    var qustionwrapper = $('.dynamic_question'); //Input field wrapper
    var qustionHTML = '<tr><th scope="row"><label for="question"><?php _e('Question', 'beatnik-quiz'); ?></label></th><td><input type="file" name="question" id="question" class="regular-text" value=""></td></tr><tr><th scope="row"><label for="answer"><?php _e('Answer', 'beatnik-quiz'); ?></label></th><td><input type="text" name="answer[][]"  value=""/><a href="javascript:void(0);" class="add_button" title="Add answer"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/add-icon.png'; ?>" width="20px"/></a></td></tr>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addQus).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(qustionwrapper).append(qustionHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(qustionwrapper).on('click', '.remove', function(e){
        e.preventDefault();
        $(this).parent('tr').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.dynamic_answer'); //Input field wrapper
    var fieldHTML = '<tr><th scope="row"><label for="answer"><?php _e('Answer', 'beatnik-quiz'); ?></label></th><td><input type="text" name="answer[][]"  value=""/><a href="javascript:void(0);" class="remove_button" title="Add answer"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/remove-icon.png'; ?>" width="20px"/></a></td></tr>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('tr').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
 -->
<!-- <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.dynamic_answer'); //Input field wrapper
    var fieldHTML = '<tr><th scope="row"><label for="answer"><?php _e('Answer', 'beatnik-quiz'); ?></label></th><td style="width: 10px;"><input type="text" name="answer[]"  value="" style="width: 350px;"/></td><td class="remove_button"><a href="javascript:void(0);" title="Add answer"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/remove-icon.png'; ?>" width="20px"/></a></td></tr>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('tr').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script> -->