<?php
function alliance($team, $color){	 
	 $team=2059;
	 $i=1;

	include('connection.php');
	 $avg=$dbh->query("SELECT AVG(`autohtMiss`) AS autohtMissa, AVG(`autohtMade`) AS autohtMadea, AVG(`hotGoal`) AS hotGoala, AVG(`autoltMiss`) AS autoltMissa, AVG(`autoltMade`) AS autoltMadea, AVG(`hotZone`='yes') AS hotZonea, AVG(`htMiss`) AS htMissa, AVG(`htMade`) AS htMadea, AVG(`ltMiss`) AS ltMissa, AVG(`ltMade`) AS ltMadea, AVG(`passes`) AS passesa, AVG(`catches`) AS catchesa, AVG(`truss`) AS trussa, AVG(`pointsPrevented`) AS pointsPreventeda FROM `rounds` WHERE `teamNumber`=".$team."");
	 var_dump($team);
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
	 $lastNumber=0;
	 $change=false;
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

	include('connection.php');
	 $avg=$dbh->query("SELECT * FROM `rounds` WHERE `teamNumber`=$team ORDER BY `teamNumber`");
	 while($row = $avg->fetch(PDO::FETCH_ASSOC)){
		if($row['teamNumber']==$team){
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
	
	$lastNumber=$row['teamNumber'];
	$t=$t+1;

		$tScore=($htMadea*10)+($ltMadea*1)+($passesa*10)+($trussa*10)+($catchesa*10);
		$aScore=($autohtMadea*15)+($autoltMadea*6)+($hotGoala*5)+($hotZonea*5);
		$totalScore=$tScore+$aScore;
		if(($autohtMissa+$autohtMadea)>0)$aAccuracy=(($autohtMadea)/($autohtMissa+$autohtMadea))*100;
		else $aAccuracy='-';
		if(($htMissa+$htMadea)>0)$tAccuracy=(($htMadea)/($htMissa+$htMadea))*100;
		else $tAccuracy='-';

		
		return round($totalScore,2);
	
}

