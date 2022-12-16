<?php require_once '../database.php';
if(empty($_GET["orgID"])){

$statement = $conn->prepare("INSERT INTO nuc353_1.Subscriptions (username, authorUsername) VALUES (:username, :authorName)");
	$statement->bindParam(':username', $_COOKIE["username"]);
	$statement->bindParam(':authorName', $_GET["authorUsername"]);
$statement->execute();}
else{
$statement = $conn->prepare("INSERT INTO nuc353_1.Subscriptions (username, orgID) VALUES (:username, :orgID)");
	$statement->bindParam(':username', $_COOKIE["username"]);
	$statement->bindParam(':orgID', $_GET["orgID"]);
$statement->execute();}

  header("Location: .");
  ?>