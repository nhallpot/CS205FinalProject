<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";
?>
	<script type="text/javascript">
         <!--
            var imgObj = null;
            
            function init(){
               imgObj = document.getElementById('myImage');
               imgObj.style.position= 'relative'; 
               imgObj.style.left = '0px'; 
            }
            
            function moveRight(imgName){
               imgObj=document.getElementByClass(imgName);
               imgObj.style.position='relative';
               imgObj.style.left = parseInt(imgObj.style.left) + 200 + 'px';
            }
            
            window.onload =init;
         //-->
    </script>
    <form id="updateButton">
         <input type="button" value="Click Me" onclick="moveRight();" />
      </form>

	<article>

	

		<!-- Pawn test <figure class = "greenHome">
			<img src="images/redPawn.png">
		</figure> -->
	</article> 

<?php
	include "footer.php";
?>