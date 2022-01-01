<?php 

function bt_insert_quiz( $args = []){
	global $wpdb;

	if ( empty($args['title'])){
		return new \WP_Error( 'no-title', __('You must provide a title.', 'beatnik-quiz'));
	}

	$defaults = [
		'title'	=> '',
		'image'	=> '',
		'created_at'	=> current_time('mysql'),
	];

	$data = wp_parse_args( $args, $defaults);


	$inserted = $wpdb->insert(
		"{$wpdb->prefix}quizes",
		$data,
		[
			'%s',
			'%s',
			'%s'
		]
	);

	if (! $inserted) {
		return new \WP_Error('failed-to-insert', __('Failed to isert data', 'beatnik-quiz'));
	}
	return $wpdb->insert_id;
}

function bt_get_quiz( $args= []) {
	global $wpdb;

	$defaults  = [
		'number' => 20,
		'offset' => 0,
		'orderby' => 'id',
		'order' => 'ASC'
	];

	$args = wp_parse_args( $args, $defaults);

	$items = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}quizes
			ORDER BY %s %s
			LIMIT %d, %d",
			$args['orderby'],$args['order'],$args['offset'],$args['number']
		)
	);
	return $items;
}

function bt_quiz_count(){
	global $wpdb;

	return (int) $wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}quizes");
}




// Question Function. 


function bt_insert_question( $args = []){
	global $wpdb;

	if ( empty($args['question'])){
		return new \WP_Error( 'no-question', __('You must provide a question.', 'beatnik-quiz'));
	}

	$defaults = [
		'quiz_id'		=> '',
		'question'		=> '',
		'answer'		=> [],
		'created_at'	=> current_time('mysql'),
	];

	$data = wp_parse_args( $args, $defaults);

	$inserted = $wpdb->insert(
		"{$wpdb->prefix}quiz_questions",
		$data,
		[
			'%d',
			'%s',
			'%s',
			'%s'
		]
	);

	if (! $inserted) {
		return new \WP_Error('failed-to-insert', __('Failed to isert data', 'beatnik-quiz'));
	}
	return $wpdb->insert_id;
}

function bt_get_question( $args= []) {
	global $wpdb;

	$defaults  = [
		'number' => 20,
		'offset' => 0,
		'orderby' => 'id',
		'order' => 'ASC'
	];

	$args = wp_parse_args( $args, $defaults);

	$items = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}quiz_questions
			ORDER BY %s %s
			LIMIT %d, %d",
			$args['orderby'],$args['order'],$args['offset'],$args['number']
		)
	);
	return $items;
}

function bt_question_count(){
	global $wpdb;

	return (int) $wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}quiz_questions");
}