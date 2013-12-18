<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <title>Progress Check</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <div>
        <h1>Progress Check</h1>
        
		<?php
		// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
		date_default_timezone_set('America/Los_Angeles');
		
		$filename = 'data.csv';
		if (file_exists($filename)) {
		    echo "This progress report is current as of: " . date ("F d Y H:i.", filemtime($filename));
		}
		?>
		
		<br /><br />
		

		<table class="table table-striped table-bordered table-hover table-responsive sortable">
		
		<?php
			// echo "<table>\n\n";
			$f = fopen("data.csv", "r");
			while (($line = fgetcsv($f)) !== false) {
			        echo "<tr>";
			        foreach ($line as $cell) {
			                echo "<td>" . htmlspecialchars($cell) . "</td>";
			        }
			        echo "<tr>\n";
			}
			fclose($f);
			// echo "\n</table>";
		?>
		
		</table>

      </div>

    </div><!-- /.container -->


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sorttable.js"></script>
  </body>
</html>