<?php require_once '../database.php';

if(isset($_POST["orgID"]) && isset($_POST["articleName"]) && isset($_POST["majorTopic"]) && isset($_POST["minorTopic"]) && isset($_POST["summary"])  && isset($_POST["articleContent"])){
	$Org = $conn->prepare("INSERT INTO nuc353_1.Articles (articleName, orgID, publicationDate, majorTopic, minorTopic, summary, articleContent, availability) VALUES (:articleName, :orgID, :publication,:major, :minor, :summary, :content, 'available')");
	$Org->bindParam(':orgID', $_POST["orgID"]);
	$Org->bindParam(':articleName', $_POST["articleName"]);
	$Org->bindParam(':major', $_POST["majorTopic"]);
	$Org->bindParam(':minor', $_POST["minorTopic"]);
	$Org->bindParam(':summary', $_POST["summary"]);
	$Org->bindParam(':content', $_POST["articleContent"]);
	$date = date('Y-m-d H:i:s');
	$Org->bindParam(':publication', $date);



	if($Org->execute()){
		header("Location: .");

	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
</head>
<body>
	<form action="./create.php" method="post">
	

	 <input type="hidden" name="orgID" value="<?= $_GET['orgID']?>">
		<label for="Org">Article Name</label><br>
		<input type="text" name ="articleName" id="Name"> <br>
		<label for="Org">Major Topic</label><br>
		<input type="text" name ="majorTopic" id="Name"> <br>
		<label for="Org">Minor Topic</label><br>
		<input type="text" name ="minorTopic" id="Name"> <br>
		<label for="Org">Summary</label><br>
		<input type="text" name ="summary" id="Name"> <br>
		<label for="Org">Article Content</label><br>
		<input type="text" name ="articleContent" id="Name"> <br>
		<button type ="submit">Add Article</button>
	</form>
</body>
</html>                            