<?php
	session_start();
	if(isset($_POST['files'])){
		$id = $_SESSION['projectid'];
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
?>
