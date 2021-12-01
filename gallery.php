<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Christmas Tree Studio</title>
  <link rel="stylesheet" href="galleryStylesheet.css">
</head>
<body>

<?php

echo '
<div class="topnav" id="myTopnav">
  <a href="index.html">Christmas Tree Studio</a>
  <a href="gallery.php" class="active">Gallery</a>
  <a href="about.html">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <img class="hamburger" src="resources/hamburger-menu.png">
  </a>
</div>';

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

//get values from table
$query = "SELECT * FROM Design";
$result = mysqli_query($db,$query);
if (!$result) {
  print "Error - the query could not be executed";
  $error = mysqli_error();
  print "<p>" . $error . "</p>";
  exit;
}
$num_rows = mysqli_num_rows($result);
$num_fields = mysqli_num_fields($result);
?>

<script type="text/javascript">
    function createLayout() {
      var x = '<?php echo"$num_rows"?>';
      for (let counter=0; counter < x; ++counter){
        var div = document.createElement('div');
        div.innerHTML = "<iframe src='galleryImage.html' id='frame" + counter + "' ></iframe>";
        // set style
        div.style.color = 'red';
        // better to use CSS though - just set class
        div.setAttribute('class', 'snapshot'); // and make sure myclass has some styles in css
        document.body.appendChild(div);
      }
    }
</script>

<?php

// $result = mysql_query("SELECT * FROM Design WHERE Design_id = '1'");
// if (!$result) {
//   echo 'Could not run query: ' . mysql_error();
//   exit;
// }
// $row = mysql_fetch_row($result);
// echo $row[0];
// echo $row[1];
// echo $row[2];
// echo $row[3];
// echo $row[4];



echo '<script type="text/javascript">createLayout();</script>';
echo '<script src="scripts.js"></script>';
?>



</body>
</html>