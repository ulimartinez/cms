<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTIS - Project Title</title>

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
              <h1 style="text-align:center;">Project Title</h1>
              <hr>
              <img class="img-responsive" src="sampleimage.png" alt="Sample image" style="margin:auto">
              <br>
              <button class="btn btn-default">Change Image</button>
              <hr>
              <div class="form-group">
                <label for="comment">Project description</label>
                <textarea class="form-control" rows="5" id="comment" placeholder="Lorem ipsum dolor sit amet, mea ut autem nihil. Ei eum putant salutatus, eu aliquip interesset sea. Apeirian molestiae cum eu, an etiam forensibus quo. Ad vix sonet nihil nemore, an has regione erroribus, vis cu idque audire corrumpit. Ei novum facilis per, simul meliore salutandi no pri. His feugiat verterem cu.

Eu quem vocibus ius, no pro zril contentiones. Nam ad erant everti persequeris, ad mea odio aliquam, nec te sumo hendrerit delicatissimi. Cu vel hinc concludaturque, veniam lucilius tacimates id usu. Per munere doming tacimates eu, his an hinc discere."></textarea>
                <br>
                <button class="btn btn-success">Save Changes</button>
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
                      <tbody>
                        <tr>
                          <td>1st Presentation</td>
                          <td><button class="btn btn-success">Download</button></td>
                          <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                        <tr>
                          <td><input class="form-control" type="text"></td>
                          <td><input class="form-control" type="file"></td>
                          <td><button class="btn btn-success">Upload</button></td>
                        </tr>
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
</body>

</html>
