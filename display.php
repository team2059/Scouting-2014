<?php
session_start(); 
require('connection.php');
?>
	<html>
    <head>
	<script type="text/javascript" src="js/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>


	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	});	
	</script>
    </head>
    <body>
<?php

     echo "<center><h1>Scouting SC Results</h1><table border='1' id='tablesorter-demo' class='tablesorter'>
     <thead><tr>
     <th><b>Team Number</b></th>
     <th><b>Match Number</b></th>
     <th><b>High Target Missed</b></th>
     <th><b>High Target Made</b></th>
     <th><b>Hot Goal</b></th>
     <th><b>Low Target Missed</b></th>
     <th><b>Low Target Made</b></th>
     <th><b>Hot Zone</b></th>
     <th><b>Start Posistion</b></th>
     <th><b>High Target Missed</b></th>
     <th><b>High Target Made</b></th>
     <th><b>Low Target Missed</b></th>
     <th><b>Low Target Made</b></th>
     <th><b>Passes</b></th>
     <th><b>Catches</b></th>
     <th><b>Truss</b></th>
     <th><b>Estimate Points Prevented</b></th>
     <th><b>Notes</b></th>
     
     </tr></thead><tbody>";

	 $asdf=$dbh->query("SELECT * FROM rounds LIMIT 10000");
	 while($row = $asdf->fetch(PDO::FETCH_ASSOC)){
		  echo "<tr>";
          echo"<td>" . $row['teamNumber'] . "</td>";
          echo"<td>" . $row['matchNumber'] . "</td>";
          echo"<td>" . $row['autohtMiss'] . "</td>";
          echo"<td>" . $row['autohtMade'] . "</td>";
          echo"<td>" . $row['hotGoal'] . "</td>";
          echo"<td>" . $row['autoltMiss'] . "</td>";
          echo"<td>" . $row['autoltMade'] . "</td>";
          echo"<td>" . $row['hotZone'] . "</td>";
          echo"<td>" . $row['startPosition'] . "</td>";
          echo"<td>" . $row['htMiss'] . "</td>";
          echo"<td>" . $row['htMade'] . "</td>";
          echo"<td>" . $row['ltMiss'] . "</td>";
          echo"<td>" . $row['ltMade'] . "</td>";
          echo"<td>" . $row['passes'] . "</td>";
          echo"<td>" . $row['catches'] . "</td>";
          echo"<td>" . $row['truss'] . "</td>";
          echo"<td>" . $row['pointsPrevented'] . "</td>";
          echo"<td>" . $row['note'] . "</td>";
     echo"</tr>";
   }

     echo"</tbody></table></center></body></html>";
