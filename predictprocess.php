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

  //TODO: Change this back to $_POST in live
  if(empty($_GET['team'])){
    robotData($_REQUEST['red1'],"red");
    robotData($_REQUEST['red2'],"red");
    robotData($_REQUEST['red3'],"red");
    robotData($_REQUEST['blue1'],"blue");
    robotData($_REQUEST['blue2'],"blue");
    robotData($_REQUEST['blue3'],"blue");
  }else{
    robotData($_GET['team'],"red");
    robotData($_GET['team'],"red");
    robotData($_GET['team'],"red");
    robotData($_GET['team'],"blue");
    robotData($_GET['team'],"blue");
    robotData($_GET['team'],"blue");
  }
	
	$blueScore = (robotOffense($_POST['blue1'])+robotOffense($_POST['blue2'])+robotOffense($_POST['blue3']))-(robotDefense($_POST['red1'])+robotDefense($_POST['red2'])+robotDefense($_POST['red3']));
	$redScore = (robotOffense($_POST['red1'])+robotOffense($_POST['red2'])+robotOffense($_POST['red3']))-(robotDefense($_POST['blue1'])+robotDefense($_POST['blue2'])+robotDefense($_POST['blue3']));
	$margin = abs($blueScore-$redScore);
	
	if($blueScore>$redScore)echo"<h1 style='color:#1111ff'>";
	else if($blueScore<$redScore)echo"<h1 style='color:#ff1111'>";
	else echo"<h1>";
	echo("Blue: $blueScore Red: $redScore Margin: $margin</h1>");


     echo"</tbody></table></center></body></html>";
	 echo"<a href='predict.php'>New Match</a>";
