<?php
namespace Mehedi\BeatnikQuiz\Admin;

/**
 * 
 */
class Question
{
	public $errors = [];

	public function bt_question_page() {
		$action = isset( $_GET['action']) ? $_GET['action'] : 'list';
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/question-new.php';
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
	public function form_handler_question(){
		if ( !isset( $_POST['submit_question'])) {
			return;
		}

		if (! wp_verify_nonce( $_POST['_wpnonce'], 'new-question')) {
			wp_die('Are You Cheating?');
		}

		if ( ! current_user_can('manage_options')) {
			wp_die('Are You Cheating?');
		}

		$quiz_id = isset( $_POST['quiz_id']) ? $_POST['quiz_id']: '';

		// $question = isset( $_POST['question']) ? sanitize_file_name( $_POST['question']): '';
		$question = media_handle_upload('question', 0);

		// $answer = isset( $_POST['answer']) ?  $_POST['answer']: [];
		$answer = isset( $_POST['answer']) ?  $_POST['answer']: '';

		if (empty($quiz_id)) {
			$this->errors['quiz_id'] = __('Please provide a Quiz Title', 'beatnik-quiz');
		}

		if (empty($question)) {
			$this->errors['question'] = __('Please provide a Quiz Image', 'beatnik-quiz');
		}

		if (empty($answer)) {
			$this->errors['answer'] = __('Please provide a Answer', 'beatnik-quiz');
		}

		if (! empty($this->errors)) {
			return;
		}
		$i = 1;

		$some = [];
		foreach($answer as $a) {
			$b = [];
			$b['id'] = $i++;
			$b['title'] = $a[0];
			$b['status'] = $a[1];
			array_push($some, $b);
		}
		// print_r($some);
		// wp_die(print_r($answer));
		$insert_id = bt_insert_question([
			'quiz_id'	=> $quiz_id,
			'question'	=> $question,
			// 'answer'	=> 'একজন প্রকৃত',
			'answer'	=> wp_json_encode($some, JSON_UNESCAPED_UNICODE),
		]);
		// var_dump($insert_id);

		if (is_wp_error($insert_id)) {
			wp_die($insert_id->get_error_message());
		}
		$redirected_to = admin_url('admin.php?page=beatnik-question&inserted=true');
		wp_redirect($redirected_to);
		exit;
	}
}
