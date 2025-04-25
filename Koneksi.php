<?php	
	$host = 'widodo';
	$database = 'GUNDAR';
	$username = 'WEBGASYS';
	$password = 'WebGasys0805';

	$conn = mysqli_connect($host, $username, $password, $database);
	if (!$conn) {
		die("Error Connection : " . mysqli_connect_error());
	}
	//mysqli_close($conn);
?>
