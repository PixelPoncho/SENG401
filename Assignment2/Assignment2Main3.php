<!--
SENG401 Assignment 2: Server Side Programming

Contributors: Nathan Godard
              Ines Rosito
              Rebecca Reid
              Bogdan Lykhosherstov

Date Modified: Feb. 10, 2019
Filename: Assignment2Main3.php
-->

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>Before button was Pressed</h1>
  <p>
<?php
$jsonfile = file_get_contents ( "CalgarySchools.geojson" );
var_dump($jsonfile);
?>
</p>
<hr />
<div id="converted">
  <button type="button" onclick="convertToXMLAndSave()">Convert</button>

  <script>
    function convertToXMLAndSave() {
      var xhttpRequest = new XMLHttpRequest();
      xhttpRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("converted").innerHTML = "<h1>After Button was Pressed</h1>" + this.responseText;
          saveArrayAsXML(this.responseText);
        }
      };
      xhttpRequest.open("GET", "geojsonToArrayConvert.php?t=" + Math.random(), true);
      xhttpRequest.send();
    }

  </script>
</div>

</body>
</html>
