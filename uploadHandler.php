<?php
	//hnadles file uploads
	include("utils.php");
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
	
	if(isset($_POST['filename'])){
		//if the directory was obtained successfully
		if(checkEmpty($_POST['filename'])){
			$toReturn['error'] = "Must input a name for the file";
			$conn->close();
			echo json_encode($toReturn);
			exit();
		}
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$directory = 'projects/'.$row['dir']. '/files';
			if($_FILES['file']['error'] == UPLOAD_ERR_OK){
				$tmp_name = $_FILES["file"]["tmp_name"];
		        $name = $_POST['filename'];
				$toReturn['success'] = "$directory/$name";
		        move_uploaded_file($tmp_name, "$directory/$name");
			}
		}
	}
	else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
		parse_str(file_get_contents("php://input"));
		if(isset($del)){
			$toReturn['deleted'] = unlink($del);
		}
	}
	else if(isset($_POST['desc'])){
		$txt = $_POST['desc'];
		if($result->num_rows){
			$row = $result->fetch_assoc();
			$directory = 'projects/'.$row['dir'];
			$toReturn['modified'] = file_put_contents($directory.'/description.txt', $txt);
		}
	}
	else if(isset($_POST['cover'])){
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$directory = 'projects/'.$row['dir'];
			if($_FILES['coverimg']['error'] == UPLOAD_ERR_OK){
				$name = $_FILES["coverimg"]["name"];
				$ext = end((explode(".", $name)));
				if(preg_match('/(jpe?g|png|gif)$/i', $ext, $toReturn['regex']) == 1){
					$tmp_name = $_FILES["coverimg"]["tmp_name"];
			        //$name = "cover." . $ext;
			        $name = "cover.png";
					$toReturn['success'] = "$directory/$name";
			        move_uploaded_file($tmp_name, "$directory/$name");
					header('Cache-Control: no-cache');
					header('Pragma: no-cache');
					header('Location: /cms');
					exit();
				}
				else{
					$toReturn['error'] = "Invalid file type";
				}
			}
			else {
				$toReturn['error'] = "Upload error";
			}
		}
		else{
			$toReturn['error'] = "Invalid project id";
			$toReturn['sql'] = $sql;			
		}
	}
	$conn->close();
	echo json_encode($toReturn);
?>
