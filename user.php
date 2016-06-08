<?php
	//hnadles file uploads
	header('Content-type: application/json');
	session_start();
	$toReturn = array();
	
	if(isset($_POST['approve'])){
		$admin = 0;
		if($_POST['type'] === "Read & Write"){
			$admin = 1;
		}
		require('config.php');
	    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	    if ($conn -> connect_error) {
	        die("Connection failed: " . $conn -> connecterror);
	    }
	    $sql = "UPDATE users SET approved=1, admin=$admin WHERE username LIKE \"" . $_POST['approve'];
		$result = $conn->query($sql);
		$toReturn['result'] = $result;
		$toReturn['sql'] = $sql;
	}
	$conn->close();
	echo json_encode($toReturn);
?>
