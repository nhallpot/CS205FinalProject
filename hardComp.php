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

//function for the computer's move
public function compMove(){

	//create variable for holding int value of draw
	var cardVal;

	//make sure game isn't over and it's the comp's turn
	if (gameOver == false && computerTurn == true){

		//draw
		cardVal = Deck.draw();

			if(cardVal == 0){
				//if there is at least one piece at start
				if((compPiece1.position == [4-1] |
					compPiece2.position == [4-1] |
					compPiece3.position == [4-1] |
					compPiece4.position == [4-1]) &&

				//and opponent has a piece outside of start
					(playerPiece1.position != [4-1])					
					//replace a piece at start with opponent's piece
				//else
					//forfeit turn

			}

			if(cardVal == 1){
				//if there is at least one piece at start and
				//the comp doesn't have a piece at space '4'
				if((compPiece1.position == [4-1] |
					compPiece2.position == [4-1] |
					compPiece3.position == [4-1] |
					compPiece4.position == [4-1]) && 
					(compPiece1.position != [4-0] &&
					compPiece2.position != [4-0] &&
					compPiece3.position != [4-0] &&
					compPiece4.position != [4-0]))

					//move out of home to space '4'
				//else
					//move piece fewest spaces to home
			}

			if(cardVal == 2){
				//if there is at least one piece at start and
				//the comp doesn't have a piece at space '4'
				if((compPiece1.position == [4-1] |
					compPiece2.position == [4-1] |
					compPiece3.position == [4-1] |
					compPiece4.position == [4-1]) && 
					(compPiece1.position != [4-0] &&
					compPiece2.position != [4-0] &&
					compPiece3.position != [4-0] &&
					compPiece4.position != [4-0]))
					//move out of home to space '4'
				//else
					//move piece fewest spaces to home
				//take another turn
				compMove();
			}

			if(cardVal == 3){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn
				//else
					//move piece fewest spaces to home 
			}

			if(cardVal == 4){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn
				//else
					//move piece closest to start 4 spaces backwards

			}

			if(cardVal == 5){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn
				//else
					//move piece closest to home 5 spaces

			}


			if(cardVal == 7){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn
				//else
					//

			}

			if(cardVal == 8){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn

			}

			if(cardVal == 10){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn

			}

			if(cardVal == 11){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn

			}

			if(cardVal == 12){
				//if all pieces are in start
				(if(compPiece1.position == [4-1] &&
					compPiece2.position == [4-1] &&
					compPiece3.position == [4-1] &&
					compPiece4.position == [4-1]))
					//forfeit turn

			}

	}
}

print '</article>';
include "footer.php";
?>