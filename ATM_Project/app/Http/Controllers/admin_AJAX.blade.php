<?php
$data = '{
	"name": "Test Array!",
	"function": "If this return, api /testAjax works!"
}';

$result = json_decode($data);
echo "<pre>";
var_export($result);
echo "</pre>";

?>