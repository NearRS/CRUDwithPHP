<?php require_once '../database.php';
$statement = $conn->prepare('SELECT articleName, publicationDate, majorTopic, minorTopic, summary, firstName, lastName, orgName, articleContent FROM nuc353_1.Articles, nuc353_1.Users, nuc353_1.Organizations WHERE nuc353_1.Articles.articleName=:article AND (nuc353_1.Articles.authorUsername = nuc353_1.Users.username OR nuc353_1.Articles.orgID = nuc353_1.Organizations.orgID) GROUP BY articleName');
$statement->bindParam(':article', $_GET["article"]);
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
</head>
<body>
	
	 		<?php 
      
       
       while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {?>
	 			<tr>
	 			Article Name <br>	<?= $row['articleName']?> <br>
	 		Authout First Name	<br>	<?= $row['firstName'] ?> <br>
	 	Author Last Name		<br>	<?= $row['lastName'] ?> <br>
	 		Organization Name <br>	<?= $row['orgName'] ?> <br>
	 			Major Topic <br> <?= $row['majorTopic'] ?> <br>
	 		Minor Topic <br>	<?= $row['minorTopic'] ?> <br>
 				Summary <br> <?= $row['summary'] ?> <br>
       Full Article <br>  <?= $row['articleContent'] ?> <br>

	 				 	<?php } ?>

<a href="./">Back to List of Articles</a>
	</body>
</h>