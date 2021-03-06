<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Christmas Tree Studio</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>

<?php

echo '
<!-- Snowflake object -->
<img class="flake" src="resources/snowyflake.png" id="flakes">

<!-- Dynamic Navbar -->
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Christmas Tree Studio</a>
  <a href="gallery.php">Gallery</a>
  <a href="about.html">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <img class="hamburger" src="resources/hamburger-menu.png">
  </a>
</div>

<!-- Container to center all the design images -->
<div class="treeContainer">
  <div id="wrapper">
  <img class= "backgroundImg" src="resources/background_1.jpg" style="z-index: -100;" draggable="false">
  <div class="treeTrunk" style="bottom: 620px;"><img id="Stand" src="resources/EMPTY.svg.png" alt="image error" draggable="false"></div>
  <div class="treeTrunk" ><img id="trunk" src="resources/trunk.gif" alt="image error" draggable="false"></div>
  <div class="treeTrunk" ><img id="Pines" src="resources/PinesGreen.gif" alt="image error" draggable="false"></div>
  <div class="treeTrunk" ><img id="Lights" src="resources/EMPTY.svg.png" alt="image error" draggable="false"></div>
  <div class="treeTrunk" ><img id="Bulbs" src="resources/EMPTY.svg.png" alt="image error" draggable="false"></div>
  <div class="treeTrunk" ><img id="Garland" src="resources/EMPTY.svg.png" alt="image error" draggable="false"></div>
  <div class="treeTrunk" ><img id="Skirt" src="resources/EMPTY.svg.png" alt="image error" draggable="false"></div>
  
  </div>
</div>

<script src="scripts.js"></script>


<!-- Bottom menu bar for user inputs -->
<form id="myForm" action="studio.php" method="post">
  <div class="decorationMenu">
  <div class="treeDecoration">
    <label for="fname">Tree Type:</label><br>
    <input type="range" min="0" max="3" value="0" id="PinesSlider" name="pine" onchange="updatePines()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Ornaments:</label><br>
    <input type="range" min="0" max="2" value="0" id="BulbsSlider" name="ornaments" onchange="updateBulbs()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Lights:</label><br>
    <input type="range" min="0" max="3" value="0" id="LightsSlider" name="lights" onchange="updateLights()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Stand Type:</label><br>
    <input type="range" min="0" max="2" value="0" id="StandSlider" name="stand" onchange="updateStands()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Skirt Type:</label><br>
    <input type="range" min="0" max="3" value="0" id="SkirtSlider" name="skirt" onchange="updateSkirts()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Garland:</label><br>
    <input type="range" min="0" max="2" value="0" id="GarlandSlider" name="garland" onchange="updateGarlands()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Snow Effect:</label><br>
    <input type="checkbox" id="snowCheck" name="snow" value="false" onchange="toggleSnow()">
  </div>
  <div>
   <input type="hidden" id= "designTitle" name="title" value="" />
   </div>
   <div>
    <input type="hidden" id= "snowy" name="snowy" value="true" />
   </div>
   <div>
    <input type="hidden" id= "myAction" name="myAction" value="" />
   </div>
</div>
<!-- Buttons to submit form  CURRENTLY NOT WORKING-->
  <div class="buttonContainer">
    <input class = "button" value = "Save" onclick="saveDesign()"/>
    <input class = "button" value = "Load" onclick="loadDesign()"/>
    <!-- <input class = "button" type = "submit"  value = "Load" /> -->
  </div>
</form>';

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

// Get input data
$title = $_POST["title"];
$pine = $_POST["pine"];
$ornaments = $_POST["ornaments"];
$lights = $_POST["lights"];
$stand = $_POST["stand"];
$skirt = $_POST["skirt"];
$garland = $_POST["garland"];
$snow = $_POST["snowy"];
$action = $_POST["myAction"];



// If any of numerical values are blank, set them to zero
if ($pine == "") $pine = 0;
if ($ornaments == "") $ornaments = 0;
if ($lights == "") $lights = 0;
if ($stand == "") $stand = 0;
if ($skirt == "") $skirt = 0;
if ($garland == "") $garland = 0;

// Connect to MySQL
$db = mysqli_connect("localhost:3306", "root", "", "ChristmasStudio");
if (!$db) {
    print "Error - Could not connect to MySQL";
    exit;
}

// Select the database
$er = mysqli_select_db($db,"ChristmasStudio");
if (!$er) {
    print "Error - Could not select the database";
    exit;
}

if ($action == "load") {
  $queryTest = "SELECT * FROM Design";
  $result = mysqli_query($db,$queryTest);
  if (!$result) {
    print "Error - the query could not be executed";
    $error = mysqli_error();
    print "<p>" . $error . "</p>";
    debug_to_console("Error - the query could not be executed");
    exit;
  }

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $myPine = $row['Pine'];
    $myOrnaments = $row['Ornaments'];
    $myLights = $row['Lights'];
    $myStand = $row['Stand'];
    $mySkirt = $row['Skirt'];
    $myGarland = $row['Garland'];
    $mySnow = $row['Snow'];
    $jsArray = json_encode($row);
    $encoded = rawurlencode($jsArray);
    if ($row['Design_Title'] == $title) {
      echo '<script>document.getElementById("PinesSlider").value =' . $row['Pine'] . ';</script>';
      echo '<script>document.getElementById("BulbsSlider").value =' . $row['Ornaments'] . ';</script>';
      echo '<script>document.getElementById("LightsSlider").value =' . $row['Lights'] . ';</script>';
      echo '<script>document.getElementById("StandSlider").value =' . $row['Stand'] . ';</script>';
      echo '<script>document.getElementById("SkirtSlider").value =' . $row['Skirt'] . ';</script>';
      echo '<script>document.getElementById("GarlandSlider").value =' . $row['Garland'] . ';</script>';
      echo '<script>document.getElementById("snowy").value =' . $row['Snow'] . ';</script>';
      echo '<script>updateAll();</script>';

    }
}

}

if ($action == "save") {
  $queryTest = "SELECT * FROM Design";
  $result = mysqli_query($db,$queryTest);
  if (!$result) {
    print "Error - the query could not be executed";
    $error = mysqli_error();
    print "<p>" . $error . "</p>";
    exit;
  }
  $num_rows = mysqli_num_rows($result);
  $newID = ($num_rows + 1);

  $query = "INSERT INTO Design values($newID, '$title', $pine, $ornaments, $lights, $stand, $skirt, $garland, $snow)";

  //trim($query);
  $result = mysqli_query($db,$query);

  if (!$result) {
    debug_to_console("failure3");
      $error = mysqli_error();
      echo "<script>console.log('here it is: " . $error . "' );</script>";
  }
}




?>
</body>
</html>