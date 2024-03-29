<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'MySQLi',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 * array    variables    system variables as "key => value" pairs
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => '127.0.0.1',
			'database'   => 'weirdbird',
			'username'   => 'devuser',
			'password'   => 'devpass',
			'persistent' => TRUE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => TRUE,
		'profiling'    => TRUE,
	)
);
