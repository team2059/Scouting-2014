<?php
function alliance($team, $color){	 
	 $i=1;

	include('connection.php');
	 $avg=$dbh->query("SELECT AVG(`autohtMiss`) AS autohtMissa, AVG(`autohtMade`) AS autohtMadea, AVG(`hotGoal`) AS hotGoala, AVG(`autoltMiss`) AS autoltMissa, AVG(`autoltMade`) AS autoltMadea, AVG(`hotZone`='yes') AS hotZonea, AVG(`htMiss`) AS htMissa, AVG(`htMade`) AS htMadea, AVG(`ltMiss`) AS ltMissa, AVG(`ltMade`) AS ltMadea, AVG(`passes`) AS passesa, AVG(`catches`) AS catchesa, AVG(`truss`) AS trussa, AVG(`pointsPrevented`) AS pointsPreventeda FROM `rounds` WHERE `teamNumber`=".$team."");
while($row = $avg->fetch(PDO::FETCH_ASSOC)){
	
		if($color=="red")echo("<tr bgcolor='#ff6666'>");
		else echo("<tr bgcolor='#6666ff'>");

		echo"<td>" . $team . "</td>";
		echo"<td>" . $i . "</td>";
		echo"<td>" . round($row['autohtMissa'],2) . "</td>";
		echo"<td>" . round($row['autohtMadea'],2) . "</td>";
		echo"<td>" . round($row['hotGoala'],2) . "</td>";
		echo"<td>" . round($row['autoltMissa'],2) . "</td>";
		echo"<td>" . round($row['autoltMadea'],2) . "</td>";
		echo"<td>" . round($row['hotZonea'],2) . "</td>";
		echo"<td>" . round($row['htMissa'],2) . "</td>";
		echo"<td>" . round($row['htMadea'],2) . "</td>";
		echo"<td>" . round($row['ltMissa'],2) . "</td>";
		echo"<td>" . round($row['ltMadea'],2) . "</td>";
		echo"<td>" . round($row['passesa'],2) . "</td>";
		echo"<td>" . round($row['catchesa'],2) . "</td>";
		echo"<td>" . round($row['trussa'],2) . "</td>";
		echo"<td>" . round($row['pointsPreventeda'],2) . "</td>";
		$tScore=($row['htMadea']*10)+($row['ltMadea']*1)+($row['passesa']*10)+($row['trussa']*10)+($row['catchesa']*10);
		echo"<td>" . round($tScore,2) . "</td>";
		$aScore=($row['autohtMadea']*15)+($row['autoltMadea']*6)+($row['hotGoala']*5)+($row['hotZonea']*5);
		echo"<td>" . round($aScore,2) . "</td>";
		$totalScore=$tScore+$aScore;
		echo"<td>" . round($totalScore,2) . "</td>";
		if(($row['autohtMissa']+$row['autohtMadea'])>0)$aAccuracy=(($row['autohtMadea'])/($row['autohtMissa']+$row['autohtMadea']))*100;
		else $aAccuracy='-';
		echo"<td>" . round($aAccuracy,2) . "</td>";
		if(($row['htMissa']+$row['htMadea'])>0)$tAccuracy=(($row['htMadea'])/($row['htMissa']+$row['htMadea']))*100;
		else $tAccuracy='-';
		echo"<td>" . round($tAccuracy,2) . "</td>";
		echo"</tr>";
}
		
		return round($totalScore,2);
}


function allianceScore($team){	 
	$i=1;

	include('connection.php');
	 $avg=$dbh->query("SELECT AVG(`autohtMiss`) AS autohtMissa, AVG(`autohtMade`) AS autohtMadea, AVG(`hotGoal`) AS hotGoala, AVG(`autoltMiss`) AS autoltMissa, AVG(`autoltMade`) AS autoltMadea, AVG(`hotZone`='yes') AS hotZonea, AVG(`htMiss`) AS htMissa, AVG(`htMade`) AS htMadea, AVG(`ltMiss`) AS ltMissa, AVG(`ltMade`) AS ltMadea, AVG(`passes`) AS passesa, AVG(`catches`) AS catchesa, AVG(`truss`) AS trussa, AVG(`pointsPrevented`) AS pointsPreventeda FROM `rounds` WHERE `teamNumber`=".$team."");
while($row = $avg->fetch(PDO::FETCH_ASSOC)){
	
		$tScore=($row['htMadea']*10)+($row['ltMadea']*1)+($row['passesa']*10)+($row['trussa']*10)+($row['catchesa']*10);
		$aScore=($row['autohtMadea']*15)+($row['autoltMadea']*6)+($row['hotGoala']*5)+($row['hotZonea']*5);
		$totalScore=$tScore+$aScore;
		if(($row['autohtMissa']+$row['autohtMadea'])>0)$aAccuracy=(($row['autohtMadea'])/($row['autohtMissa']+$row['autohtMadea']))*100;
		else $aAccuracy='-';
		if(($row['htMissa']+$row['htMadea'])>0)$tAccuracy=(($row['htMadea'])/($row['htMissa']+$row['htMadea']))*100;
		else $tAccuracy='-';
}

		
		return round($totalScore,2);
	
}

