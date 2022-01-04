<?php 

function bt_insert_quiz( $args = []){
	global $wpdb;

	if ( empty($args['title'])){
		return new \WP_Error( 'no-title', __('You must provide a title.', 'beatnik-quiz'));
	}

	$defaults = [
		'title'			=> '',
		'image'			=> '',
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
		return new \WP_Error('failed-to-insert', __('Failed to insert data', 'beatnik-quiz'));
	}
	return $wpdb->insert_id;
}

function bt_get_quiz( $args= []) {
	global $wpdb;

	$defaults  = [
		'number' => 20,
		'offset' => 0,
		'orderby' => 'id',
		'order' => 'DESC'
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
	// var_dump($data);
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
		return new \WP_Error('failed-to-insert', __('Failed to insert data', 'beatnik-quiz'));
	}
	return $wpdb->insert_id;
}

function bt_get_questions( $args= []) {
	global $wpdb;

	$defaults  = [
		'number' => 20,
		'offset' => 0,
		'orderby' => 'id',
		'order' => 'DESC'
	];

	$args = wp_parse_args( $args, $defaults);

	$sql =$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}quiz_questions
			ORDER BY {$args['orderby']} {$args['order']}
			LIMIT %d, %d",
			$args['offset'], $args['number']
	);

	$items = $wpdb->get_results( $sql);
	return $items;
}

function bt_question_count(){
	global $wpdb;

	return (int) $wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}quiz_questions");
}

function bt_get_question( $id ) {
	global $wpdb;

	return $wpdb->get_row(
		$wpdb->prepare("SELECT * FROM {$wpdb->prefix}quiz_questions WHERE id = %d", $id )
	);
}

add_action( 'init', function(){
    add_rewrite_rule(
        'quiz/([a-z]+)/?$',
        'index.php?quiz=$matches[1]',
        'top' );
}

add_filter( 'query_vars', function($query_vars) );
    $query_vars[] = 'quiz';
    return $query_vars;
}

add_action('template_include', function($template){
	if ( get_query_var('quiz') == false || get_query_var('quiz') == '' ){
		return $template;
	}
	return BT_QUIZ_TEMPLETE . '/quiz.php';
});