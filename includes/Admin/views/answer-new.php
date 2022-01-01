<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('New Answer', 'beatnik-quiz'); ?></h1>

	<?php var_dump($this->errors); ?>
	<form action="" method="POST">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="question_id"><?php _e('Question Title', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<?php
						global $wpdb;
						global $result;
						$result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quiz_questions ");
						?>
						<select name="question_id">
						  <option value="">Select Your Quiz Title</option>
						  <?php
						  foreach( $result as $value ) { ?>
						    <option value="<?php echo $value->id; ?>"><?php echo $value->id; ?></option>
						  <?php
						  }
						?>
						</select>

					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="question"><?php _e('Question', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<input type="file" name="question" id="question" class="regular-text" value="">
					</td>
				</tr>

			</tbody>
		</table>

		<?php wp_nonce_field( 'new-question' ); ?>
		<?php submit_button( __( 'Add Question', 'beatnik-quiz' ), 'primary', 'submit_question' ); ?>
	</form>

</div>