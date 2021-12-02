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
    <input type="range" min="0" max="3" value="0" id="PinesSlider" onchange="updatePines()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Ornaments:</label><br>
    <input type="range" min="0" max="2" value="0" id="BulbsSlider" onchange="updateBulbs()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Lights:</label><br>
    <input type="range" min="0" max="2" value="0" id="LightsSlider" onchange="updateLights()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Stand Type:</label><br>
    <input type="range" min="0" max="0" value="0" id="StandSlider" onchange="updateStands()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Skirt Type:</label><br>
    <input type="range" min="0" max="1" value="0" id="SkirtSlider" onchange="updateSkirts()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Garland:</label><br>
    <input type="range" min="0" max="1" value="0" id="GarlandSlider" onchange="updateGarlands()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Snow Effect:</label><br>
    <input type="checkbox" id="snowCheck" name="fname" value="John" onchange="toggleSnow()">
  </div>
  <input type="hidden" id= "designTitle" name="id" value="" />
</div>
<!-- Buttons to submit form  CURRENTLY NOT WORKING-->
  <div class="buttonContainer">
    <input class = "button" type = "reset"  value = "Save" onclick="saveDesign()"/>
    <input class = "button" type = "submit"  value = "Load" />
  </div>
</form>';


?>
</body>
</html>