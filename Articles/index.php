<?php require_once '../database.php';
$statement = $conn->prepare('SELECT articleName, authorUsername, publicationDate, majorTopic, minorTopic, summary, firstName, lastName
FROM nuc353_1.Articles, nuc353_1.Users
WHERE nuc353_1.Articles.authorUsername = nuc353_1.Users.username AND nuc353_1.Articles.availability = \'available\'
GROUP BY articleName');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
</head>
<body>
	 <h1> List of Articles.</h1>
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
         <td> <a href="./read.php?article=<?= $row['articleName'] ?>"> Read Article </a>
         <a href="./subscribe.php?authorUsername=<?= $row['authorUsername'] ?>&orgID=<?= $row['orgID'] ?>"> Subscribe </a>
        
         
	 				</td>
	 				</tr>
          <?php }
          $statement = $conn->prepare('SELECT articleName, availability, nuc353_1.Organizations.orgID, publicationDate, majorTopic, minorTopic, summary, orgName
FROM nuc353_1.Articles, nuc353_1.Organizations
WHERE nuc353_1.Articles.orgID = nuc353_1.Organizations.orgID AND nuc353_1.Articles.availability = \'available\'
GROUP BY articleName');
$statement->execute();
 while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {?>
	 			<tr>
	 				<td><?= $row['articleName']?></td>
	 				<td><?= $row['firstName'] ?></td>
	 				<td><?= $row['lastName'] ?></td>
	 				<td><?= $row['orgName'] ?></td>
	 				<td><?= $row['majorTopic'] ?></td>
	 				<td><?= $row['minorTopic'] ?></td>
	 				<td><?= $row['summary'] ?></td>
         <td> <a href="./read.php?article=<?= $row['articleName'] ?>"> Read Article </a>
         <a href="./subscribe.php?authorUsername=<?= $row['authorUsername'] ?>&orgID=<?= $row['orgID'] ?>"> Subscribe </a>
        
         
	 				</td>
	 				</tr>

	 				 	<?php } ?>
</tbody>
</table>
<a href="../">Back to homepage</a>
	</body>
</h>                             