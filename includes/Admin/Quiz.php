<?php
namespace Mehedi\BeatnikQuiz\Admin;

/**
 * 
 */
class Quiz
{
	public $errors = [];

	public function plugin_page() {
		$action = isset( $_GET['action']) ? $_GET['action'] : 'list';

		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/quiz-new.php';
				break;

			case 'edit':
				$template = __DIR__ . '/views/quiz-edit.php';
				break;

			case 'view':
				$template = __DIR__ . '/views/quiz-view.php';
				break;
			
			default:
				$template = __DIR__ . '/views/quiz-list.php';
				break;
		}
		if ( file_exists($template)) {
			include $template;
		}
	}
	/**
	 * 
	 */
	public function form_handler(){
		if ( !isset( $_POST['submit_quiz'])) {
			return;
		}

		if (! wp_verify_nonce( $_POST['_wpnonce'], 'new-quiz')) {
			wp_die('Are You Cheating?');
		}

		if ( ! current_user_can('manage_options')) {
			wp_die('Are You Cheating?');
		}

		$title = isset( $_POST['title']) ? sanitize_text_field( $_POST['title']): '';

		// $image = isset( $_POST['image']) ? sanitize_file_name( $_POST['image']): '';

		$image = media_handle_upload('image', 0);

		if (empty($title)) {
			$this->errors['title'] = __('Please provide a Title', 'beatnik-quiz');
		}

		if (empty($image)) {
			$this->errors['image'] = __('Please provide a Quiz Image', 'beatnik-quiz');
		}

		if (! empty($this->errors)) {
			return;
		}

		$insert_id = bt_insert_quiz([
			'title'	=> $title,
			'image'	=> $image
		]);

		if (is_wp_error($insert_id)) {
			wp_die($insert_id->get_error_message());
		}
		$redirected_to = admin_url('admin.php?page=beatnik-quiz&inserted=true');
		wp_redirect($redirected_to);
		exit;
	}

	public function has_error($key)
	{
		return isset($this->errors[$key]) ? true : false;
	}

	public function get_error($key)
	{
		if (isset($this->errors[$key])) {
			return $this->errors[ $key ];
		}
		return false;
	}
}