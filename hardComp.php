<?php

//##############################################################################
//
// Hard computer logic here. Will call in sorry.php
// 
//##############################################################################
include "top.php";

// Begin output
print '<article>';
print '<h2>Sample Page</h2>';

?>
	<article>
	    <img id="redPawn1" class="pawn" src="images/redPawn.png" />
      <img id="yellowPawn1" class="pawn" src="images/yellowPawn.png" />
      <img id="redPawn2" class="pawn" src="images/redPawn.png" />
      <img id="redPawn3" class="pawn" src="images/redPawn.png" />
       <img id="redPawn4" class="pawn" src="images/redPawn.png" />
	

		<!-- Pawn test <figure class = "greenHome">
			<img src="images/redPawn.png">
		</figure> -->
	</article> 
<script type="text/javascript" src="move.js"></script>

<?php
print("hi");
$selectquery= 'SELECT * from "Piece"';
print("hi");
$pieceToMove = $thisDatabaseReader->select($selectquery,$data);
print("hi");
print($pieceToMove[0]);
print("hi");
?>

<script type="text/javascript">
//function for the computer's move


	//create variable for holding int value of draw
	var cardVal = 1;

	document.write(cardVal+" ");
	document.write(spacePos.length+" ");

		//draw
		//cardVal = Deck.draw();

		/*	if(cardVal == 0){
				//if there is at least one piece at start

				//and opponent has a piece outside of start
					(playerPiece1.position != [4-1])					
					//replace a piece at start with opponent's piece
				//else
					//forfeit turn

			}

			*/

			if(cardVal == 1){

				document.write(cardVal+" ");
				//if there is at least one piece at start and
				//the comp doesn't have a piece at first space
				//move out of start to first space
				if(cardVal == 2){

					document.write(2);

				}

				//else move piece fewest spaces to home	
				else{

					document.write(spacePos.length+" ");

					for(var i=1; i<=4; i++){

						imgObj = document.getElementById("redPawn"+i);
               			imgObj.style.position= 'absolute'; 

						document.write(cardVal+" ");

						for (var x = 0; x < spacePos.length; x++) {
		                  var arr = spacePos[x];
		                  //console.log(arr[0]);
		                  //console.log(parseInt(getCssProperty(pawn,'left')));
		                  //console.log(arr[0] === parseInt(getCssProperty(pawn,'left')));
		                  if (arr[0] === parseInt(getCssProperty('redPawn'+i,'left')) && (arr[1] === parseInt(getCssProperty('redPawn'+i,'top')))) {
		                    arrayIndex = x;
		                    //document.write(x);
                 			}
               			}

               			imgObj.style.left =spacePos[arrayIndex+cardVal][0] + 'px';
               			imgObj.style.top =spacePos[arrayIndex+cardVal][1] + 'px';
               			for (var x = 0; x < spacePos.length; x++) {
		                  var arr = spacePos[x];
		                  //console.log(arr[0]);
		                  //console.log(parseInt(getCssProperty(pawn,'left')));
		                  //console.log(arr[0] === parseInt(getCssProperty(pawn,'left')));
		                  if (arr[0] === parseInt(getCssProperty('redPawn'+i,'left')) && (arr[1] === parseInt(getCssProperty('redPawn'+i,'top')))) {
		                    arrayIndex = x;
		                    //document.write(x);
                 			}
               			}

               			document.write("arrayindex: "+arrayIndex+" ");

					}
					
				}
					

			}

/*
			if(cardVal == 2){

				//if there is at least one piece at start and
				//the comp doesn't have a piece at space '4'
			
					//move out of home to space '4'
				//else
					//move piece fewest spaces to home
				//take another turn
				compMove();
			}

			if(cardVal == 3){
				//if all pieces are in start
		
					//forfeit turn
				//else
					//move piece fewest spaces to home 
			}

			if(cardVal == 4){
				//if all pieces are in start
	
					//forfeit turn
				//else
					//move piece closest to start 4 spaces backwards

			}

			if(cardVal == 5){
				//if all pieces are in start
	
					//forfeit turn
				//else
					//move piece closest to home 5 spaces

			}


			if(cardVal == 7){
				//if all pieces are in start
		
					//forfeit turn
				//else
					//

			}

			if(cardVal == 8){
				//if all pieces are in start
		
					//forfeit turn

			}

			if(cardVal == 10){
				//if all pieces are in start
		
					//forfeit turn

			}

			if(cardVal == 11){
				//if all pieces are in start
				
					//forfeit turn

			}

			if(cardVal == 12){
				//if all pieces are in start
				
					//forfeit turn

			}
			*/

</script>

<?php
print '</article>';
include "footer.php";
?>
