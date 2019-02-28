<!--
SENG401 Assignment 2: Server Side Programming

Contributors: Nathan Godard
              Ines Rosito
              Rebecca Reid
              Bogdan Lykhosherstov

Date Modified: Feb. 10, 2019
Filename: Assignment2Main4.php
-->



<!DOCTYPE html>

<html>
<head> </head>
<body>

  <h1>Pointless Calculations Master 1.0</h1>
  <p>
    Welcome! Enter the coordinates of 2 points and press the submit button.<br />
    X values must be between [-90, 90], and Y values must be between [-180, 180].
  </p>
  <form id = "coordinatesForm">
    <label>Latitude of Point 1:</label><input type = "text" id = "X1"/><br />
    <label>Longitude of Point 1:</label><input type = "text" id = "Y1"/><br /> <br />
    <label>Latitude of Point 2:</label><input type = "text" id = "X2"/><br />
    <label>Longitude of Point 2:</label><input type = "text" id = "Y2"/><br />
  </form>
  <p id = "testing"> </p>

  <button onclick = "assignment2Button()">Submit</button>
  <hr />
<div id="assignment2">

  <script>
    function assignment2Button() {
      document.getElementById("testing").innerHTML = "We called the function";
      var X1 = document.getElementById("X1").value;
      var Y1 = document.getElementById("Y1").value;
      var X2 = document.getElementById("X2").value;
      var Y2 = document.getElementById("Y2").value;

      var xhttpRequest = new XMLHttpRequest();

      xhttpRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("assignment2").innerHTML = this.responseText;
        }
      };

      xhttpRequest.open("GET", "assignment2MathStuff.php?X1="+X1+"&X2="+X2+"&Y1="+Y1+"&Y2="+Y2, true);
      xhttpRequest.send();
    };
  </script>
</div>

</body>
</html>
