<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('All Questions', 'beatnik-quiz'); ?></h1>

	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=beatnik-question&action=new'); ?>"><?php _e('Add New', 'beatnik-quiz'); ?></a>

	<?php if (isset($_GET['inserted'])) { ?>
			<div class="notice notice-success">
				<p><?php _e('Question has been Addedd Successfully!', 'beatnik-quiz'); ?></p>
			</div>
		<?php } ?>

	<?php if (isset($_GET['question-deleted']) && $_GET['question-deleted'] == 'true') { ?>
		<div class="notice notice-success">
			<p><?php _e('Question has been Deleted Successfully!', 'beatnik-quiz'); ?></p>
		</div>
	<?php } ?>

	<form action="" method="POST">
		<?php
		$table = new Mehedi\BeatnikQuiz\Admin\Question_List();
		$table->prepare_items();
		$table->search_box('search', 'search_id');
		$table->display();
		?>
	</form>
</div>