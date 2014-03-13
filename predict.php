<?php
session_start(); 
require('connection.php');
?>
<!DOCTYPE>
<html>
<body>
<?php include('menu.php'); ?>
<form action="predictprocess.php" method="post" name="scouting" />
<p>Red 1: <input type="number" name="red1" id="red1" /></p>
<p>Red 2: <input type="number" name="red2" id="red2" /></p>
<p>Red 3: <input type="number" name="red3" id="red3" /></p>
<p>Blue 1: <input type="number" name="blue1" id="blue1" /></p>
<p>Blue 2: <input type="number" name="blue2" id="blue2" /></p>
<p>Blue 3: <input type="number" name="blue3" id="blue3" /></p>
<input id="submit" type="submit" value="Submit" onClick="" />
</form>
</body>
</html>