<?php
// credentials
$config['credentials'] = [
	'user' => 'test',
	'pass' => '123'
];

// Dashboard columns. 2 or 3
$config['supervisor_cols'] = 2;

// Refresh Dashboard every x seconds. 0 to disable
$config['refresh'] = 0;

// Enable or disable Alarm Sound
$config['enable_alarm'] = false;

// Show hostname after server name
$config['show_host'] = true;

$config['supervisor_servers'] = array(
	'one' => array(
		'url' => 'http://192.168.0.11/RPC2',
		'port' => '9001',
		'username' => 'test',
		'password' => '123'
	),
	'two' => array(
		'url' => 'http://192.168.0.12/RPC2',
		'port' => '9001',
		'username' => 'test',
		'password' => '123'
	),
);

// Set timeout connecting to remote supervisord RPC2 interface
$config['timeout'] = 3;

// Path to Redmine new issue url
// $config['redmine_url'] = 'http://redmine.url/path_to_new_issue_url';

// Default Redmine assigne ID
// $config['redmine_assigne_id'] = '69';


