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
	 <th><b>Tele Score</b></th>
	 <th><b>Auto Score</b></th>
	 <th><b>Total Score</b></th>
	 <th><b>Auto Accuracy</b></th>
	 <th><b>Tele Accuracy</b></th>
     
     </tr></thead><tbody>";
	 
	 $lastNumber=0;
	 $change=false;
	 $color=false;

	 $asdf=$dbh->query("SELECT * FROM `rounds` WHERE 1 ORDER BY `teamNumber`");
	 while($row = $asdf->fetch(PDO::FETCH_ASSOC)){
		 
		  if($row['teamNumber']==$lastNumber){}
		  else{
			  if($color==false){
				  $color=true;
			  }
			  else {
				  $color=false;
			  }
		  }
		  if($color==false){
				  echo "<tr bgcolor='#ff0000'>";
			  }
			  else {
				  echo "<tr bgcolor='#ffffff'>";
			  }
		  
		  $lastNumber=$row['teamNumber'];

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
		  $tScore=($row['htMade']*10)+($row['ltMade']*1)+($row['passes']*10)+($row['truss']*10);
		  echo"<td>" . $tScore . "</td>";
		  $aScore=($row['autohtMade']*15)+($row['autoltMade']*6)+($row['hotGoal']*5);
		  if($row['hotZone']=='yes')$aScore=$aScore+5;
		  echo"<td>" . $aScore . "</td>";
		  $totalScore=$tScore+$aScore;
		  echo"<td>" . $totalScore . "</td>";
		  if(($row['autohtMiss']+$row['autohtMade'])>0)$aAccuracy=(($row['autohtMade'])/($row['autohtMiss']+$row['autohtMade']))*100;
		  else $aAccuracy='-';
		  echo"<td>" . $aAccuracy . "</td>";
		  if(($row['htMiss']+$row['htMade'])>0)$tAccuracy=(($row['htMade'])/($row['htMiss']+$row['htMade']))*100;
		  else $tAccuracy='-';
		  echo"<td>" . $tAccuracy . "</td>";
     echo"</tr>";
   }

     echo"</tbody></table></center></body></html>";
