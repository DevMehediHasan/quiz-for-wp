<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('All Question', 'beatnik-quiz'); ?></h1>

	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=beatnik-question&action=new'); ?>"><?php _e('Add New', 'beatnik-quiz'); ?></a>

	<form action="" method="POST">
		<?php
		$table = new Mehedi\BeatnikQuiz\Admin\Question_List();
		$table->prepare_items();
		$table->display();
		?>
	</form>
</div>