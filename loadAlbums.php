<?php
		$dir = "img/albums/";
		$dh  = opendir($dir);
		while (false !== ($filename = readdir($dh)))
		{
		    $files[] = $filename;
		}
		sort($files);
		$sorted = array_slice($files, 2);
		$images = array();
		for ($i = 0; $i < count($sorted); $i++)
		{
			$dir = $dir . $sorted[$i] . '/thumbs/';
			$type = ".jpg";
			if (is_dir($dir))
			{
			  if ($dh = opendir($dir))
			  {
			  	$all_images = array();
			  	while (($file = readdir($dh)) !== false)
			    {
			    	if (stripos($file, $type) !== false)
					{
						array_push($all_images, $dir . $file);
					}
			    }
				array_push($images, $all_images);
			    closedir($dh);
			  }

			}
			$dir = "img/albums/";
		}


        	$sorted = array_reverse($sorted);
			$images = array_reverse($images);
        	$rows = count($sorted) / 4;
			if (!floor($rows) - $rows < 0)
			{
				$rows = floor($rows) + 1;
			}
			$items = count($sorted);
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
						$folder = $images[$row_index][0];
						echo "<div class=\"col-md-3 img-portfolio\">
								<div class=\"thumbnail\">
                						<div class=\"caption\" style=\"display: none;\" onclick=\"loadSelAlbum('" . $sorted[$row_index] . "')\">
                							" . $sorted[$row_index] . "
                						</div>

               	    				<div class=\"pic\">
               	    					<img class=\"img-responsive img-hover\" width=\"750px\" height=\"450px\" src=\"" . $folder ."\" alt=\"\"></div>
               						</div>
            					</div>";
						$row_index++;
					}
					$items = $items - 4;
				}
				else if ($items > 0) {
					for ($j = 0; $j < ($items); $j++)
					{
						$folder = $images[$row_index][0];
						echo "<div class=\"col-md-3 img-portfolio\">
								<div class=\"thumbnail\">
									<a href=\"images.php?varname=" . $sorted[$row_index] . "\">
                						<div class=\"caption\" style=\"display: none;\">
                							" . $sorted[$row_index] . "
                						</div>
               						</a>
               	    				<div class=\"pic\">
               	    					<img class=\"img-responsive img-hover\" width=\"750px\" height=\"450px\" src=\"" . $folder ."\" alt=\"\"></div>
               						</div>
            					</div>";
			$row_index++;
					}
					$items = 0;
				}
				echo "</div>";
			}
		?>
