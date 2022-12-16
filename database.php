<?php
$server = 'nuc353.encs.concordia.ca';
$username = 'nuc353_1';
$password = 'Acers9x9';
$database = 'nuc353_1';

try {
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
	die('Connection Failed: ' . $e->getMessage());
}
?>