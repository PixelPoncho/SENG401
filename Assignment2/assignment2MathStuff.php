<?php
//FUNCTIONS
function inRange($valuex, $valuey){
  return ( ($valuex >= -90 && $valuex <= 90) && ($valuey >= -180 && $valuey <=180));
}

function checkQuadrant($xvalue, $yvalue){
  if($xvalue > 0){
    if($yvalue > 0){return "NE";}
    return "SE";
  }
  if($yvalue > 0){return "NW";}
  return "SW";
}

function validateInput($x1, $x2, $y1, $y2){
  echo "<p style = \"color: red\">";
  $failed = false;

  if(!inRange($x1, $y1) || !inRange($x2, $y2)){
    echo "ERROR: Points must be in range <br />";
    $failed = true;
  }

  if(!is_numeric($x1) || !is_numeric($x2) || !is_numeric($y1) || !is_numeric($y2)){
    echo "ERROR: All values must be numbers <br />";
    $failed = true;
  }
  echo "</p>";
  if($failed){  die();  }
}

//Main
$x1 = trim(STRIP_TAGS($_GET['X1']));
$x2 = trim(STRIP_TAGS($_GET['X2']));
$y1 = trim(STRIP_TAGS($_GET['Y1']));
$y2 = trim(STRIP_TAGS($_GET['Y2']));

validateInput($x1, $x2, $y1, $y2);

echo "Point 1 is in quadrant ".checkQuadrant($x1, $y1)."<br />";
echo "Point 2 is in quadrant ".checkQuadrant($x2, $y2)."<br />";

//Variables
$R_earth = 6371000; // metres
$x1Radians = deg2rad($x1);
$x2Radians = deg2Rad($x2);
$xDiffernceRadians = deg2Rad($x2-$x1);
$yDifferenceRadians = deg2Rad($y2-$y1);

//Bearing
$y = sin(deg2Rad($y2) - deg2Rad($y1)) * cos($x2Radians);
$x = cos($x1Radians) * sin($x2Radians) -
     sin($x1Radians) * cos($x2Radians)*cos($yDifferenceRadians);
$bearing = atan2($y, $x);
echo "Bearing from point 1 to 2 is ".round($bearing, 2)." in radians.<br />";

//Great Circle Distance
$a =  sin($xDiffernceRadians/2) * sin($xDiffernceRadians/2) +
      cos($x1Radians) * cos($x2Radians) *
      sin($yDifferenceRadians/2) * sin($yDifferenceRadians/2);
$c = 2 * atan2(sqrt($a), sqrt(1-$a));
$d = $R_earth * $c;
echo "Great circle distance from point 1 to 2 is ".round($d, 2)." in meters. <br />";
?>
