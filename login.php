<?php

if (isset($_POST['passwd'])){

	$config = parse_ini_file('config.ini.php', true);

	if (hash('sha256', $_POST['passwd']) == $config['AUTH']['PASSWORD']){

		session_start();
		$_SESSION['logged_in'] = true;

	}

}

header("Location: index.php");

?>
