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

     echo "<center><h1>Scouting Summary NC Results</h1><table border='1' id='tablesorter-demo' class='tablesorter'>
     <thead><tr>
     <th><b>Team Number</b></th>
     <th><b>Data Number</b></th>
     <th><b>High Target Missed</b></th>
     <th><b>High Target Made</b></th>
     <th><b>Hot Goal</b></th>
     <th><b>Low Target Missed</b></th>
     <th><b>Low Target Made</b></th>
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
	 
	 $lastNumber=0;
	 $change=false;
	 $color=false;
	 $i=1;
	 $t=1;
	 $teamNumber=0;
	 $autohtMisst=0;
	 $autohtMadet=0;
	 $hotGoalt=0;
	 $autoltMisst=0;
	 $autoltMadet=0;
	 $hotZonet=0;
	 $htMisst=0;
	 $htMadet=0;
	 $ltMisst=0;
	 $ltMadet=0;
	 $passest=0;
	 $catchest=0;
	 $trusst=0;
	 $pointsPreventedt=0;

	 $asdf=$dbh->query("SELECT * FROM `rounds` WHERE 1 ORDER BY `teamNumber`");
	 while($row = $asdf->fetch(PDO::FETCH_ASSOC)){
		 
		if($row['teamNumber']==$lastNumber){
			//collect
			$teamNumber=$row['teamNumber'];
			$autohtMisst=$autohtMisst+$row['autohtMiss'];
			$autohtMadet=$autohtMadet+$row['autohtMade'];
			$hotGoalt=$hotGoalt+$row['hotGoal'];
			$autoltMisst=$autoltMisst+$row['autoltMiss'];
			$autoltMadet=$autoltMadet+$row['autoltMade'];
			if($row['hotZone']=='yes')$hotZonet=$hotZonet+1;
			$htMisst=$htMisst+$row['htMiss'];
			$htMadet=$htMadet+$row['htMade'];
			$ltMisst=$ltMisst+$row['ltMiss'];
			$ltMadet=$ltMadet+$row['ltMade'];
			$passest=$passest+$row['passes'];
			$catchest=$catchest+$row['catches'];
			$trusst=$trusst+$row['truss'];
			$pointsPreventedt=$pointsPreventedt+$row['pointsPrevented'];
			$i=$i+1;
		  }
		  else{
			  $change=true;
			  if($color==false){
				  $color=true;
			  }
			  else {
				  $color=false;
			  }  
	//display
	$autohtMissa=$autohtMisst/$i;
	$autohtMadea=$autohtMadet/$i;
	$hotGoala=$hotGoalt/$i;
	$autoltMissa=$autoltMisst/$i;
	$autoltMadea=$autoltMadet/$i;
	$hotZonea=$hotZonet/$i;
	$htMissa=$htMisst/$i;
	$htMadea=$htMadet/$i;
	$ltMissa=$ltMisst/$i;
	$ltMadea=$ltMadet/$i;
	$passesa=$passest/$i;
	$catchesa=$catchest/$i;
	$trussa=$trusst/$i;
	$pointsPreventeda=$pointsPreventedt/$i;
	
	if($t>1) {
		if($color==false){
			echo "<tr bgcolor='#d3d3d3'>";
		}
		else {
			echo "<tr bgcolor='#ffffff'>";
		}
	
		echo"<td>" . $teamNumber . "</td>";
		echo"<td>" . $i . "</td>";
		echo"<td>" . $autohtMissa . "</td>";
		echo"<td>" . $autohtMadea . "</td>";
		echo"<td>" . $hotGoala . "</td>";
		echo"<td>" . $autoltMissa . "</td>";
		echo"<td>" . $autoltMadea . "</td>";
		echo"<td>" . $hotZonea . "</td>";
		echo"<td>" . $htMissa . "</td>";
		echo"<td>" . $htMadea . "</td>";
		echo"<td>" . $ltMissa . "</td>";
		echo"<td>" . $ltMadea . "</td>";
		echo"<td>" . $passesa . "</td>";
		echo"<td>" . $catchesa . "</td>";
		echo"<td>" . $trussa . "</td>";
		echo"<td>" . $pointsPreventeda . "</td>";
		$tScore=($htMadea*10)+($ltMadea*1)+($passesa*10)+($trussa*10)+($catchesa*10);
		echo"<td>" . $tScore . "</td>";
		$aScore=($autohtMadea*15)+($autoltMadea*6)+($hotGoala*5)+($hotZonea*5);
		echo"<td>" . $aScore . "</td>";
		$totalScore=$tScore+$aScore;
		echo"<td>" . $totalScore . "</td>";
		if(($autohtMissa+$autohtMadea)>0)$aAccuracy=(($autohtMadea)/($autohtMissa+$autohtMadea))*100;
		else $aAccuracy='-';
		echo"<td>" . $aAccuracy . "</td>";
		if(($htMissa+$htMadea)>0)$tAccuracy=(($htMadea)/($htMissa+$htMadea))*100;
		else $tAccuracy='-';
		echo"<td>" . $tAccuracy . "</td>";
		echo"</tr>";
	}
		  
	//reset	  
    $autohtMisst=0;
	$autohtMadet=0;
	$hotGoalt=0;
	$autoltMisst=0;
	$autoltMadet=0;
	$hotZonet=0;
	$htMisst=0;
	$htMadet=0;
	$ltMisst=0;
	$ltMadet=0;
	$passest=0;
	$catchest=0;
	$trusst=0;
	$pointsPreventedt=0;
	$i=0;
	
	//collect
	$teamNumber=$row['teamNumber'];
	$autohtMisst=$autohtMisst+$row['autohtMiss'];
	$autohtMadet=$autohtMadet+$row['autohtMade'];
	$hotGoalt=$hotGoalt+$row['hotGoal'];
	$autoltMisst=$autoltMisst+$row['autoltMiss'];
	$autoltMadet=$autoltMadet+$row['autoltMade'];
	if($row['hotZone']=='yes')$hotZonet=$hotZonet+1;
	$htMisst=$htMisst+$row['htMiss'];
	$htMadet=$htMadet+$row['htMade'];
	$ltMisst=$ltMisst+$row['ltMiss'];
	$ltMadet=$ltMadet+$row['ltMade'];
	$passest=$passest+$row['passes'];
	$catchest=$catchest+$row['catches'];
	$trusst=$trusst+$row['truss'];
	$pointsPreventedt=$pointsPreventedt+$row['pointsPrevented'];
	$i=$i+1;
		  
		  
		  
		}
	$lastNumber=$row['teamNumber'];
	$t=$t+1;
	}
	
	
	//display
	$autohtMissa=$autohtMisst/$i;
	$autohtMadea=$autohtMadet/$i;
	$hotGoala=$hotGoalt/$i;
	$autoltMissa=$autoltMisst/$i;
	$autoltMadea=$autoltMadet/$i;
	$hotZonea=$hotZonet/$i;
	$htMissa=$htMisst/$i;
	$htMadea=$htMadet/$i;
	$ltMissa=$ltMisst/$i;
	$ltMadea=$ltMadet/$i;
	$passesa=$passest/$i;
	$catchesa=$catchest/$i;
	$trussa=$trusst/$i;
	$pointsPreventeda=$pointsPreventedt/$i;
	
	if($t>1) {
		if($color==true){
			echo "<tr bgcolor='#d3d3d3'>";
		}
		else {
			echo "<tr bgcolor='#ffffff'>";
		}
	
		echo"<td>" . $teamNumber . "</td>";
		echo"<td>" . $i . "</td>";
		echo"<td>" . $autohtMissa . "</td>";
		echo"<td>" . $autohtMadea . "</td>";
		echo"<td>" . $hotGoala . "</td>";
		echo"<td>" . $autoltMissa . "</td>";
		echo"<td>" . $autoltMadea . "</td>";
		echo"<td>" . $hotZonea . "</td>";
		echo"<td>" . $htMissa . "</td>";
		echo"<td>" . $htMadea . "</td>";
		echo"<td>" . $ltMissa . "</td>";
		echo"<td>" . $ltMadea . "</td>";
		echo"<td>" . $passesa . "</td>";
		echo"<td>" . $catchesa . "</td>";
		echo"<td>" . $trussa . "</td>";
		echo"<td>" . $pointsPreventeda . "</td>";
		$tScore=($htMadea*10)+($ltMadea*1)+($passesa*10)+($trussa*10)+($catchesa*10);
		echo"<td>" . $tScore . "</td>";
		$aScore=($autohtMadea*15)+($autoltMadea*6)+($hotGoala*5)+($hotZonea*5);
		echo"<td>" . $aScore . "</td>";
		$totalScore=$tScore+$aScore;
		echo"<td>" . $totalScore . "</td>";
		if(($autohtMissa+$autohtMadea)>0)$aAccuracy=(($autohtMadea)/($autohtMissa+$autohtMadea))*100;
		else $aAccuracy='-';
		echo"<td>" . $aAccuracy . "</td>";
		if(($htMissa+$htMadea)>0)$tAccuracy=(($htMadea)/($htMissa+$htMadea))*100;
		else $tAccuracy='-';
		echo"<td>" . $tAccuracy . "</td>";
		echo"</tr>";
	}

     echo"</tbody></table></center></body></html>";
