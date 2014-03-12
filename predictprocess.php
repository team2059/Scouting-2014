<?php
session_start(); 
include('functions.php');
?>
	<html>
    <head>
	<script type="text/javascript" src="js/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>


	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter(); 
	});	
	</script>
    </head>
    <body>
<?php


echo "<center><h1>Match Prediction</h1><table border='1' id='tablesorter-demo' class='tablesorter'>
     <thead><tr>
     <th><b>Team Number</b></th>
     <th><b>Data Number</b></th>
     <th><b>Auto High Target Missed</b></th>
     <th><b>Auto High Target Made</b></th>
     <th><b>Hot Goal</b></th>
     <th><b>Auto Low Target Missed</b></th>
     <th><b>Auto Low Target Made</b></th>
     <th><b>Hot Zone</b></th>
     <th><b>High Target Missed</b></th>
     <th><b>High Target Made</b></th>
     <th><b>Low Target Missed</b></th>
     <th><b>Low Target Made</b></th>
     <th><b>Passes</b></th>
     <th><b>Catches</b></th>
     <th><b>Truss</b></th>
     <th><b>Estimate Points Prevented</b></th>
	 <th><b>Tele Score</b></th>
	 <th><b>Auto Score</b></th>
	 <th><b>Total Score</b></th>
	 <th><b>Auto Accuracy</b></th>
	 <th><b>Tele Accuracy</b></th>
     
     </tr></thead><tbody>";

	$red = "<tr bgcolor='#ff6666'>";
	$blue = "<tr bgcolor='#6666ff'>";


  //TODO: Change this back to $_POST in live
  if(empty($_GET['team'])){
    alliance($_REQUEST['red1'],"red");
    alliance($_REQUEST['red2'],"red");
    alliance($_REQUEST['red3'],"red");
    alliance($_REQUEST['blue1'],"blue");
    alliance($_REQUEST['blue2'],"blue");
    alliance($_REQUEST['blue3'],"blue");
  }else{
    alliance($_GET['team'],"red");
    alliance($_GET['team'],"red");
    alliance($_GET['team'],"red");
    alliance($_GET['team'],"blue");
    alliance($_GET['team'],"blue");
    alliance($_GET['team'],"blue");
  }
	
	$blueScore = allianceScore($_POST['blue1'])+allianceScore($_POST['blue2'])+allianceScore($_POST['blue3']);
	$redScore = allianceScore($_POST['red1'])+allianceScore($_POST['red2'])+allianceScore($_POST['red3']);
	
	echo("<h1>Blue: $blueScore Red: $redScore</h1>");


     echo"</tbody></table></center></body></html>";
	 echo"<a href='predict.php'>New Match</a>";
