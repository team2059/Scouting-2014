<?php
include('connection.php');
$data=array();
$data[':teamNumber']=$_POST['teamNumber'];
$data[':matchNumber']=$_POST['matchNumber'];
$data[':autohtMiss']=$_POST['autohtMiss'];
$data[':autohtMade']=$_POST['autohtMade'];
$data[':hotGoal']=$_POST['hotGoal'];
$data[':autoltMiss']=$_POST['autoltMiss'];
$data[':autoltMade']=$_POST['autoltMade'];
$data[':hotZone']=$_POST['hotZone'];
$data[':startPosition']=$_POST['startPosition'];
$data[':htMiss']=$_POST['htMiss'];
$data[':htMade']=$_POST['htMade'];
$data[':ltMiss']=$_POST['ltMiss'];
$data[':ltMade']=$_POST['ltMade'];
$data[':passes']=$_POST['passes'];
$data[':catches']=$_POST['catches'];
$data[':truss']=$_POST['truss'];
$data[':pointsPrevented']=$_POST['pointsPrevented'];
$data[':note']=$_POST['note'];
$data[':ip']=$_SERVER['REMOTE_ADDR'];
$data[':mac']='';
$ipAddress=$_SERVER['REMOTE_ADDR'];
$arp="arp -a $ipAddress";
$lines=explode("\n", $arp);
foreach($lines as $line) {
  $cols=preg_split('/\s+/', trim($line));
  if ($cols[0]==$ipAddress) {
    $data[':mac']=$cols[1];
  }
}
$stmt=$dbh->prepare("INSERT INTO rounds (teamNumber,matchNumber,autohtMiss,autohtMade,hotGoal,autoltMiss,autoltMade,hotZone,startPosition,htMiss,htMade,ltMiss,ltMade,passes,catches,truss,pointsPrevented,note,ip,mac) VALUES (:teamNumber,:matchNumber,:autohtMiss,:autohtMade,:hotGoal,:autoltMiss,:autoltMade,:hotZone,:startPosition,:htMiss,:htMade,:ltMiss,:ltMade,:passes,:catches,:truss,:pointsPrevented,:note,:ip,:mac)");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $stmt->execute($data);
  $affectedRows=$stmt->rowCount();
  header("Location: form.php");
  //echo($affectedRows);
  //$count = $dbh->exec($sqlstr);
} catch(PDOException $e) {
  die($e->getMessage());
}
