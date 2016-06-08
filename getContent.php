<?php
	session_start();
	$id = $_SESSION['projectid'];
	if(isset($_POST['files'])){
		//get the directory of this project from the database
		require('config.php');
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connecterror);
        }
        $sql = "SELECT dir FROM projects WHERE id = " . $id;
		$result = $conn->query($sql);
		//if the directory was obtained successfully
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$directory = 'projects/'.$row['dir']. '/files';
			$dh = opendir($directory);
			//for all of the files inside this directory
			while(($file = readdir($dh))){
				if ($file != "." && $file != ".."){
					$pathParts = pathinfo($file);
					echo '<tr><td>'.$pathParts['filename'].'</td><td><a href="'.$directory.'/'.$file.'" target="_blank" class="btn btn-success">Download</a></td><td><button data-file="'.$directory.'/'.$file.'" class="btn btn-danger delete">Delete</button></td></tr>';
				}
			}
			$conn->close();
			/* this is the format that the page expects
			 * <tr>
                          <td>1st Presentation</td>
                          <td><button class="btn btn-success">Download</button></td>
                          <td><button class="btn btn-danger">Delete</button></td>
               </tr>
			 */
		}
	}
	else if(isset($_POST['users'])){
		require('config.php');
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connecterror);
        }
        $sql = "SELECT username, admin, email, id FROM users WHERE projects LIKE '%" . $id . "%' AND approved = 1";
		$result = $conn->query($sql);
		$toReturn = array();
		$toReturn['approved'] = $result->fetch_all();
		$sql = "SELECT username, admin, email FROM users WHERE projects LIKE '%" . $id . "%' AND approved = 0";
		$result = $conn->query($sql);
		$toReturn['unapproved'] = $result->fetch_all();
		header('Content-type: application/json');
		echo json_encode($toReturn);
	}
?>
