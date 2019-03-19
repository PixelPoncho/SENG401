<?php

// -------------------- FUNCTIONS -------------------- //

function errorCheck($error){
  if($error) {
    foreach ($_POST as $key => $value) {
      $form[$key] = htmlspecialchars($value);
    }
  }
}

function quadPrint($x, $y, $quad){
  if (empty($quad))
  {
    echo "<center>($x, $y) is on the <b>Origin</b></center>";
  }
  else {
    echo "<center>($x, $y) is in <b>Quadrant $quad</b></center>";
  }
}

// Determining quadrant of coordinates
function quadrant ($x, $y){
  // Origin not confined to particular quadrant
  if(($x == 0) AND ($y == 0)) {return 0;}
  elseif(($x < 0) AND ($y < 0)) {return 3;}
  elseif(($x < 0) AND ($y > 0)){return 2;}
  elseif(($x > 0) AND ($y < 0)){return 4;}
  elseif(($x > 0) AND ($y > 0)){return 1;}
}

// Calculating the bearing between the two points provided
function bearing ($x1, $y1, $x2, $y2){

  $x1Radians = deg2rad($x1);
  $x2Radians = deg2Rad($x2);
  $xDiffernceRadians = deg2Rad($x2-$x1);
  $yDifferenceRadians = deg2Rad($y2-$y1);

  $y = sin(deg2Rad($y2) - deg2Rad($y1)) * cos($x2Radians);
  $x = cos($x1Radians) * sin($x2Radians) -
        sin($x1Radians) * cos($x2Radians)*cos($yDifferenceRadians);
  $bearing = round(atan2($y, $x), 3);
  return $bearing;
}

// Calculating the great circle distance between the two points provided
function haversine ($x1, $y1, $x2, $y2){
  $xDiffernceRadians = deg2Rad($x2-$x1);
  $yDifferenceRadians = deg2Rad($y2-$y1);
  $x1Radians = deg2rad($x1);
  $x2Radians = deg2Rad($x2);

  $a =  sin($xDiffernceRadians/2) * sin($xDiffernceRadians/2) +
        cos($x1Radians) * cos($x2Radians) *
        sin($yDifferenceRadians/2) * sin($yDifferenceRadians/2);
  $c = 2 * atan2(sqrt($a), sqrt(1-$a));
  $d = 637100 * $c;
  $d = round($d, 3);
  return $c;
}

// Customizable Error Handler
function customError( $errstr) {
  echo "<br><center><b>Error:</b> $errstr<br></center>";
  die();
}


// ===================== DATA FORM RETRIVAL  ===================== //
  // -------------------- SEPERATE LONG. & LAT. -------------------- //
  $data1 = explode(",", $_GET['coord1']);
  $data2 = explode(",", $_GET['coord2']);

// ===================== ERROR CHECKING ===================== //
  // -------------------- TOO MANY ARGUMENTS? -------------------- //
      // Ensure only 2 elements are existing in the array
      // 1 element for longitude, 1 element for latitude
    if(count($data1) > 2 OR count($data1) == 1 ){customError("Incorrect number arguments provided for Coordinate 1...<br>");}
    if(count($data2) > 2 OR count($data2) == 1 ){customError("Incorrect number arguments provided for Coordinate 2...<br>");}

  // -------------------- STRIP WHITESPACES -------------------- //
    // Strip whitespaces from the beginning and end of the variables entered
    // x-coordinates = longitude      y-coordinates = latitude
    $coord1_x = trim($data1[0]); $coord1_y = trim($data1[1]);
    $coord2_x = trim($data2[0]); $coord2_y = trim($data2[1]);

  // -------------------- IS EMPTY? -------------------- //
    // Check to determine if the form submitted is empty -- TRUE = ERROR
      // Check for input of first coordinate
    if(empty($coord1_x) || empty($coord1_y)){
        // If the value is 0, do nothing
      if($coord1_x == "0" OR $coord1_y == "0"){}
      else {customError('Coordinate 1 has a value that is empty, or not set at all');}
    }
      // Check for input of second coordinate
      if(empty($coord2_x) || empty($coord2_y)){
          // If the value is 0, do nothing
        if($coord2_x == "0" OR $coord2_y == "0"){}
        else {customError('Coordinate 2 has a value that is empty, or not set at all');}
      }

  // -------------------- IS NUMERIC? -------------------- //
    // Check to determine if the form submitted is empty -- TRUE = ERROR
      // Check for input of first coordinate
    if(!is_numeric($coord1_x) || !is_numeric($coord1_y)){
      customError('Coordinate 1 is an invalid input<br>');
    }
      // Check for input of second coordinate
    if(!is_numeric($coord2_x) || !is_numeric($coord2_y)){
      customError('Coordinate 2 is an invalid input<br>');
    }

  // -------------------- WITHIN RANGE? -------------------- //
      // Check latitude and longitude is within range for first coordinate
    if(($coord1_y < -90 OR $coord1_y > 90 ) OR ($coord1_x < -180 OR $coord1_x > 180 )){
      customError('Coordinate 1 is not within range<br>');
    }
      // Check latitude and longitude is within range for second coordinate
    if(($coord2_y < -90 OR $coord2_y > 90 ) OR ($coord2_x < -180 OR $coord2_x > 180 )){
      customError('Coordinate 2 is not within range<br>');
    }

// ===================== CALCULATIONS ===================== //
  // -------------------- WHICH QUADRANT? -------------------- //

    $quad1 = quadrant($coord1_x, $coord1_y);
    $quad2 = quadrant($coord2_x, $coord2_y);

    echo "<h3><center><b>-- Quadrants --</b><center></h3>";
    quadPrint($coord1_x, $coord1_y, $quad1);
    quadPrint($coord2_x, $coord2_y, $quad2);

  // -------------------- BEARING? -------------------- //

    $dist = bearing($coord1_x, $coord1_y, $coord2_x, $coord2_y);
    echo "<h3><center><b>-- Bearings --</b><center></h3>
          <center>The bearing between the two points is approximately:</center>
          <center><b>$dist</b></center>";

  // -------------------- CIRCLE DISTANCE? -------------------- //

    $dist = haversine($coord1_x, $coord1_y, $coord2_x, $coord2_y);
    echo "<h3><center><b>-- Great Circle Distance --</b><center></h3>
          <center>The great circle distance between the two points is
          approximately:</center>
          <center><b>$dist</b></center><br>";
    echo '</div>';

?>
