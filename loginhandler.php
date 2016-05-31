<?php
	session_start();
	include('utils.php');
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$projectid = $_POST['projectid'];
		if(checkEmpty($username) OR checkEmpty($password)){
            echo "Must input both values";
        }
		else {
            require('config.php');
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            if ($conn -> connect_error) {
                die("Connection failed: " . $conn -> connecterror);
            }
            $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
            $response = $conn -> query($sql);
            if($response -> num_rows > 0){
                $row = $response->fetch_assoc();
                $salt = $row['salt'];
                $password = $password . $salt;
                $hash = md5($password);
                if($hash === $row['password']){
                	$projects = explode(",", $row['projects']);
					if(in_array($projectid, $projects)){
						$_SESSION['admin'] = $row['admin'];
	                    $_SESSION['in'] = true;
	                    $_SESSION['user'] = $username;
	                    $_SESSION['id'] = $row['id'];
						$_SESSION['projectid'] = $projectid;
						$sql = "SELECT * FROM projects WHERE id = " . $projectid;
						$response = $conn->query($sql);
						if($response->num_rows > 0){
							$row = $response->fetch_assoc();
							$_SESSION['dir'] = $row['dir'];
							$_SESSION['title'] = $row['title'];
						}
						header('Location: /cms');
					}
					else{
						echo "You do not have access to this project.";
					}
                }
                else{
                    echo "Username or password incorrect";
                }
            }
            else{
                echo "Username or password incorrect";
            }
        }
    }
    else if(isset($_POST['logout'])){
        $_SESSION = array();
    }
	else if(isset($_POST['register'])){
		$username = $_POST['uid'];
		$password = $_POST['pwd'];
		$email = $_POST['eml'];
		$fname = $_POST['fna'];
		$lname = $_POST['lna'];
		$phone = $_POST['phn'];
		$project = $_POST['projectid'];
		if(checkEmpty($username) OR
		checkEmpty($password) OR
		checkEmpty($email) OR
		checkEmpty($fname) OR
		checkEmpty($lname) OR
		checkEmpty($phone)){
			echo "Must input all values";
		}
		else{
			require('config.php');
			require_once 'random/random.php';
			$salt = bin2hex(random_bytes(6));
			$password = $password . $salt;
			$password = md5($password);
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            if ($conn -> connect_error) {
                die("Connection failed: " . $conn -> connecterror);
            }
            $sql = "INSERT INTO users (username, password, salt, email, projects, phone) VALUES('$username', '$password', '$salt', '$email', '$project', '$phone')";
			$result = $conn->query($sql);
			if($result){
				echo "created successfully";
			}
			else
				echo $sql;
		}
	}
	$conn->close();
?>
