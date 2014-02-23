<?php
include('connection.php');
try {
  $count = $dbh->exec("INSERT INTO (sup) VALUES ('sup', 'hi')");
} catch(PDOException $e) {
  die($e->getMessage());
}
$ipAddress=$_SERVER['REMOTE_ADDR'];
$macAddr=false;


#run the external command, break output into lines
$arp="arp -a $ipAddress";
$lines=explode("\n", $arp);
#look for the output line describing our IP address
foreach($lines as $line) {
  $cols=preg_split('/\s+/', trim($line));
  if ($cols[0]==$ipAddress) {
    $macAddr=$cols[1];
  }
}
var_dump($macAddr);
