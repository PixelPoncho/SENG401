<?php

$search = $_REQUEST["search"];
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

		$queryStatement = 'SELECT * FROM CalgarySchools';
		$query = $conn->query($queryStatement);
		$results = $query->fetchAll();

				if($display == "Table"){
					//echo "Table display not implemented yet";
					echo "<table>
					<tr>
					<th>Name</th>
					<th>Type</th>
					<th>Sector</th>
					<th>Address</th>
					<th>City</th>
					<th>Province</th>
					<th>Postal Code</th>
					<th>Longitude</th>
					<th>Latitude</th>
					</tr>";

				}
				else if($display == "JSON"){
				//	echo "JSON display not implemented yet";
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

		foreach($results as $result)
		{

			if((substr_count($result['name'], $search) > "0")){

				if($display == "JSON"){
				//	echo "JSON display not implemented yet";

				}else if($display == "XML"){
					//echo "XML display not implemented yet";
				}else if($display == "CSV"){
					//echo $result['name'] . ", " . $result['address'] . ", " . $result['postalcode'] . "<br>";
					//echo $result;
					echo $result['name'] . ", " . $result['type'] . ", " . $result['sector'] . ", " .
					$result['address'] . ", " . $result['city'] . ", " . $result['province'] . ", " .
					$result['postalcode'] . ", " . $result['longitude'] . ", " . $result['latitude'] . "<br>";
				}else if($display == "Table"){
					//echo "Table display not implemented yet";
					echo "<tr>";
					echo "<td>" . $result['name'] . "</td>";
					echo "<td>" . $result['type'] . "</td>";
					echo "<td>" . $result['sector'] . "</td>";
					echo "<td>" . $result['address'] . "</td>";
					echo "<td>" . $result['city'] . "</td>";
					echo "<td>" . $result['province'] . "</td>";
					echo "<td>" . $result['postalcode'] . "</td>";
					echo "<td>" . $result['longitude'] . "</td>";
					echo "<td>" . $result['latitude'] . "</td>";
					echo "</tr>";

				}else{
					echo "error with radio buttons: " . $display;
				}

			}
		}

		if($display == "Table"){
			echo "</table>";
		}

		//echo $results;
		//return $results;
	}
}catch (PDOException $e){
	// report error message
	echo $e->getMessage();
}
?>
