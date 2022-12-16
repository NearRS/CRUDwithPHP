<?php require_once '../database.php';
$statement = $conn->prepare('SELECT articleName, publicationDate, majorTopic, minorTopic, summary, orgName, nuc353_1.Organizations.orgID AS orgID
FROM nuc353_1.Articles, nuc353_1.Users, nuc353_1.Organizations, nuc353_1.Employees 
WHERE 
nuc353_1.Articles.orgID = nuc353_1.Organizations.orgID 
AND nuc353_1.Organizations.orgID = nuc353_1.Employees.orgID 
AND nuc353_1.Employees.username = :username
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
	
	 <table>
	 	<thead>
	 		<tr>
	 			<td>Article Name</td>
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
	 				<td><?= $row['orgName'] ?></td>
	 				<td><?= $row['majorTopic'] ?></td>
	 				<td><?= $row['minorTopic'] ?></td>
	 				<td><?= $row['summary'] ?></td>
         <td> <a href="./delete.php?articleName=<?= $row['articleName'] ?>"> Delete </a>
         <a href="./edit.php?articleName=<?= $row['articleName'] ?>"> Edit </a>
         <a href="./create.php?orgID=<?= $row['orgID'] ?>">Add a new Article</a>
         
	 				</td>
	 				</tr>
           	<?php } ?>
          

	 				 	</tbody>
</table>
<a href="../">Back to homepage</a>
	</body>
</h>