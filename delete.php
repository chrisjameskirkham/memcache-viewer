<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

isset($_SESSION['logged_in']) or die('You must be logged in to do this.');

if (isset($_GET['delete_item'])){

	$config = parse_ini_file('config.ini.php', true);

	$MEMCACHE = new Memcache();
	$MEMCACHE->connect($config['SERVER']['SERVER'], $config['SERVER']['PORT']);
	$MEMCACHE->delete($_GET['delete_item']);
}

header("Location: index.php");

?>
