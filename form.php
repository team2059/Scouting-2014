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
<script>
function autohtMissp() {document.getElementById("autohtMiss").value = Number(document.getElementById("autohtMiss").value) + 1;}
function autohtMissm() {document.getElementById("autohtMiss").value = Number(document.getElementById("autohtMiss").value) - 1;}
function autohtMadep() {document.getElementById("autohtMade").value = Number(document.getElementById("autohtMade").value) + 1;}
function autohtMadem() {document.getElementById("autohtMade").value = Number(document.getElementById("autohtMade").value) - 1;}
function hotGoalp() {document.getElementById("hotGoal").value = Number(document.getElementById("hotGoal").value) + 1;}
function hotGoalm() {document.getElementById("hotGoal").value = Number(document.getElementById("hotGoal").value) - 1;}
function autoltMissp() {document.getElementById("autoltMiss").value = Number(document.getElementById("autoltMiss").value) + 1;}
function autoltMissm() {document.getElementById("autoltMiss").value = Number(document.getElementById("autoltMiss").value) - 1;}
function autoltMadep() {document.getElementById("autoltMade").value = Number(document.getElementById("autoltMade").value) + 1;}
function autoltMadem() {document.getElementById("autoltMade").value = Number(document.getElementById("autoltMade").value) - 1;}

function htMissp() {document.getElementById("htMiss").value = Number(document.getElementById("htMiss").value) + 1;}
function htMissm() {document.getElementById("htMiss").value = Number(document.getElementById("htMiss").value) - 1;}
function htMadep() {document.getElementById("htMade").value = Number(document.getElementById("htMade").value) + 1;}
function htMadem() {document.getElementById("htMade").value = Number(document.getElementById("htMade").value) - 1;}
function ltMissp() {document.getElementById("ltMiss").value = Number(document.getElementById("ltMiss").value) + 1;}
function ltMissm() {document.getElementById("ltMiss").value = Number(document.getElementById("ltMiss").value) - 1;}
function ltMadep() {document.getElementById("ltMade").value = Number(document.getElementById("ltMade").value) + 1;}
function ltMadem() {document.getElementById("ltMade").value = Number(document.getElementById("ltMade").value) - 1;}
function passesp() {document.getElementById("passes").value = Number(document.getElementById("passes").value) + 1;}
function passesm() {document.getElementById("passes").value = Number(document.getElementById("passes").value) - 1;}
function catchesp() {document.getElementById("catches").value = Number(document.getElementById("catches").value) + 1;}
function catchesm() {document.getElementById("catches").value = Number(document.getElementById("catches").value) - 1;}
function trussp() {document.getElementById("truss").value = Number(document.getElementById("truss").value) + 1;}
function trussm() {document.getElementById("truss").value = Number(document.getElementById("truss").value) - 1;}
function pointsPreventedp() {document.getElementById("pointsPrevented").value = Number(document.getElementById("pointsPrevented").value) + 1;}
function pointsPreventedm() {document.getElementById("pointsPrevented").value = Number(document.getElementById("pointsPrevented").value) - 1;}
</script>
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
<td><input type="button" name="decrease" value="-" onclick="autohtMissm()"/></td><td><input type="text" name="autohtMiss" value="0" id="autohtMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="autohtMissp()"/></td></tr>
<tr><td><label for="autohtMade">High Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="autohtMadem()"/></td><td><input type="text" name="autohtMade" value="0" id="autohtMade"/></td>
<td><input type="button" name="increase" value="+" onclick="autohtMadep()"/></td></tr>
<tr><td><label for="hotGoal">Hot Goal: </label></td>
<td><input type="button" name="decrease" value="-" onclick="hotGoalm()"/></td><td><input type="text" name="hotGoal" value="0" id="hotGoal"/></td>
<td><input type="button" name="increase" value="+" onclick="hotGoalp()"/></td></tr>
<tr><td><label for="autoltMiss">Low Target Missed: </label></td>
<td><input type="button" name="decrease" value="-" onclick="autoltMissm()"/></td><td><input type="text" name="autoltMiss" value="0" id="autoltMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="autoltMissp()"/></td></tr>
<tr><td><label for="autoltMade">Low Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="autoltMadem()"/></td><td><input type="text" name="autoltMade" value="0" id="autoltMade"/></td>
<td><input type="button" name="increase" value="+" onclick="autoltMadep()"/></td></tr>
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
<td><input type="button" name="decrease" value="-" onclick="htMissm()"/></td><td><input type="text" name="htMiss" value="0" id="htMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="htMissp()"/></td></tr>
<tr><td><label for="htMade">High Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="htMadem()"/></td><td><input type="text" name="htMade" value="0" id="htMade"/></td>
<td><input type="button" name="increase" value="+" onclick="htMadep()"/></td></tr>
<tr><td><label for="ltMiss">Low Target Missed: </label></td>
<td><input type="button" name="decrease" value="-" onclick="ltMissm()"/></td><td><input type="text" name="ltMiss" value="0" id="ltMiss"/></td>
<td><input type="button" name="increase" value="+" onclick="ltMissp()"/></td></tr>
<tr><td><label for="ltMade">Low Target Made: </label></td>
<td><input type="button" name="decrease" value="-" onclick="ltMadem()"/></td><td><input type="text" name="ltMade" value="0" id="ltMade"/></td>
<td><input type="button" name="increase" value="+" onclick="ltMadep()"/></td></tr>
<tr><td><label for="passes">Passes: </label></td>
<td><input type="button" name="decrease" value="-" onclick="passesm()"/></td><td><input type="text" name="passes" value="0" id="passes"/></td>
<td><input type="button" name="increase" value="+" onclick="passesp()"/></td></tr>
<tr><td><label for="catches">Catches: </label></td>
<td><input type="button" name="decrease" value="-" onclick="catchesm()"/></td><td><input type="text" name="catches" value="0" id="catches"/></td>
<td><input type="button" name="increase" value="+" onclick="catchesp()"/></td></tr>
<tr><td><label for="truss">Shots over truss: </label></td>
<td><input type="button" name="decrease" value="-" onclick="trussm()"/></td><td><input type="text" name="truss" value="0" id="truss"/></td>
<td><input type="button" name="increase" value="+" onclick="trussp()"/></td></tr>
<tr><td><label for="pointsPrevented">Estimate Points Prevented: </label></td>
<td><input type="button" name="decrease" value="-" onclick="pointsPreventedm()"/></td><td><input type="text" name="pointsPrevented" value="0" id="pointsPrevented"/></td>
<td><input type="button" name="increase" value="+" onclick="pointsPreventedp()"/></td></tr>
</tr>
</table>
<p>Comments: <input type="text" name="notes" /></p>
<input type="submit" value="Submit" />
</form>
  </div>
</body>
</html>
<?php
