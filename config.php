<?php

try {

	$pdo = new PDO("mysql:dbname=sistema;host=127.0.0.1", "root", "");

} catch(PDOException $e) {

	echo "ERROR: ".$e->getMessage();
	
}

?>