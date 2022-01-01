<?php
namespace Mehedi\BeatnikQuiz\Admin;

/**
 * 
 */
class Answer
{
	public $errors = [];

	public function bt_answer_page() {
		$action = isset( $_GET['action']) ? $_GET['action'] : 'list';

		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/answer-new.php';
				break;

			case 'edit':
				$template = __DIR__ . '/views/question-edit.php';
				break;

			case 'view':
				$template = __DIR__ . '/views/question-view.php';
				break;
			
			default:
				$template = __DIR__ . '/views/question-list.php';
				break;
		}
		if ( file_exists($template)) {
			include $template;
		}
	}
	/**
	 * 
	 */
	public function form_handler_answer(){
		if ( !isset( $_POST['submit_answer'])) {
			return;
		}

		if (! wp_verify_nonce( $_POST['_wpnonce'], 'new-answer')) {
			wp_die('Are You Cheating?');
		}

		if ( ! current_user_can('manage_options')) {
			wp_die('Are You Cheating?');
		}

		$quiz_id = isset( $_POST['quiz_id']) ? $_POST['quiz_id']: '';

		$question = isset( $_POST['question']) ? sanitize_file_name( $_POST['question']): '';

		if (empty($quiz_id)) {
			$this->errors['quiz_id'] = __('Please provide a Quiz Title', 'beatnik-quiz');
		}

		if (empty($question)) {
			$this->errors['question'] = __('Please provide a Quiz Image', 'beatnik-quiz');
		}

		if (! empty($this->errors)) {
			return;
		}

		$insert_id = bt_insert_question([
			'quiz_id'	=> $quiz_id,
			'question'	=> $question
		]);

		if (is_wp_error($insert_id)) {
			wp_die($insert_id->get_error_message());
		}
		$redirected_to = admin_url('admin.php?page=beatnik-question&inserted=true');
		wp_redirect($redirected_to);
		exit;
	}
}