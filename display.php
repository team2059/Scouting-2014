<?php
session_start(); 
require('connection.php');

     echo "<center><h1>Sample Results</h1><table border='1' class='sortable'>
     <tr>
     <td><b>Team Number</b></td>
     <td><b>Match Number</b></td>
     <td><b>High Target Missed</b></td>
     <td><b>High Target Made</b></td>
     <td><b>Hot Goal</b></td>
     <td><b>Low Target Missed</b></td>
     <td><b>Low Target Made</b></td>
     <td><b>Hot Zone</b></td>
     <td><b>Start Posistion</b></td>
     <td><b>High Target Missed</b></td>
     <td><b>High Target Made</b></td>
     <td><b>Low Target Missed</b></td>
     <td><b>Low Target Made</b></td>
     <td><b>Passes</b></td>
     <td><b>Catches</b></td>
     <td><b>Truss</b></td>
     <td><b>Estimate Points Prevented</b></td>
     <td><b>Notes</b></td>
     
     </tr>";
	 $resultsTable;
	 $sql=file_get_contents('rounds.sql');
	 if(!$data=$dbh->query($sql)){
     	die('There was an error');
	 }
    // while($record = mysql_fetch_array($db_query)){
	while($row=$data->fetch_assoc()){
          echo "<tr>";
          echo"<td>" . $record['teamNumber'] . "</td>";
          echo"<td>" . $record['matchNumber'] . "</td>";
          echo"<td>" . $record['autohtMiss'] . "</td>";
          echo"<td>" . $record['autohtMade'] . "</td>";
          echo"<td>" . $record['hotGoal'] . "</td>";
          echo"<td>" . $record['autoltMiss'] . "</td>";
          echo"<td>" . $record['autoltMade'] . "</td>";
          echo"<td>" . $record['hotZone'] . "</td>";
          echo"<td>" . $record['startPosition'] . "</td>";
          echo"<td>" . $record['htMiss'] . "</td>";
          echo"<td>" . $record['htMade'] . "</td>";
          echo"<td>" . $record['ltMiss'] . "</td>";
          echo"<td>" . $record['ltMade'] . "</td>";
          echo"<td>" . $record['passes'] . "</td>";
          echo"<td>" . $record['catches'] . "</td>";
          echo"<td>" . $record['truss'] . "</td>";
          echo"<td>" . $record['pointsPrevented'] . "</td>";
          echo"<td>" . $record['note'] . "</td>";
          echo"</tr>";
     }
     echo"</table></center>";
