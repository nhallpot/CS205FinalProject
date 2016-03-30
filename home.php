	<?php
	
	include 'top.php';
	
	?>
	<?php
		print("<h1> start of attempt to query </h1>");
		$query = "SELECT * FROM PIECE;";
	    $numRows = $thisDatabaseReader->select($query,null);
		print("<p>".$numRows[0]["isSafety"]."</p>");
	?>
    </body>
</html>