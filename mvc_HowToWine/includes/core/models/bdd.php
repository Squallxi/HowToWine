<?php
	function getConnexion(){
		// Etape 1 : la connexion
		$server = 'localhost';
		$port = '3306';
		$dbname = 'howtowine';
		$username = 'root';
		$password = 'root';

		// Construction de la chaîne de connexion : Data Source Name
		$dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";
		$retVal = null;
		try{
			$retVal = new PDO($dsn, $username, $password);
		}catch(PDOException $ex){
			print('Pas possible de se connecter !!!');
			die();
		}
		return $retVal;
	}