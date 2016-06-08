<?php
	//hnadles file uploads
	if(isset($_POST['filename'])){
		header('Content-type: application/json');
		session_start();
		$toReturn = array();
		require('config.php');
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connecterror);
        }
        $sql = "SELECT dir FROM projects WHERE id =" . $_SESSION['projectid'];
		$result = $conn->query($sql);
		//if the directory was obtained successfully
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$directory = 'projects/'.$row['dir']. '/files';
			if($_FILES['file']['error'] == UPLOAD_ERR_OK){
				$tmp_name = $_FILES["file"]["tmp_name"];
		        $name = $_POST['filename'];
				$toReturn['success'] = "$directory/$name";
		        move_uploaded_file($tmp_name, "$directory/$name");
			}
			$conn->close();
		}
		echo json_encode($toReturn);
	}
	else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
		parse_str(file_get_contents("php://input"));
		if(isset($del)){
			unlink($del);
		}
	}
?>
