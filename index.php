<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";
?>



	<article>
			<figure class = "redHome">
				<img id = "redPawn" src="images/redPawn.png">
			</figure>
	</article>

	<form> 
		<input type="button" value="Move pawn" onclick="moveRight('redPawn');"/>
	</form> 

<?php
	include "footer.php";
?>