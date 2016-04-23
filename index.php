<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";
?>

	<article>
	    <img id="redPawn1" class="pawn" src="images/redPawn.png" />
      <img id="yellowPawn1" class="pawn" src="images/yellowPawn.png" />
      <img id="redPawn2" class="pawn" src="images/redPawn.png" />
	

		<!-- Pawn test <figure class = "greenHome">
			<img src="images/redPawn.png">
		</figure> -->
	</article> 


	<form id="updateButton">
         
         <input type="button" value="red pawn" onclick="move('redPawn1','1');" />
    </form>

    <form id="updateButton2" style="top:100px;position:absolute;">
         
         <input type="button" value="red pawn 2" onclick="move('redPawn2','2');" />
    </form>

    <form id="updateButton3" style="top:200px;position:absolute;">
         
         <input type="button" value="yellow pawn" onclick="move('yellowPawn1','2');" />
    </form>


    <button>get position</button>

    <script type="text/javascript" src="move.js"></script>


      <script type="text/javascript">
	    $(document).ready(function(){
	   		$("button").click(function(){
	        var x = $("p").position();
	        alert("Top position: " + x.top + " Left position: " + x.left);
			});
		});
	   </script>
}); 

<?php
	include "footer.php";
?>