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
			'question' =>	__('Question', 'beatnik-quiz'),
			'quiz_id' =>	__('Quiz ID', 'beatnik-quiz'),
			'created_at' =>	__('Date', 'beatnik-quiz'),
		];
	}

	// public function get_bulk_actions(){
	// 	return array(
	// 		'delete'	=> _('Delete', 'beatnik-quiz'),
	// 		'edit'	=> _('Edit', 'beatnik-quiz')
	// 	);
	// }



	function get_sortable_columns(){
		$sortable_columns = [
			'question'	=> [ 'question', true ],
			'created_at'	=> [ 'created_at', true ],
		];
		return $sortable_columns;
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

		$actions= [];

		$actions['edit'] = sprintf('<a href="%s" title="%s">%s</a>', admin_url('admin.php?page=beatnik-question&action=edit&id=' . $item->id), $item->id, __('Edit', 'beatnik-quiz'));

		$actions['delete'] = sprintf('<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url(admin_url('admin-post.php?action=bt_delete_question&id=' . $item->id), 'bt_delete_question'), $item->id, __('Delete', 'beatnik-quiz'), __('Delete', 'beatnik-quiz'));


		return sprintf(
			// '<img src="%s" />',
   //      $item->question
			'<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url('admin.php?page=beatnik-question&action=view&id' . $item->id), $item->question, $this->row_actions( $actions )
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

		$per_page = 10;

		$this->_column_headers = [ $column, $hidden, $sortable ];

		$this->items = bt_get_questions();
		$this->set_pagination_args( [
			'total_items'	=>	bt_question_count(),
			'per_page'		=>	$per_page
		]);
	}
}