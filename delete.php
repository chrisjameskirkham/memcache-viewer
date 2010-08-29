<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

isset($_SESSION['logged_in']) or die('You must be logged in to do this.');

if (isset($_GET['delete_item'])){

	$config = parse_ini_file('config.ini.php', true);

	/*
	 * Because of an API change on Memcache's side, the PHP module's 'delete'
	 * doesn't work (it hasn't been updated). I've used raw sockets instead.
	 *
	 * See http://pecl.php.net/bugs/bug.php?id=16927 for bug report.
	 */

	$fs = fsockopen($config['SERVER']['SERVER'], $config['SERVER']['PORT']);

	fwrite($fs, 'delete ' . $_GET['delete_item'] . "\r\n");

	fclose($fs);

}

header("Location: index.php");

?>
