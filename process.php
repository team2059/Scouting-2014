<?php
include('connection.php');

$data=array();
$data[':teamNumber']=$_GET['teamNumber'];
$data[':matchNumber']=$_GET['matchNumber'];
$data[':autohtMiss']=$_GET['autohtMiss'];
$data[':autohtMade']=$_GET['autohtMade'];
$data[':hotGoal']=$_GET['hotGoal'];
$data[':autoltMiss']=$_GET['autoltMiss'];
$data[':autoltMade']=$_GET['autoltMade'];
$data[':hotZone']=$_GET['hotZone'];
$data[':startPosition']=$_GET['startPosition'];
$data[':htMiss']=$_GET['htMiss'];
$data[':htMade']=$_GET['htMade'];
$data[':ltMiss']=$_GET['ltMiss'];
$data[':ltMade']=$_GET['ltMade'];
$data[':passes']=$_GET['passes'];
$data[':catches']=$_GET['catches'];
$data[':truss']=$_GET['truss'];
$data[':pointsPrevented']=$_GET['pointsPrevented'];
$data[':note']=$_GET['note'];
$data[':ip']=$_SERVER['REMOTE_ADDR'];

$ipAddress=$_SERVER['REMOTE_ADDR'];
$arp="arp -a $ipAddress";
$lines=explode("\n", $arp);
foreach($lines as $line) {
  $cols=preg_split('/\s+/', trim($line));
  if ($cols[0]==$ipAddress) {
    $data[':mac']=$cols[1];
  }
}

$stmt=$dbh->prepare("INSERT INTO matches (teamNumber,matchNumber,autohtMiss,autohtMade,hotGoal,autoltMiss,autoltMade,hotZone,startPosition,htMiss,htMade,ltMiss,ltMade,passes,catches,truss,pointsPrevented,note,ip,mac) VALUES (:teamNumber,:matchNumber,:autohtMiss,:autohtMade,:hotGoal,:autoltMiss,:autoltMade,:hotZone,:startPosition,:htMiss,:htMade,:ltMiss,:ltMade,:passes,:catches,:truss,:pointsPrevented,:note,:ip,:mac)");

try {
  $stmt.exec($data);
  //$count = $dbh->exec($sqlstr);
} catch(PDOException $e) {
  die($e->getMessage());
}
