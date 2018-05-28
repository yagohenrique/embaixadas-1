<?php
	require 'environment.php';

	global $config;
	global $connection;

	$config = array();
	
	if(ENVIRONMENT == 'development') {
		define("BASE_URL", "http://localhost/SistemaEmbaixadas/");
		$config['dbname'] = 'sistema_embaixadas';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	} else {
		// Configurações hospedagem
	}

	$connection = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	$connection->exec("set names utf8");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>