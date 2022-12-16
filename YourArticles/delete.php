<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM nuc353_1.Articles AS Users WHERE nuc353_1.Articles.articleName = :articleName");
$statement->bindParam(":articleName", $_GET['articleName']);
$statement->execute();
header("Location: .");