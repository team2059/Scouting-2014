<?php
function robotData($team, $color){	 
	include('connection.php');
	$avg=$dbh->query("SELECT count(`teamNumber`=2059) AS data, AVG(`autohtMiss`) AS autohtMissa, AVG(`autohtMade`) AS autohtMadea, AVG(`hotGoal`) AS hotGoala, AVG(`autoltMiss`) AS autoltMissa, AVG(`autoltMade`) AS autoltMadea, AVG(`hotZone`='yes') AS hotZonea, AVG(`htMiss`) AS htMissa, AVG(`htMade`) AS htMadea, AVG(`ltMiss`) AS ltMissa, AVG(`ltMade`) AS ltMadea, AVG(`passes`) AS passesa, AVG(`catches`) AS catchesa, AVG(`truss`) AS trussa, AVG(`pointsPrevented`) AS pointsPreventeda FROM `rounds` WHERE `teamNumber`=".$team."");
	while($row = $avg->fetch(PDO::FETCH_ASSOC)){
		if($color=="red")echo("<tr bgcolor='#ff6666'>");
		else echo("<tr bgcolor='#6666ff'>");

		echo"<td>" . $team . "</td>";
		echo"<td>" . round($row['data'],2) . "</td>";
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
}

function robotScore($team){	 
	include('connection.php');
	$avg=$dbh->query("SELECT AVG(`autohtMiss`) AS autohtMissa, AVG(`autohtMade`) AS autohtMadea, AVG(`hotGoal`) AS hotGoala, AVG(`autoltMiss`) AS autoltMissa, AVG(`autoltMade`) AS autoltMadea, AVG(`hotZone`='yes') AS hotZonea, AVG(`htMiss`) AS htMissa, AVG(`htMade`) AS htMadea, AVG(`ltMiss`) AS ltMissa, AVG(`ltMade`) AS ltMadea, AVG(`passes`) AS passesa, AVG(`catches`) AS catchesa, AVG(`truss`) AS trussa,AVG(`pointsPrevented`) AS pointsPreventeda  FROM `rounds` WHERE `teamNumber`=".$team."");
	while($row = $avg->fetch(PDO::FETCH_ASSOC)){
		$tScore=($row['htMadea']*10)+($row['ltMadea']*1)+($row['passesa']*10)+($row['trussa']*10)+($row['catchesa']*10);
		$aScore=($row['autohtMadea']*15)+($row['autoltMadea']*6)+($row['hotGoala']*5)+($row['hotZonea']*5);
		$totalScore=$tScore+$aScore;
		$defense=$row['pointsPreventeda'];
	}
	return array(round($totalScore,2),round($defense,2));
}
function score($red1,$red2,$red3,$blue1,$blue2,$blue3) {
	list($red1o,$red1d) = robotScore($red1);
	list($red2o,$red2d) = robotScore($red2);
	list($red3o,$red3d) = robotScore($red3);
	list($blue1o,$blue1d) = robotScore($blue1);
	list($blue2o,$blue2d) = robotScore($blue2);
	list($blue3o,$blue3d) = robotScore($blue3);
	$blueScore = ($blue1o+$blue2o+$blue3o)-($red1d+$red2d+$red3d);
	$redScore = ($red1o+$red2o+$red3o)-($blue1d+$blue2d+$blue3d);
	$margin = abs($blueScore-$redScore);
	return array($redScore,$blueScore,$margin);
}
