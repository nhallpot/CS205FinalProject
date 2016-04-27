<?php

//##############################################################################
//
// Easy computer logic here. Will call in sorry.php
// 
//##############################################################################
include "top.php";

// Begin output
print '<article>';
print '<h2>Sample Page</h2>';

//while neither player nor computer has won yet
	//if it's the computer's turn, draw()

		//if the card is a 1 or 2 and there is at least
		//1 piece still at home, move out of home

		//else
		//for each piece not in home
			//for each value on the card
				//determine final position going forwards and backwards
				//calculate distance to end
				//store top 4 minimum piece and card value
		
		//if the player is not on the square, move to minimum
		//else if the player is not on the 2nd min square, move to the 2nd minimum
		//else if the player is not on the 3rd min square, move to the 3rd minimum
		//else if the player is on the 4th min square, move to the minimum
		//else move to the 4th minimum
print '</article>';
include "footer.php";
?>