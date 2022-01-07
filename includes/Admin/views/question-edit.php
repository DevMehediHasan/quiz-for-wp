
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Edit Question', 'beatnik-quiz'); ?></h1>

	<?php if (isset($_GET['question-updated'])) { ?>
			<div class="notice notice-success">
				<p><?php _e('Question has been updated Successfully!', 'beatnik-quiz'); ?></p>
			</div>
		<?php } ?>
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
						  <option value="<?php echo esc_attr($question->id); ?>"><?php echo esc_attr($question->id); ?></option>
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
						<input type="file" name="question" id="question" class="regular-text" value="<?php echo esc_attr($question->question); ?>">
					</th>
				</tr>
				</div>
				<div>
					<?php foreach( $question as $questionv) {?>
				<tr>
					
					<th scope="row">
						<label for="answer[0][]"><?php _e('Answer', 'beatnik-quiz'); ?></label>
						<input type="text" name="answer[0][]"  value="<?php echo esc_attr($questionv->answer) ?>"/>
					</th>
					<th scope="row">
						<label for="answer[0][]"><?php _e('Correct Answer?', 'beatnik-quiz'); ?></label>
						<input type="checkbox" name="answer[0][]"  value="true"/>
					</th>

				</tr>
				<?php } ?>
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
			$(wrapper).append(`
				<tr>
					<th scope="row">
						<label for="answer[${x}][]"><?php _e('Answer', 'beatnik-quiz'); ?></label>
						<input type="text" name="answer[${x}][]" value=""/>
					</th>
					><th scope="row">
						<label for="answer[${x}][]"><?php _e('Correct Answer?', 'beatnik-quiz'); ?></label>
						<input type="checkbox" name="answer[${x}][]"  value="true"/>
					</th>
					<td class="remove_field">
						<button>Remove</button>
					</td>
				</tr>
			`); //add input box
			x++; //text box increment
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('tr').remove(); x--;
	})
});
  
</script>  
