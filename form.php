<?php
session_start(); 
require('connection.php');
?>
<!DOCTYPE>
<head>
<title>Scouting - Regional Form</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<script src="js/jquery.js"></script>
<script src="js/local.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
</head> 
<body> 
<div data-role="header">
	<h1>Scouting Form</h1>
</div>
<div id="content">
<form action="process.php" method="post" name="scouting" id="scouting" />

<div class="card">
    <div id="scouterID" data-role="fieldcontain">
    <fieldset data-role="controlgroup" data-type="horizontal" >
        <legend>Scouter ID:</legend>
        <div class="radio">
		<input id="radio1" name="scouterID" value="1" type="radio" <?php if(!empty($_GET['key'])&&$_GET['key']==1){echo('checked="checked"');}?>>
        <label for="radio1">Red 1</label> 
        <input id="radio2" name="scouterID" value="2" type="radio" class="radio" <?php if(!empty($_GET['key'])&&$_GET['key']==2){echo('checked="checked"');}?>>
        <label for="radio2">Red 2</label>
        <input id="radio3" name="scouterID" value="3" type="radio" class="radio" <?php if(!empty($_GET['key'])&&$_GET['key']==3){echo('checked="checked"');}?>>
        <label for="radio3">Red 3</label>
        <input id="radio4" name="scouterID" value="4" type="radio" class="radio" <?php if(!empty($_GET['key'])&&$_GET['key']==4){echo('checked="checked"');}?>>
        <label for="radio4">Blue 1</label> 
        <input id="radio5" name="scouterID" value="5" type="radio" class="radio" <?php if(!empty($_GET['key'])&&$_GET['key']==5){echo('checked="checked"');}?>>
        <label for="radio5">Blue 2</label> 
        <input id="radio6" name="scouterID" value="6" type="radio" class="radio" <?php if(!empty($_GET['key'])&&$_GET['key']==6){echo('checked="checked"');}?>>
        <label for="radio6">Blue 3</label> 
        </div>
    </fieldset>
    </div>
</div>
<div class="card">
    <h1>Match Info</h1>
    <p>Match Number: <input type="number" name="matchNumber" id="matchNumber" value="<?php if(!empty($_GET['match'])&&$_GET['match']>0){echo($_GET['match']);} ?>" /></p>
    <p>Team Number: <input type="number" name="teamNumber" id="teamNumber" /></p>
    <div id="startPosition" data-role="fieldcontain">
                <fieldset data-role="controlgroup" data-type="vertical">
                    <legend>Start Position:</legend>
                    <div class="radio">
                    <input id="radio21" name="startPosition" value="left" type="radio">
                    <label for="radio21">Left</label>
                    <input id="radio22" name="startPosition" value="middle" type="radio">
                    <label for="radio22">Middle</label>
                    <input id="radio23" name="startPosition" value="right" type="radio">
                    <label for="radio23">Right</label>
                    <input id="radio24" name="startPosition" value="goalie" type="radio">
                    <label for="radio24">Goalie</label>
                    </div>
                </fieldset>
    </div>
</div>
<div class="card">
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
</div>

<div class="card">
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
</div>

<div class="card">
	<p>Comments: <input type="text-box" name="note" /></p>
</div>
<input id="submit" type="submit" value="Submit" />
<!--
  <input id="submit" onClick="a();" type="button" value="Submit" />
-->
</form>
  </div>
</body>
</html>
<?php
