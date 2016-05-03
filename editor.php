<?php include 'conn.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TLC - Transportation Leadership Council - Student Chapter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- Navigation -->
    <center>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
      </nav>
    </center>

    <!-- Page Content -->
    <div class="container">
        <hr>
        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
              <h3>Members</h3>
              <hr>
              <?php
              $sql = "SELECT * FROM cms_officers";
              $res = mysqli_query($conn, $sql);
              echo '<table class="table table-bordered">';
              if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    echo '<tr>
                            <td>'. $row['name'] .'</td>
                            <td>'. $row['title'] .'</td>
                            <td>'. $row['img'] .'</td>
                            <td>'. $row['dscr'] .'</td>
                            <td>Save</td>
                          </tr>';
                }
              }
              echo '<tr>
                      <td><input type="text" name="name" placeholder="name" class="form-control"></td>
                      <td><input type="text" name="title" placeholder="title" class="form-control"></td>
                      <td><input type="text" name="img" placeholder="img" class="form-control"></td>
                      <td><input type="text" name="dscr" placeholder="dscr" class="form-control"></td>
                      <td><button type="button" class="btn btn-success">Add</button></td>
                    </tr>';
              echo '</table>';
              ?>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <p>
          <a href="login.php">Log in</a>
        </p>

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
	<script type="text/javascript">
	    $('#myTab').tabCollapse();
	    $('#myTab2').tabCollapse();
	</script>
  <script type="text/javascript">
    $( document ).ready(function() {
    $("[rel='tooltip']").tooltip();
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    );
});
  </script>
</body>

</html>
