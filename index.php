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
	

		<!-- Pawn test <figure class = "greenHome">
			<img src="images/redPawn.png">
		</figure> -->
	</article> 


	<form id="updateButton">
         
         <input type="button" value="red pawn" onclick="move('redPawn1');" />
    </form>

    <form id="updateButton2" style="top:200px;position:absolute;">
         
         <input type="button" value="yellow pawn" onclick="move('yellowPawn1');" />
    </form>


    <button>get position</button>

    <script type="text/javascript">
         <!--
            var imgObj = null;
            
            var spacePos = [[13,5],[52,5],[91,5],[130,5],[169,5],[208,5],[247,5],[286,5],[325,5],[364,5],[403,5],[442,5],[481,5],[520,5],[559,5],[598,5],
                            [598,44],[598,83],[598,122],[598,161],[598,200],[598,239],[598,278],[598,317],[598,356],[598,395],[598,434],[598,473],[598,512],[598,551],[598,590],
                            [559,590],[520,590],[481,590],[442,590],[403,590],[364,590],[325,590],[286,590],[247,590],[208,590],[169,590],[130,590],[91,590],[52,590],[13,590],
                            [13,590],[13,551],[13,512],[13,473],[13,434],[13,395],[13,356],[13,317],[13,278],[13,239],[13,200],[13,161],[13,122],[13,83],[13,44]]; 
            var arrayPos=0;
            var arrayIndex=0;

            function getCssProperty(elmId, property){
               var elem = document.getElementById(elmId);
               return window.getComputedStyle(elem,null).getPropertyValue(property);
            }

            
            
            function move(pawn){
               imgObj = document.getElementById(pawn);
               imgObj.style.position= 'absolute'; 
               // imgObj.style.left =  getCssProperty(pawn,'left');
               //  imgObj.style.top =  getCssProperty(pawn,'top');
               for (x = 0; x < spacePos.length; x++) {
                  var arr = spacePos[x];
                  console.log(arr[0]);
                  console.log(parseInt(getCssProperty(pawn,'left')));
                  console.log(arr[0] === parseInt(getCssProperty(pawn,'left')));
                  if (arr[0] === parseInt(getCssProperty(pawn,'left')) && (arr[1] === parseInt(getCssProperty(pawn,'top')))) {
                    arrayIndex = x;
                    console.log(x);
                  }
               }
               if(arrayIndex===spacePos.length-1){
                    arrayIndex = -1;
                  }

               // arrayIndex=spacePos.indexOf([getCssProperty(pawn,'left'),getCssProperty(pawn,'top')]);
               imgObj.style.left =spacePos[arrayIndex+1][0] + 'px';
               imgObj.style.top =spacePos[arrayIndex+1][1] + 'px';
               
               // console.log(getCssProperty('myImage','left'));
            }
          
         //-->
      </script>

      <script>
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