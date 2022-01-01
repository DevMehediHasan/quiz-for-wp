<?php

global $order_db_version;
$order_db_version = '1.0';

function order_db() {
	global $wpdb;
	global $order_db_version;

	$table_name = $wpdb->prefix . 'order';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		email varchar(100) NOT NULL,
		phone varchar(55) NOT NULL,
		amount double NOT NULL,
		address text NOT NULL,
		status varchar(55) NOT NULL,
		transaction_id varchar(100) NOT NULL,
		currency varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'order_db_version', $order_db_version );
}

function order_db_data() {
	global $wpdb;

	$wp_name = 'Mr. Mehedi';
	$wp_email = 'mehedi.starit@gmail.com';
	$wp_phone = '01878831122';
	$wp_amount = '500';
	$wp_address = 'Dhaka';
	$wp_status = 'Approved';
	$wp_tid = '01878831122';
	$wp_currency = 'BDT';

	$table_name = $wpdb->prefix . 'order';

	$wpdb->insert(
		$table_name,
		array(
			'name' => $wp_name,
			'email' => $wp_email,
			'phone' => $wp_phone,
			'amount' => $wp_amount,
			'address' => $wp_address,
			'status' => $wp_status,
			'transaction_id' => $wp_tid,
			'currency' => $wp_currency,
		)
	);
}