<!DOCTYPE html>
<html>
<body>

<!--
  // Creating form from which the user can input their coordinates
  // ------------------------------------------------------------- //
  // NOTE: action defined sends form data to same page, instead of
  //       jumping to a different page -- Errors can be presented
  //       on same page
-->
<h2> Assignment 2 </h3>

<div class="Instruction">
Please insert (longitude, latitude) separated by a comma (,) for two points<br><br>
</div>

<div class="Form">
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
Coordinate 1: <input type="text" name="Coordinate1"><br><br>
Coordinate 2: <input type="text" name="Coordinate2"><br><br>
<input type="submit">
</form></div>
<br>

<?php
  // This particular if statement is unnecessary -- however, if you wish
  // to implement GET request on the page, you can program different functionalities
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// -------------------- SEPERATE LONG. & LAT. -------------------- //
  $data1 = explode(",", $_POST["Coordinate1"]);
  $data2 = explode(",", $_POST["Coordinate2"]);

    // Ensure only 2 elements are existing in the array
    // 1 element for longitude, 1 element for latitude
  if(count($data1) > 2){
    echo "Too many arguments provided...<br>";
  }
  if(count($data2) > 2){
    echo "Too many arguments provided...<br>";
  }

// -------------------- STRIP WHITESPACES -------------------- //
    // Strip whitespaces from the beginning and end of the variables entered
    // x-coordinates = longitude      y-coordinates = latitude
  $coord1_x = trim($data1[0]); $coord1_y = trim($data1[1]);
  $coord2_x = trim($data2[0]); $coord2_y = trim($data2[1]);

// -------------------- IS EMPTY? -------------------- //
  // Check to determine if the form submitted is empty -- TRUE = ERROR
    // Check for input of first coordinate
  if(empty($coord1_x) || empty($coord1_y)){
    echo 'Coordinate 1 has a value that is either 0, empty, or not set at all<br>';
  }
    // Check for input of second coordinate
  if(empty($coord2_x) || empty($coord2_y)){
    echo 'Coordinate 2 has a value that is either 0, empty, or not set at all<br>';
  }

// -------------------- IS NUMERIC? -------------------- //
  // Check to determine if the form submitted is empty -- TRUE = ERROR
    // Check for input of first coordinate
  if(!is_numeric($coord1_x) || !is_numeric($coord1_y)){
    echo 'Coordinate 1 is an invalid input<br>';
  }
    // Check for input of second coordinate
  if(!is_numeric($coord2_x) || !is_numeric($coord2_y)){
    echo 'Coordinate 2 is an invalid input<br>';
  }

// -------------------- WITHIN RANGE? -------------------- //
    // Check latitude and longitude is within range for first coordinate
  if(($coord1_y < -90 OR $coord1_y > 90 ) OR ($coord1_x < -180 OR $coord1_x > 180 )){
    echo 'Coordinate 1 is not within range<br>';
  }
    // Check latitude and longitude is within range for second coordinate
  if(($coord2_y < -90 OR $coord2_y > 90 ) OR ($coord2_x < -180 OR $coord2_x > 180 )){
    echo 'Coordinate 2 is not within range<br>';
  }

// -------------------- WHICH QUADRANT? -------------------- //

  $quad1 = quadrant($coord2_x, $coord2_y);
  $quad2 = quadrant($coord1_x, $coord1_y);

  if(is_null($quad1)|| is_null($quad2)){
    echo "nothin<br>";
  }

  echo "Coordinate 1 is in Quadrant $quad1<br>";
  echo "Coordinate 2 is in Quadrant $quad2<br>";

// -------------------- CIRCLE DISTANCE? -------------------- //

  $dist = haversine($coord1_x, $coord1_y, $coord2_x, $coord2_y);
  echo "<br>The great circle distance between the two points are: $dist<br>";

// ---------------------------------------- //

echo "$coord1_x, $coord1_y<br>";
echo "$coord2_x, $coord2_y<br>";

}


// -------------------- FUNCTIONS -------------------- //
function quadrant ($x, $y){
  if(($x == 0) OR ($y == 0)) {echo "on axis<br>";}
  elseif(($x < 0) AND ($y < 0)) {return 3;}
  elseif(($x < 0) AND ($y > 0)){return 2;}
  elseif(($x > 0) AND ($y < 0)){return 4;}
  elseif(($x > 0) AND ($y > 0)){return 1;}
}

  // Calculating the great circle distance btween the two points provided
function haversine ($x1, $y1, $x2, $y2){
  $dlon = $x2 - $x1;
  $dlat = $y2 - $y1;

  $a = pow(sin($dlat/2), 2) + cos($y1) * cos($y2) * pow(sin($dlon/2), 2);
  $b = 2 * asin(min(1, sqrt($a)));

  return $b;
    // Converts from radians to degrees
    //  $c = $b * 57.295780;
}

?>

</body>
</html>
