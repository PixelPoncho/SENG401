<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CoordinatesCSS.css">
    <link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
  </head>

  <style>
    body {font-family: 'Didact Gothic';font-size: 22px;}
  </style>

<body>

    <div id="background">
        <img src="earth.gif" class="stretch" alt="" />
    </div>

    <div id="page-wrap">
      <!--
        // Creating form from which the user can input their coordinates
        // ------------------------------------------------------------- //
        // NOTE: action defined sends form data to same page, instead of
        //       jumping to a different page -- Errors can be presented
        //       on same page
      -->

      <h1><center> Assignment 2 </center></h1>
      <h2><center> Task 1.4 </center></h2>

      <center>Please input a ( <i>longitude, latitude</i> ) for the coordinates below <br><br></center>

        <!--The actual form where the user inputs two sets of coordinates -->
    <form id="coordinatesForm">
      <center><b><label>Coordinate 1: </label></b> <input type="text" id="coord1"/><br><br></center>
      <center><b><label>Coordinate 2: </label></b> <input type="text" id="coord2" /><br><br></center>
    </form>

  <center><button onclick ="assignment2Button()">Submit</button></center>
  <hr />

<div id="assignment2">

  <script>
    function assignment2Button() {
      var coord1 = document.getElementById("coord1").value;
      var coord2 = document.getElementById("coord2").value;

      var xhttpRequest = new XMLHttpRequest();

      xhttpRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("assignment2").innerHTML = this.responseText;
        }
      };

      xhttpRequest.open("GET", "CoordinatesAJAX_Math.php?coord1="+coord1+"&coord2="+coord2, true);
      xhttpRequest.send();
    };

  </script>
</div>

</body>
</html>
