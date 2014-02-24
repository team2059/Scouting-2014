<?php
session_start(); 
require('connection.php');
//             WHAT DO YOU THINK YOU'RE DOING CHRISTIAN!!!!!!!!!!!
//             HAVE YOU PROGRAMMED BEFORE!?!?!??!?!?!!!
//             ALWAYS ADD LIMIT 1 FOR A TEST!!!
//             EJFKEJKFJSKLJWELAFJAE;LAJKE;LGJA;LGJAEL;KJEA
//             WTF!! mysql_query!?!?!?!?!?!?!?!?!?!!?!?!?!?!?!?!?!?!?
//             NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
//
//             Crucifix of bad code:
//                              _________
//                              |       |
//          ____________________|       |___________________
//          |                                              |
//          | $db_query= mysql_query("SELECT * FROM test");|
//          |                                              |
//          |___________________        ___________________|
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |       |
//                              |_______|
//Here's the right way: 
//$test=$dbh->preare("SELECT * FROM rounds LIMIT 1");
//try{
//  $test->execute();
//}catch(PDOException $e){
//  //TODO remove this in prod
//  die($e->getMessage());
//  //die("Could not select database");
//}
//
//But, it automatically does it in connection.php
?>
<!DOCTYPE>
<head>
<title>Scouting - Regional Form</title>
<link rel="stylesheet" type="text/css" href="jmobile/jquery.mobile-1.4.1.min.css" />
<script src="jmobile/jquery.mobile-1.4.1.min.js"></script>
<script src="jmobile/jquery.mobile-1.4.1.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head> 
<body> 
<div id="header">
<div id="headerbutton"><a href="index.php">Home</a></div>
<h1>Regional Menu</h1>
</div>
<div id="content">
<form action="process.php" method="post" />
<h1>Match Info</h1>
<p>Team Number: <input type="number" name="teamNumber" /></p>
<p>Match Number: <input type="number" name="matchNumber" /></p>
<h1>Auto</h1>
<p>First 10 seconds of the match</p>
<table>
<tr>
<td><label for="autohtMiss">High Target Missed: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreaseht()"/></td><td><input type="text" name="autohtMiss" value="0" id="autohtMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="increaseht()"/></td></tr>
<tr><td><label for="autohtMade">High Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehm()"/></td><td><input type="text" name="autohtMade" value="0" id="autohtMade"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehm()"/></td></tr>
<tr><td><label for="hotGoal">Hot Goal: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="hotGoal" value="0" id="hotGoal"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="autoltMiss">Low Target Missed: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="autoltMiss" value="0" id="autoltMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="autoltMade">Low Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="autoltMade" value="0" id="autoltMade"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
</tr>
</table>
<label for="hotZone">Hot Zone:</label>
<select name="hotZone" id="hotZone" data-role="slider">
  <option value="no">No</option>
  <option value="yes">Yes</option>
</select> 
<fieldset data-role="controlgroup">
  <legend>Start Position:</legend>
  <input type="radio" name="startPosition" id="left" value="left" />
  <label for="great">Left</label>
  <input type="radio" name="startPosition" id="middle" value="middle"  />
  <label for="average">Middle</label>
  <input type="radio" name="startPosition" id="right" value="right"  />
  <label for="no">Right</label>
  <input type="radio" name="startPosition" id="goalie" value="goalie"  />
  <label for="no">Goalie</label>
</fieldset>
<h1>Teleop</h1>
<p>Driver control period</p>
<table>
<tr>
<td><label for="htMiss">High Target Missed: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreaseht()"/></td><td><input type="text" name="htMiss" value="0" id="htMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="increaseht()"/></td></tr>
<tr><td><label for="htMade">High Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehm()"/></td><td><input type="text" name="htMade" value="0" id="htMade"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehm()"/></td></tr>
<tr><td><label for="ltMiss">Low Target Missed: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="ltMiss" value="0" id="ltMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="ltMade">Low Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="ltMade" value="0" id="ltMade"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="passes">Passes: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="passes" value="0" id="passes"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="catches">Catches: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="catches" value="0" id="catches"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="truss">Shots over truss: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="truss" value="0" id="truss"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
<tr><td><label for="pointsPrevented">Estimate Points Prevented: </label></td>
<td><input type="button" name="decrease" value="-" onclick="decreasehb()"/></td><td><input type="text" name="pointsPrevented" value="0" id="pointsPrevented"/></td>
<td><input type="button" name="increase" value="+" onclick="increasehb()"/></td></tr>
</tr>
</table>
<p>Comments: <input type="text" name="notes" /></p>
<input type="submit" value="Submit" />
</form>
  </div>
</body>
</html>
<?php
