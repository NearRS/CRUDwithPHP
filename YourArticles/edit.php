<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM nuc353_1.Articles WHERE nuc353_1.Articles.articleName = :articleName");
$statement->bindParam(":articleName", $_GET["articleName"]);
$statement->execute();
$User = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['articleName']) && isset($_POST['newName']) && isset($_POST['majorTopic']) && isset($_POST['minorTopic'])  && isset($_POST['summary'])  && isset($_POST['content'])){
	$statement = $conn->prepare("UPDATE nuc353_1.Articles SET articleName=:newName, majorTopic=:majorTopic, minorTopic=:minorTopic, summary=:summary, articleContent=:content
	Where articleName=:articleName;");
	$statement->bindParam(':newName',$_POST['newName'] );
   $statement->bindParam(':majorTopic', $_POST['majorTopic']);
	$statement->bindParam(':minorTopic', $_POST['minorTopic']);
	$statement->bindParam(':summary', $_POST['summary']);
		$statement->bindParam(':content', $_POST['content']);
	$statement->bindParam(':articleName', $_POST['articleName']);

	if($statement->execute()){
		header("Location: .");

	}else{
		header("Location: ./edit.php?username=".$_POST['username']);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
</head>
<body>
	<form action="./edit.php" method="post">
		<input type="hidden" name="articleName" value=<?= $_GET['articleName']?>>
		<label for="Org">Article Name </label><br>
		<input type="text" name ="newName" id="countryName" value="<?= $User['articleName']?>"> <br>
		<label for="Org">Major Topic</label><br>
		<input type="text" name ="majorTopic" id="countryName" value="<?= $User['majorTopic']?>"> <br>
		<label for="Org">Minor Topic</label><br>
		<input type="text" name ="minorTopic" id="countryName" value="<?= $User['minorTopic']?>"> <br>
		<label for="Org">Summary</label><br>
		<input type="text" name ="summary" id="countryName" value="<?= $User['summary']?>"> <br>
		<label for="Org">Article Content</label><br>
		<input type="text" name ="content" id="countryName" value="<?= $User['articleContent']?>"> <br>

		<button type ="submit">Edit Article</button>
	</form>
</body>
</html>