<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('New Quiz', 'beatnik-quiz'); ?></h1>

	<?php var_dump($this->errors); ?>
	<form action="" method="POST">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="title"><?php _e('Title', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title" id="title" class="regular-text" value="">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="image"><?php _e('Featured Image', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<input type="file" name="image" id="image" class="regular-text" value="">
					</td>
				</tr>

			</tbody>
		</table>

		<?php wp_nonce_field( 'new-quiz' ); ?>
		<?php submit_button( __( 'Add Quiz', 'beatnik-quiz' ), 'primary', 'submit_quiz' ); ?>
	</form>

</div>