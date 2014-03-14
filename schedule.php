<?php
session_start(); 
require('connection.php');
include('functions.php');
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
	include('menu.php');
     echo "<center><h1>NC Schedule and Predictions</h1><table border='1' id='tablesorter-demo' class='tablesorter'>
     <thead><tr>
	 <th><b>Round</b></th>
     <th><b>Red 1</b></th>
     <th><b>Red 2</b></th>
     <th><b>Red 3</b></th>
     <th><b>Blue 1</b></th>
     <th><b>Blue 2</b></th>
     <th><b>Blue 3</b></th>
	 <th><b>Red Score</b></th>
	 <th><b>Blue Score</b></th>
	 <th><b>Margin Score</b></th>
     </tr></thead><tbody>";

	 $asdf=$dbh->query("SELECT * FROM `schedule` WHERE 1");
	 while($row = $asdf->fetch(PDO::FETCH_ASSOC)){
          echo"<td>" . $row['round'] . "</td>";  
		  echo"<td>" . $row['red1'] . "</td>";      
		  echo"<td>" . $row['red2'] . "</td>"; 
		  echo"<td>" . $row['red3'] . "</td>";  
		  echo"<td>" . $row['blu1'] . "</td>"; 
		  echo"<td>" . $row['blu2'] . "</td>"; 
		  echo"<td>" . $row['blu3'] . "</td>";
		  list($redScore, $blueScore, $margin) = score($row['red1'],$row['red2'],$row['red3'],$row['blu1'],$row['blu2'],$row['blu3']);  
		  echo"<td>" . $redScore . "</td>";
		  echo"<td>" . $blueScore . "</td>";
		  echo"<td>" . $margin . "</td>";
     echo"</tr>";
   }

     echo"</tbody></table></center></body></html>";
