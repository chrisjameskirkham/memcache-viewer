<?php

session_start();

if (!$_SESSION['logged_in']){
	include_once('template/login.html');
	exit(0);
}

include_once('template/header.html');

require_once('viewer.php');

include_once('template/footer.html');

?>
