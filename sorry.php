<?php

$debug=true;

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

print($index);
// Begin output
print '<article>';
//initialize gameOver and computerTurn variables both boolean
// Build the form for when the user wants to make moves
// We will need an input for different combos for certain cards that can get split, as well as whether or not a sorry is avialable
// And another input to choose which piece to move
// Whenever there is a post request, we are drawing a new card
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{	
	include "form.php";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{	
	include "form.php";
	// print($color);
	// $deck->shuffle();
	$cardNumber = $deck->draw();
		
	$pieceColor ='R'; // The user is red
	$pieceNumber = $_POST["piece"]; // The piece the user wants to move

	if($debug)
	{
		print('<p> Piece Color: '.$pieceColor);
		print('<p> Piece Number: '.$pieceNumber);
		print('<p> Card Number'.$cardNumber);
	}
	// Check if card is sorry
	if($cardNumber === 13)
	{

		// // Display form for sorry situation
		// // Grab positions for every piece that isn't in Start or Safety
		// $query = "SELECT p.Color, p.Number from Piece p, Space s
		// 		  WHERE p.SpaceColor = s.SpaceColor AND p.SpaceNumber = s.SpaceNumber
		// 		  AND s.isStart = 0 AND s.isSafety = 0 
		// 		  AND p.Color !='".$color."'";
				  
		// So we now know all of the pieces that the user can move back to start and switch places with, so we have to ask them 

	}

	// // Check if it is a 1
	// // Show options to move out of start (if there is a piece in start) 
	// // or move forward 1
	// else if($cardNumber ===1)
	// {

	// }

	// // Check if it's a 2
	// // Allow a user to:
	// // Move from start or
	// // Move forward 2
	// // Draw another card
	// else if($cardNumber ===2)
	// {

	// }
	// // Check if it's is a 4
	// // Move space backwards 4
	// else if($cardNumber ===4)
	// {

	// }

	// // Check if it's is a 7
	// // Ask the user how they would like to move with radio button (cant move space out of start)
	// // Possible Moves: 1 and 6, 4 and 3, just 7
	// else if($cardNumber ===7)
	// {

	// }

	// // Check if it's a 10
	// // Ask the user if they would like to move backwards 1 or forward 10
	// // If they can't' move forward 10, they MUST move backwards 1
	// else if($cardNumber ===10)
	// {

	// }

	// // Check if it's a 11
	// // Ask the user if they would like to: 
	// // Switch with another player (can not switch out of start)
	// // Move 11 spaces forward
	// // If they can't move 11 spaces, they must switch OR 
	// // Forfeit their turn
	// else if($cardNumber ===11)
	// {

	// }

	// Move the space X number forward
	else
	{
		$movePiece($cardNumber,$pieceColor, $pieceNumber);

	}

	
	// End the form
	print('<input type="submit" name="Draw Card" value="Draw Another Card"/>');
	print("</form>");

}

print '</article>';
include "footer.php";

/*
	Function with inputs that wil move a piece based off of those inputs
	Injects a div tag for js 
	Grabs current value in db for piece, and then updates what space it is on.
*/

$movePiece = function($cardNumber,$pieceColor, $pieceNumber)
{
	

	$board = new Board(); // Create a board
	echo '<div id="movePawn" value="'.$pieceColor.$pieceNumber.','.$cardNumber.'"</div>'; // Inject div so they can grab from javascript


	// Find the current position of the piece
	$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$pieceColor."' AND p.Number = '".$pieceNumber."'";

	$pieceToMove = $thisDatabaseReader->select($selectQuery,$data);

	$originalSpaceColor = $pieceToMove[0][0];

	$originalSpaceNumber = $pieceToMove[0][1];
	$originalSpace = strtolower($originalSpaceColor.$originalSpaceNumber);

	
	$index = $board->getIndex($originalSpace);

	// increment the index by the card drawn
	$index += $cardNumber;

	// Grab the space color and number that is at the index
	$newSpace = $board->getSpace($index);
	$newSpace = strtoupper($newSpace);
	
	// Update the piece in the database
	$newSpaceColor = substr($newSpace, 0, 1); // Grab the color
	$newSpaceNumber = substr($newSpace, 1,strlen($newSpace)); // Grab the number

	$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor."', p.SpaceNumber='".$newSpaceNumber."' WHERE p.Color = '".$pieceColor."' AND p.Number = '".$pieceNumber."'";

	
	$updated = $thisDatabaseWriter->update($updateQuery,$data);
	$debug = true; // Set to true for debugging
	// Debug
	if($debug)
	{
		print('<p> Select Query: '.$selectQuery);
		print_r('<p> Piece To move:'.$pieceToMove);
		print('<p> Original space color'.$originalSpaceColor);
		print_r('<p> Original Space:'.$originalSpace);
		print_r('<p> Target Space: '.$newSpace);
		print('<p>'.$updateQuery);
		print_r('<p> DB updated? '.$updated); // Will print 1 if true, 0 if false
	}
}; // end move piece function

?>

