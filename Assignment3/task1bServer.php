<?php

$sector = $_REQUEST["sector"];
$display = $_REQUEST["display"];
//$q = "Alberta";


$host='localhost';
$db = 'SENG401';
$username = 'postgres';
$password = '123456ab';
$port = 5432;

$dsn = "pgsql:host=$host; port=$port; dbname=$db; user=$username; password=$password";

try{
	// create a PostgreSQL database connection
	$conn = new PDO($dsn);
	// display a message if connected to the PostgreSQL successfully
	if($conn){
		/*echo "Connected to the <strong>$db</strong> database
		successfully!";*/

		//use PDO?
		//$queryStatement = 'SELECT * FROM CalgarySchools';
		//$queryStatement = "SELECT * FROM CalgarySchools WHERE sector='NW'";
		//$queryStatement = "SELECT * FROM CalgarySchools WHERE sector='" . $sector . "'";
		/*
		echo "<b>Total Schools in Sector:</b><br>";
		$queryStatement = "SELECT count(name) FROM CalgarySchools WHERE sector='" . $sector . "'";


		$query = $conn->query($queryStatement);
		$results = $query->fetchAll();

		foreach($results as $result)
		{

			foreach($result as $key => $resultColumn){
				if(!is_numeric($key)){
					echo $resultColumn;
				}
			}
			echo "<br>";
		}
		*/

		//echo "<b>Types of Schools in Sector:</b><br>";


	$queryStatement = "SELECT type, count(name) as total FROM CalgarySchools WHERE sector='" . $sector . "' GROUP BY type";
	$query = $conn->query($queryStatement);



		$results = $query->fetchAll();

		if($display == "JSON"){
			//echo "JSON display not implemented yet";
			echo json_encode($results);
		}else if($display == "XML"){
		//	echo "XML display not implemented yet";
		/*
			$xml = new SimpleXMLElement('<root/>');
			array_walk_recursive($results, array ($xml, 'addChild'));
			*/

		//	array_to_xml( $results, $xml_data );
	//	$xml = "\<root\>";
	echo "<pre>";
	echo htmlspecialchars("<root>");
	echo "<br>";
		foreach($results as $rowkey => $result){
			$xml = "	<" . $rowkey . ">";
			echo htmlspecialchars($xml);
			echo "<br>";

			foreach($result as $key => $resultColumn){
				if(!is_numeric($key)){
					//echo $resultColumn;
				//	$xml .= "<" . $key . "><br>" . $resultColumn . "<br></" . $key . ">";
				//echo "&nbsp;&nbsp;&nbsp;&nbsp;";
					$xml = "		<" . $key . ">";
					echo htmlspecialchars($xml);

					echo "<br>			" . $resultColumn . "<br>";

					$xml = "		</" . $key . ">";
					echo htmlspecialchars($xml);
					echo "<br>";
				}
			}
			$xml = "	</" . $rowkey . ">";
			echo htmlspecialchars($xml);
			echo "<br>";

		}
		$xml = "</root>";
		echo htmlspecialchars($xml);
			echo "<br></pre>";

		}
			else	if($display == "Table"){
					echo "<table>
					<tr>
					<th>Type</th>
					<th>Number</th>
					</tr>";
				}



		foreach($results as $result)
		{
		//	echo $result['type'] . ": " . $result['total'] . "<br>";
/*
			foreach($result as $key => $resultColumn){
				if(!is_numeric($key)){
					echo $resultColumn;
				}
			}
			echo "<br>";
			*/
			//if((substr_count($result['name'], $search) > "0")){
			//if(strcmp($result['sector'], $sector) == 0){

			 if($display == "CSV"){
					//echo $result['name'] . ", " . $result['address'] . ", " . $result['postalcode'] . "<br>";
					//echo $result;
					echo $result['type'] . ", " . $result['total'] . "<br>";
				}else if($display == "Table"){
					//echo "Table display not implemented yet";
					echo "<tr>";
					echo "<td>" . $result['type'] . "</td>";
					echo "<td>" . $result['total'] . "</td>";
					echo "</tr>";

				}


			//}
		}

		/*
		if($display == "Table"){
			echo "</table>";
		}
		*/

		//echo $results;
		//return $results;
	}
}catch (PDOException $e){
	// report error message
	echo $e->getMessage();
}

/*
function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_numeric($key) ){
            $key = 'item'.$key; //dealing with <0/>..<n/> issues
        }
        if( is_array($value) ) {
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else if(is_numeric($key)){

				}else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));
        }
     }
}
*/


?>
