<?php
namespace Mehedi\BeatnikQuiz\Admin;

if ( ! class_exists('WP_List_Table')) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
/**
 * List table class
 */
class Question_List extends \WP_List_Table
{
	
	function __construct()
	{
		parent:: __construct([
			'singular' => 'question',
			'plural' => 'questions',
			'ajax' => false
		]);

	}
	public function get_columns(){
		return [
			'cb'	=>	'<input type="checkbox"/>',
			'quiz_title' =>	__('Quiz Title', 'beatnik-quiz'),
			'question' =>	__('Question', 'beatnik-quiz'),
			'created_at' =>	__('Date', 'beatnik-quiz'),
			'action' =>	__('Action', 'beatnik-quiz'),
		];
	}

	protected function column_default( $item, $column_name) {
		switch ($column_name) {
			case 'value':
				# code...
				break;
			
			default:
				return isset($item->$column_name) ? $item->$column_name : '';
		}
	}

	public function column_quiz_title( $item){

		return sprintf(
			'<a href="%1$s"><strong>%2$s</strong></a>', admin_url('admin.php?page=beatnik-question&action=view&id' . $item->id), $item->quiz_title
		);
	}

	public function column_question( $item){

		return sprintf(
			'<a href="%1$s"><strong>%2$s</strong></a>', admin_url('admin.php?page=beatnik-question&action=view&id' . $item->id), $item->question
		);
	}

	public function column_action( $item){
		

		return sprintf(
			'<a href="%s">Add Answer</a>', admin_url('admin.php?page=beatnik-answer&action=add&id' . $item->id)
		);
	}

	protected function column_cb($item) {
		return sprintf(
			'<input type="checkbox" name="question_id[]" value="%d"/>', $item->id
		);
	}

	public function prepare_items() {
		$column = $this->get_columns();
		$hidden = [];
		$sortable = $this->get_sortable_columns();

		$per_page = 20;

		$this->_column_headers = [ $column, $hidden, $sortable ];

		$this->items = bt_get_question();
		$this->set_pagination_args( [
			'total_items'	=>	bt_question_count(),
			'per_page'		=>	$per_page
		]);
	}
}