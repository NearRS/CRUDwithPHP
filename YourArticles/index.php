<?php require_once '../database.php';
$statement = $conn->prepare('SELECT articleName, availability, authorUsername, publicationDate, majorTopic, minorTopic, summary, firstName, lastName
FROM nuc353_1.Articles, nuc353_1.Users
WHERE nuc353_1.Articles.authorUsername = :username AND nuc353_1.Articles.authorUsername = nuc353_1.Users.username
GROUP BY articleName');
$statement->bindParam(":username", $_COOKIE["username"]);
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
</head>
<body>
	 <h1> List of Articles.</h1>
	 <a href="./create.php?username=<?= $_COOKIE["username"] ?>">Add a new Article</a>
	 <table>
	 	<thead>
	 		<tr>
	 			<td>Article Name</td>
	 			<td>Author First Name</td>
	 			<td>Author Last Name</td>
	 			<td>Organization Name</td>
	 			<td>Major Topic</td>
	 			<td>Minor Topic</td>
	 			<td>Summary</td>
	 			<td>Actions</td>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php 
      
       
       while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {?>
	 			<tr>
	 				<td><?= $row['articleName']?></td>
	 				<td><?= $row['firstName'] ?></td>
	 				<td><?= $row['lastName'] ?></td>
	 				<td><?= $row['orgName'] ?></td>
	 				<td><?= $row['majorTopic'] ?></td>
	 				<td><?= $row['minorTopic'] ?></td>
	 				<td><?= $row['summary'] ?></td>
	 				<td><a href="./delete.php?articleName=<?= $row['articleName'] ?>"> Delete </a>
	 					<a href="./edit.php?articleName=<?= $row['articleName'] ?>"> Edit </a>
        
	 				</td>
	 				</tr>

	 				 	<?php } ?>
</tbody>
</table>
<a href="../">Back to homepage</a>
	</body>
</h>      