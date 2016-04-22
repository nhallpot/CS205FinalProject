<?php

//##############################################################################
//
// This is where all of the game logic will go.
// All of the database calls from post requests will be here
// 
//##############################################################################
include "top.php";
include "classes.php";
$deck = new Deck(); // Instantiate a Deck that will be used throughout program.
$deck->shuffle();
// Begin output
print '<article>';
//initialize gameOver and computerTurn variables both boolean
// Build the form for when the user wants to make moves
// We will need an input for different combos for certain cards that can get split, as well as whether or not a sorry is avialable
// And another input to choose which piece to move
// Whenever there is a post request, we are drawing a new card
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{	
	$color = 'G'; // Every game will start with the user who is the color Green. The computer will always be Red.
	print('<form action="sorry.php" method="post">
			<input type="submit" name="Draw Card" value="Draw Card"/>
	</form>');
	print($color);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{	
	print($color);
	// $deck->shuffle();
	$card = $deck->draw();

	print('<h2>Which piece(s) would you like to move and how would you like to move them?</h2>');

	// Start the form
	print('<form action="sorry.php" method="post">');

	// Let user select their piece
	print('<input type="button" name="piece" value="1"/>');
	print('<input type="button" name="piece" value="2"/>');
	print('<input type="button" name="piece" value="3"/>');
	print('<input type="button" name="piece" value="4"/>');

	// Check if card is sorry
	if($card === 13)
	{
		// Display form for sorry situation
	}

	// Check if it is a 1
	// Show options to move out of start (if there is a piece in start) 
	// or move forward 1
	else if($card ===1)
	{

	}

	// Check if it's a 2
	// Allow a user to:
	// Move from start or
	// Move forward 2
	// Draw another card
	else if($card ===2)
	{

	}
	// Check if it's is a 4
	// Move space backwards 4
	else if($card ===4)
	{

	}

	// Check if it's is a 7
	// Ask the user how they would like to move with radio button (cant move space out of start)
	// Possible Moves: 1 and 6, 4 and 3, just 7
	else if($card ===7)
	{

	}

	// Check if it's a 10
	// Ask the user if they would like to move backwards 1 or forward 10
	// If they can't' move forward 10, they MUST move backwards 1
	else if($card ===10)
	{

	}

	// Check if it's a 11
	// Ask the user if they would like to: 
	// Switch with another player (can not switch out of start)
	// Move 11 spaces forward
	// If they can't move 11 spaces, they must switch OR 
	// Forfeit their turn
	else if($card ===11)
	{

	}

	// Move the space X number forward
	else
	{

	}
	// Give the user a chance to select which pawn they would like to use (with CSS and Javascript???)


	
	// End the form
	print('<input type="submit" name="Draw Card" value="Draw Another Card"/>');
	print("</form>");

	$color = 'R';

}

print '</article>';
include "footer.php";
?>