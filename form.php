<?php
session_start(); 
require('connection.php');
?>
<!DOCTYPE>
<head>
<title>Scouting - Regional Form</title>
<link rel="stylesheet" type="text/css" href="css/jquerymobile.css" />

<script src="js/jquery.js"></script>
<script src="js/jquerymobile.js"></script>
<script src="js/local.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
</head> 
<body> 
<div data-role="header">
	<h1>Scouting Form</h1>
</div>
<div id="content">
<form action="process.php" method="post" name="scouting" id="scouting" />
<h1>Match Info</h1>
<p>Match Number: <input type="number" name="matchNumber" id="matchNumber" /></p>
<p>Team Number: <input type="number" name="teamNumber" id="teamNumber" /></p>
<h1>Auto</h1>
<p>First 10 seconds of the match</p>
<table>
<tr>
<td><label for="autohtMiss">High Target Missed: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="autohtMiss" value="0" id="autohtMiss"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="autohtMade">High Target Made: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="autohtMade" value="0" id="autohtMade"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="hotGoal">Hot Goal: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="hotGoal" value="0" id="hotGoal"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="autoltMiss">Low Target Missed: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="autoltMiss" value="0" id="autoltMiss"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="autoltMade">Low Target Made: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="autoltMade" value="0" id="autoltMade"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
</tr>
</table>
<label for="hotZone">Hot Zone:</label>
<select name="hotZone" id="hotZone" data-role="slider">
  <option value="no">No</option>
  <option value="yes">Yes</option>
</select> 
<div id="startPosition" data-role="fieldcontain">
            <fieldset data-role="controlgroup" data-type="vertical">
                <legend>
                    Start Position:
                </legend>
                <input id="radio1" name="startPosition" value="left" type="radio">
                <label for="radio1">
                    Left
                </label>
                <input id="radio2" name="startPosition" value="middle" type="radio">
                <label for="radio2">
                    Middle
                </label>
                <input id="radio3" name="startPosition" value="right" type="radio">
                <label for="radio3">
                    Right
                </label>
                <input id="radio4" name="startPosition" value="goalie" type="radio">
                <label for="radio4">
                    Goalie
                </label>
            </fieldset>
</div>
<h1>Teleop</h1>
<p>Driver control period</p>
<table>
<tr>
<td><label for="htMiss">High Target Missed: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="htMiss" value="0" id="htMiss"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="htMade">High Target Made: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="htMade" value="0" id="htMade"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="ltMiss">Low Target Missed: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="ltMiss" value="0" id="ltMiss"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="ltMade">Low Target Made: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="ltMade" value="0" id="ltMade"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="passes">Passes: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="passes" value="0" id="passes"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="catches">Catches: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="catches" value="0" id="catches"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="truss">Shots over truss: </label></td>
<td><input type="button" class="decrease" value="-" /></td><td><input type="text" name="truss" value="0" id="truss"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
<tr><td><label for="pointsPrevented">Estimate Points Prevented: </label></td>
<td><input type="button" class="decrease" value="-" "pointsPreventedm()"/></td><td><input type="text" name="pointsPrevented" value="0" id="pointsPrevented"/></td>
<td><input type="button" class="increase" value="+" /></td></tr>
</tr>
</table>
<p>Comments: <input type="text" name="note" /></p>
<input id="submit" type="submit" value="Submit" />
<!--
  <input id="submit" onClick="a();" type="button" value="Submit" />
-->
</form>
  </div>
</body>
</html>
<?php
