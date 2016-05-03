
	<?php
		$dir = "img/albums/" . $_GET['varname'] . "/";
		$thumb = $dir . "thumbs/";
		$type = ".jpg";
		$images = array();
			if (is_dir($dir))
			{
			  if ($dh = opendir($dir))
			  {
			  	while (($file = readdir($dh)) !== false)
			    {
			    	if (stripos($file, $type) !== false)
					{
						array_push($images, $file);
					}
			    }
			    closedir($dh);
			  }

			}
	?>

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

        <!-- Page Heading/Breadcrumbs -->

            <div class="col-lg-12">
                <h1 class="page-header"><a href="../events" style="text-decoration: none;">Events</a>
                    <small><?php echo $_GET['varname']; ?></small>
                </h1>
            </div>

        <!-- /.row -->
        <?php
        	$rows = count($images) / 4;
			if (!floor($rows) - $rows < 0)
			{
				$rows = floor($rows) + 1;
			}
			$items = count($images);
			$folder = "";
			$row_index = 0;
			$index = 0;
			while ($items > 0)
			{
				echo "<div class=\"row\">";
				if ($items >= 4)
				{
					for ($j = 0; $j < 4; $j++)
					{
						$folder = $images[$row_index];
						echo "<div class=\"col-md-3 img-portfolio\">
								<div class=\"thumbnail\">
               	    				<div class=\"pic\">
               	    				<a href=\"#portfolioModal1\" class=\"portfolio-link\" data-toggle=\"modal\">
               	    					<img class=\"img-responsive img-hover\" width=\"750px\" height=\"450px\" onClick=\"useImage(this.src)\" src=\"" . $thumb . $folder ."\" alt=\"\"></div>
               	    				</a>
               						</div>
            					</div>";
						$row_index++;
					}
					$items = $items - 4;
				}
				else if ($items > 0) {
					for ($j = 0; $j < ($items); $j++)
					{
						$folder = $images[$row_index];
						echo "<div class=\"col-md-3 img-portfolio\">
								<div class=\"thumbnail\">
               	    				<div class=\"pic\">
               	    				<a href=\"#portfolioModal1\" class=\"portfolio-link\" data-toggle=\"modal\">
               	    					<img class=\"img-responsive img-hover\" width=\"750px\" height=\"450px\" onClick=\"useImage(this.src)\" src=\"" . $thumb . $folder ."\" alt=\"\"></div>
               	    				</a>
               						</div>
            					</div>";
			$row_index++;
					}
					$items = 0;
				}
				echo "</div>";
			}
		?>



        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <img src="../../../images/vision_mission_goals_message/Ivision.jpg" id="clickedImage" class="img-responsive img-centered" width="100%" alt="">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
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
