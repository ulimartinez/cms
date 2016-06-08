<?php

	session_start();
	$admin = false;
	if(!isset($_SESSION['in'])){
		header('Location: loginerror.php');
	}
	$admin = $_SESSION['admin'];
	$title = $_SESSION['title'];
	$dir = $_SESSION['dir'];
	
	$description = file_get_contents("projects/$dir/description.txt");
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTIS - <?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


    <!-- Navigation -->
    <center><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            </div>
            <?php include('navbar.php');?>
        </div>
        <!-- /.container -->
    </nav></center>

    <!-- Page Content -->
    <div class="container">

        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
              <h1 style="text-align:center;"><?php echo $title; ?></h1>
              <hr>
              <img class="img-responsive" src=<?php echo '"projects/'.$dir.'/cover.png"'; ?> alt="Sample image" style="margin:auto">
              <br>
              <?php
              if($admin)
			  	echo '<button class="btn btn-default">Change Image</button>';
			  ?>
              <hr>
              <div class="form-group">
                <label for="comment">Project description</label>
                <?php
                	if($admin)
					echo '<textarea class="form-control" rows="5" id="comment" placeholder="">' . $description . '</textarea>'.
 '<br><button class="btn btn-success">Save Changes</button>';
					else {
						echo '<p>' . $description . '</p>';
					}
				?>
                <br><br>
                <div class="col-lg-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Files</h3>
                    </div>
                    <!-- <div class="panel-body">
                      Panel content
                    </div> -->
                    <table class="table table-bordered">
                      <thead>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="filesTable">
                        <tr>
                          <td colspan="3">No files at this time</td>
                        </tr>
                        <form action="uploadHandler.php" id="imageForm" enctype="multipart/form-data" method="post">
	                        <tr>
	                          <td><input class="form-control" id="filename" name="filename" type="text"></td>
	                          <td><input class="form-control" name="file" type="file"></td>
	                          <td><input type="submit" id="upload" name="upload" class="btn btn-success" value="Upload"></input></td>
	                        </tr>
	                    </form>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Users</h3>
                    </div>
                    <!-- <div class="panel-body">
                      Panel content
                    </div> -->
                    <table class="table table-bordered">
                      <thead>
                        <th>username</th>
                        <th>type</th>
                        <th>email</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>jperez</td>
                          <td>Read Only</td>
                          <td>jperez@utep.edu</td>
                          <td><button class="btn btn-danger">Remove</button></td>
                        </tr>
                        <tr>
                          <td><input class="form-control" type="text"></td>
                          <td>
                            <select>
                              <option>Read Only</option>
                              <option>Read & Edit</option>
                            </select>
                          </td>
                          <td><input class="form-control" type="text"></td>
                          <td><button class="btn btn-success">Add</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-lg-6">
                </div>
              </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

          <img id="footerpic" src="footer.png">
          <!-- Footer -->
          <?php include('footer.php');?>

        </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/tabs.js"></script>
    
    <!-- get files script -->
    <script type="text/javascript">
    	$(document).ready(getFiles);
    	function getFiles(){
    		$.post('getContent.php', {'files': true}, function(data){
    			if(data.length > 1){
    				$($('#filesTable').children()[0]).remove();
    				$(data).prependTo('#filesTable');    				
    			}
    		});
    	}
    	$('#filesTable').delegate('.delete', 'click', function(){
    		var delBtn = this;
    		$.ajax({
    			url: 'uploadHandler.php',
    			type: 'DELETE',
    			data: {'del': $(delBtn).data('file')},
    			success: function(){
    				$(delBtn).closest('tr').remove();
    				alert('File deleted');
    			}
		    });
    	});
    	$("#imageForm").on("submit", function(e) {
    		var data = new FormData($('form')[0]);
            e.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                data: data,
                cache: false,
    			contentType: false,
                processData: false,
                success: function(data) {
                    if(data.hasOwnProperty('success')){
                    	getFiles();
                    }
                }
            });
        });
    </script>
</body>

</html>
