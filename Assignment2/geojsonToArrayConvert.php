<?php
$jsonfile = file_get_contents ( "CalgarySchools.geojson" );
$array = json_decode($jsonfile, true);
var_dump($array);
saveArrayAsXML($array);


function saveArrayAsXML($array) {
  $xml = new SimpleXMLElement("<?xml version = \"1.0\"?><CalgarySchools></CalgarySchools>");
  array_to_xml($array, $xml);
  $xml_file = $xml->asXML('CalgarySchools.xml');
  if($xml_file){
    echo 'XML file generated successfully!';
  } else {
    echo 'XML file creation failed';
  }
}


function array_to_xml($array, &$xml){
  foreach($array as $key => $value){
    if(is_array($value)){
      if(!is_numeric($key)){
        $subnode = $xml->addChild("$key");
        array_to_xml($value, $subnode);
      } else {
        $subnode = $xml->addChild("item$key");
        array_to_xml($value, $subnode);
      } //END if !isnumeric
    } else {
      $xml->addChild("$key",htmlspecialchars("$value"));
    }
  } //END foreach
} //END function array_to_xml
?>
