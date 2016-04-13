<?php

//##############################################################################
//
// This is where all of the game logic will go.
// All of the database calls from post requests will be here
// 
//##############################################################################
include "top.php";
include "classes.php";

// Begin output
print '<article>';

// Build the form for when the user wants to make moves
// We will need an input for different combos for certain cards that can get split, as well as whether or not a sorry is avialable
// And another input to choose which piece to move
// Whenever there is a post request, we are drawing a new card
print($deck);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$deck = new Deck(); // Instantiate a Deck that will be used throughout program.
	$card = $deck.draw();
}
print("hello2");
// Grab the current form data and store in variables
// Grab the current position and add the value(s) to the specificed pieces

// Check if a given situation is available

// Update database

print('<form action="sorry.php" method="POST">
		<label>'.$card.'</label>
		<input type="submit" value="Draw Card">
</form>');
// When someone makes a post request, they will usually be making a move or making a decision. We need to know which card they drew

print '</article>';
include "footer.php";
?>