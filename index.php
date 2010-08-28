<?php

//get config settings
$config = parse_ini_file('config.ini', true);

//check for debug mode, and enable if on
if (isset($config['DEBUG']['DEBUG_MODE']) && $config['DEBUG']['DEBUG_MODE'] == 1){

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	define('DEBUG', true);

} else define('DEBUG', false);

//get server and port setting. Die if non-existent
isset($config['SERVER']['SERVER'])
	or die('No SERVER configuration setting in the SERVER section of config.ini.');

isset($config['SERVER']['PORT'])
	or die('No PORT configuration setting in the SERVER section of config.ini.');

//check for memcache module
$output = shell_exec('php -m');
$output = explode("\n", $output);

in_array('memcache', $output)
	or die('Memcache PHP module doesn\'t appear to be installed. It is needed.');


?>
