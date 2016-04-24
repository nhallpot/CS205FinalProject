<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";
?>



	<!--
	<article>
			<figure class = "redHome">
				<img id = "redPawn" src="images/redPawn.png">
			</figure>
	</article>
	-->


	<article>
	  <img id="R1" class="pawn" src="images/redPawn.png" />
      <img id="R2" class="pawn" src="images/redPawn.png" />
      <img id="R3" class="pawn" src="images/redPawn.png" />
      <img id="R4" class="pawn" src="images/redPawn.png" />
      <img id="Y1" class="pawn" src="images/yellowPawn.png" />
	

		<!-- Pawn test <figure class = "greenHome">
			<img src="images/redPawn.png">
		</figure> -->
	</article> 


	<form id="updateButton" style="top:125px;position:absolute;">
         
         <input type="button" value="red pawn" onclick="move('R1','1');" />
    </form>

    <form id="updateButton2" style="top:150px;position:absolute;">
         
         <input type="button" value="red pawn 2" onclick="move('R2','2');" />
    </form>

    <form id="updateButton3" style="top:175px;position:absolute;">
         
         <input type="button" value="red pawn 3" onclick="move('R3','3');" />
    </form>

    <form id="updateButton4" style="top:200px;position:absolute;">
         
         <input type="button" value="red pawn 4" onclick="move('R4','4');" />
    </form>

    <form id="updateButton5" style="top:225px;position:absolute;">
         
         <input type="button" value="yellow pawn" onclick="move('Y1','2');" />
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