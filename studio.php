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
    <input type="range" min="0" max="3" value="0" id="PinesSlider" name="pine" onchange="updatePines()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Ornaments:</label><br>
    <input type="range" min="0" max="2" value="0" id="BulbsSlider" name="ornaments" onchange="updateBulbs()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Lights:</label><br>
    <input type="range" min="0" max="2" value="0" id="LightsSlider" name="lights" onchange="updateLights()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Stand Type:</label><br>
    <input type="range" min="0" max="0" value="0" id="StandSlider" name="stand" onchange="updateStands()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Skirt Type:</label><br>
    <input type="range" min="0" max="1" value="0" id="SkirtSlider" name="skirt" onchange="updateSkirts()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Garland:</label><br>
    <input type="range" min="0" max="1" value="0" id="GarlandSlider" name="garland" onchange="updateGarlands()">
  </div>
  <div class="treeDecoration">
    <label for="fname">Snow Effect:</label><br>
    <input type="checkbox" id="snowCheck" name="fname" value="John" name="snow" onchange="toggleSnow()">
  </div>
  <input type="hidden" id= "designTitle" name="id" name="title" value="" />
</div>
<!-- Buttons to submit form  CURRENTLY NOT WORKING-->
  <div class="buttonContainer">
    <input class = "button" type = "reset"  value = "Save" onclick="saveDesign()"/>
    <input class = "button" type = "submit"  value = "Load" />
  </div>
</form>';

// Get input data
$id = $_POST["Design_id"];
$title = $_POST["Design_Title"];
$price = $_POST["Pine"];
$quantity = $_POST["Ornaments"];
$quantity = $_POST["Lights"];
$quantity = $_POST["Stand"];
$quantity = $_POST["Skirt"];
$quantity = $_POST["Garland"];
$isDiscontinued = 'false';


// get correct input for boolean
if(filter_has_var(INPUT_POST,'Snow')) 
{
  $isDiscontinued = true;
}

// If any of numerical values are blank, set them to zero
if ($id == "") $id = 0;
if ($price == "") $price = 0.00;
if ($quantity == "") $quantity = 0;

// Connect to MySQL
$db = mysqli_connect("localhost:3306", "root", "root","ChristmasStudio");
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

if($action == "displayBooks")
$query = "display";
else if ($action == "addBook")
$query = "insert into Books values($id, '$title', $price, $quantity, $isDiscontinued)";
else if ($action == "updatePrice")
$query = "update Books set Price = $price WHERE Book_id = $id";
else if ($action == "deleteBook")
$query = "delete from Books where Book_id = $id";
else {}

if($query != "display"){
trim($query);
$query_html = htmlspecialchars($query);
print "<b> The query is: </b> " . $query_html . "<br />";
$result = mysqli_query($db,$query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysqli_error();
    print "<p>" . $error . "</p>";
}
}

if ($query == "display") {
$query = "SELECT * FROM Books";
$result = mysqli_query($db,$query);
if (!$result) {
  print "Error - the query could not be executed";
  $error = mysqli_error();
  print "<p>" . $error . "</p>";
  exit;
}
$num_rows = mysqli_num_rows($result);
print "<div class = 'rectangle'><table><caption> <p class='headerText'> Books ($num_rows) </p> </caption>";
print "<tr align = 'center'>";

$row = mysqli_fetch_array($result);
$num_fields = mysqli_num_fields($result);
// Produce the column labels
$keys = array_keys($row);
for ($index = 0; $index < $num_fields; $index++) 
    print "<th>" . $keys[2 * $index + 1] . "</th>";
print "</tr>";

// Output the values of the fields in the rows
for ($row_num = 0; $row_num < $num_rows; $row_num++) {
  print "<tr align = 'center'>";
  $values = array_values($row);
  for ($index = 0; $index < $num_fields; $index++){
      $value = htmlspecialchars($values[2 * $index + 1]);
      print "<th>" . $value . "</th> ";
  }
  print "</tr>";
  $row = mysqli_fetch_array($result);
}
print "</table></div>";
}


?>
</body>
</html>