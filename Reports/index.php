<?php require_once '../database.php';
$statement = $conn->prepare('SELECT dateTime, ProStaTers.prostaterName, Reports.orgID, ProStaTers.population, SUM(CASE WHEN Reports.vaccineName = \'AstraZeneca\' THEN vaccinated END) AS astraVaccinations,
										SUM(CASE WHEN Reports.vaccineName = \'JnJ\' THEN vaccinated END) AS jnjVaccinations,
                                        SUM(CASE WHEN Reports.vaccineName = \'Moderna\' THEN vaccinated END) AS modernaVaccinations,
                                        SUM(CASE WHEN Reports.vaccineName = \'Pfizer\' THEN vaccinated END) AS pfizerVaccinations,
                                        SUM(CASE WHEN Reports.vaccineName = \'AstraZeneca\' THEN vaccinated END) AS astraVaccinations,
                                        SUM(CASE WHEN Reports.vaccineName = \'None\' THEN vaccinated END) AS Unvaccinated,
										SUM(CASE WHEN Reports.vaccineName = \'JnJ\' THEN infections END) AS jnjInfections,
                                        SUM(CASE WHEN Reports.vaccineName = \'Moderna\' THEN infections END) AS modernaInfections,
                                        SUM(CASE WHEN Reports.vaccineName = \'Pfizer\' THEN infections END) AS pfizerInfections,
                                        SUM(CASE WHEN Reports.vaccineName = \'AstraZeneca\' THEN infections END) AS astraInfections,
                                        SUM(CASE WHEN Reports.vaccineName = \'None\' THEN infections END) AS unvaccinatedInfections,
                                        SUM(infections) as totalInfections,
										SUM(CASE WHEN Reports.vaccineName = \'JnJ\' THEN deaths END) AS jnjCovidDeaths,
                                        SUM(CASE WHEN Reports.vaccineName = \'Moderna\' THEN deaths END) AS modernaCovidDeaths,
                                        SUM(CASE WHEN Reports.vaccineName = \'Pfizer\' THEN deaths END) AS pfizerCovidDeaths,
                                         SUM(CASE WHEN Reports.vaccineName = \'AstraZeneca\' THEN deaths END) AS astraCovidDeaths,
                                        SUM(CASE WHEN Reports.vaccineName = \'None\' THEN deaths END) AS unvaccinatedDeaths,
                                        SUM(deaths) AS totalDeaths
FROM ProStaTers, Reports, Employees
WHERE ProStaTers.prostaterName = Reports.prostaterName 
GROUP BY DATE(Reports.dateTime), Reports.prostaterName
ORDER BY Reports.dateTime DESC;');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
</head>
<body>
	 <h1> List of Reports.</h1>
	 <table>
	 	<thead>
	 		<tr>
	 			<td>dateTime</td>
	 			<td>Prostater Name</td>
	 			<td>Organization ID</td>
	 			<td>Population</td>
	 			<td>Astra Vaccinations</td>
	 			<td>Johnson&Johnson Vaccinations</td>
	 			<td>Moderna Vaccinations</td>
	 			<td>Pfizer Vaccinations</td>
         <td>Unvaccinated</td>
	 			<td>Astra Infections</td>
        <td>Johnson&Johnson Infections</td>
	 			<td>Moderna Infections</td>
	 			<td>Pfizer Infections</td>
         <td>Unvaccinated Infections</td>
         <td>Total Infections</td>
	 			<td>Astra Deaths</td>
	 			<td>Johnson&Johnson Deaths</td>
	 			<td>Moderna Deaths</td>
	 			<td>Pfizer Deaths</td>
       <td>Unvaccinated Deaths</td>
        <td>Total Deaths</td>
        <td>Actions</td>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {?>
	 		<tr>
	 				<td><?= $row['dateTime'] ?></td>
	 				<td><?= $row['prostaterName'] ?></td>
	 				<td><?= $row['orgID'] ?></td>
	 				<td><?= $row['population'] ?></td>
	 				<td><?= $row['astraVaccinations'] ?></td>
	 				<td><?= $row['jnjVaccinations'] ?></td>
	 				<td><?= $row['modernaVaccinations'] ?></td>
          <td><?= $row['pfizerVaccinations'] ?></td>
          <td><?= $row['Unvaccinated'] ?></td>
          <td><?= $row['astraInfections'] ?></td>
	 				<td><?= $row['jnjInfections'] ?></td>
            <td><?= $row['modernaInfections'] ?></td>
            <td><?= $row['pfizerInfections'] ?></td>
            <td><?= $row['unvaccinatedInfections'] ?></td>
            <td><?= $row['totalInfections'] ?></td>
	 				<td><?= $row['astraCovidDeaths'] ?></td>
	 				<td><?= $row['jnjCovidDeaths'] ?></td>
	 				<td><?= $row['modernaCovidDeaths'] ?></td>
	 				<td><?= $row['pfizerCovidDeaths'] ?></td>
          <td><?= $row['unvaccinatedDeaths'] ?></td>
	 				<td><?= $row['totalDeaths'] ?></td>
	 			
	 				</tr>
	 				<?php } ?>
</tbody>
</table>
<a href="../">Back to homepage</a>
	</body>
</h>