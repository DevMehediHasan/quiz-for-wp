<?php
namespace Mehedi\BeatnikQuiz\Admin;

if ( ! class_exists('WP_List_Table')) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class Quiz_List extends \WP_List_Table
{
	
	function __construct()
	{
		parent:: __construct([
			'singular' => 'quiz',
			'plural' => 'quizes',
			'ajax' => false
		]);

	}
	public function get_columns(){
		return [
			'cb'	=>	'<input type="checkbox"/>',
			'title' =>	__('Title', 'beatnik-quiz'),
			// 'image' =>	__('Image', 'beatnik-quiz'),
			'created_at' =>	__('Date', 'beatnik-quiz'),
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
	public function column_title( $item){
		$action = [];

		$action['edit'] = sprintf('<a href="%s" title="%s">%s</a>', admin_url('admin.php?page=beatnik-quiz&action=edit&id' . $item->id), $item->id, __('Edit', 'beatnik-quiz'));

		return sprintf(
			'<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url('admin.php?page=beatnik-quiz&action=view&id' . $item->id), $item->title, $this->row_actions($action) 
		);
	}

	protected function column_cb($item) {
		return sprintf(
			'<input type="checkbox" name="quiz_id[]" value="%d"/>', $item->id
		);
	}

	public function prepare_items() {
		$column = $this->get_columns();
		$hidden = [];
		$sortable = $this->get_sortable_columns();

		$per_page = 20;

		$this->_column_headers = [ $column, $hidden, $sortable ];

		$this->items = bt_get_quiz();
		$this->set_pagination_args( [
			'total_items'	=>	bt_quiz_count(),
			'per_page'		=>	$per_page
		]);
	}
}