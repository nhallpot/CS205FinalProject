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
<script type="text/javascript" src="move.js"></script>

<?php

$cardNumber=1;

// define player's color
$playerColor='R';

// define computer's color
$compColor='Y';

$pieceNumber = 1;

// if computer draws a 1
if($cardNumber == 1){

	// Create a board
	//$board = new Board(); 

	// select and query all pieces
	SelectAndQuery();



	// if pawn1 is in start and there isn’t a compPawn on space right outside of start

		// move pawn1

		// query pawns again
		SelectAndQuery();

		// if playerPawn1 is on same space as pawn1

			// send playerPawn1 to start

		// if playerPawn2 is on same space as pawn1

			// send playerPawn2 to start


		// if playerPawn3 is on same space as pawn1

			// send playerPawn3 to start

		// if playerPawn4 is on same space as pawn1

			// send playerPawn4 to start

	//else if pawn2 is in start and there isn’t a compPawn on space outside of start

		// move pawn2

		// query pawns again
		SelectAndQuery();

		// if playerPawn1 is on same space as pawn2

			// send playerPawn1 to start

		// if playerPawn2 is on same space as pawn2

			// send playerPawn2 to start

		// if playerPawn3 is on same space as pawn2

			// send playerPawn3 to start

		// if playerPawn4 is on same space as pawn2

			// send playerPawn4 to start

	// else if pawn3 is in start and there isn’t a compPawn on space outside of start
		

		// move pawn3

		// query pawns again
		SelectAndQuery();

		// if playerPawn1 is on same space as pawn3

			// send playerPawn1 to start

		// if playerPawn2 is on same space as pawn3

			// send playerPawn2 to start

		// if playerPawn3 is on same space as pawn3

			// send playerPawn3 to start

		// if playerPawn4 is on same space as pawn3

			// send playerPawn4 to start
   
	// else if pawn4 is in start and there isn’t a compPawn on space outside of start

		// move pawn4

		// query pawns again
		SelectAndQuery();

		// if playerPawn1 is on same space as pawn4

			// send playerPawn1 to start

		// if playerPawn2 is on same space as pawn4

			// send playerPawn2 to start

		// if playerPawn3 is on same space as pawn4

			// send playerPawn3 to start

		// if playerPawn4 is on same space as pawn4

			// send playerPawn4 to start

	// // else if pawn1 is not in home and not in start and pawn1.pos+1 is not occupied by compPawn
	// else if(($pieceToMove[0][1] != '3-6')&&($pieceToMove[0][1] != '5-1')&&())
	// 	// move pawn1
	// 	// if playerPawn is on same space as pawn1
	// 		// send playerPawn to start
	
	// // else if pawn2 is not in home and not in start and pawn2.pos+1 is not occupied by compPawn
	// else if(($pieceToMove[1][1] != '3-6')&&($pieceToMove[1][1] != '5-1')&&())
	// 	// move pawn2
	// 	// if playerPawn is on same space as pawn2
	// 		// send playerPawn to start
	
	// // else if pawn3 is not in home and not in start and pawn3.pos+1 is not occupied by compPawn
	// else if(($pieceToMove[2][1] != '3-6')&&($pieceToMove[2][1] != '5-1')&&())
	// 	// move pawn3
	// 	// if playerPawn is on same space as pawn3
	// 		// send playerPawn to start
		
	// // else if pawn4 is not in home and not in start and pawn4.pos+1 is not occupied by compPawn
	// else if(($pieceToMove[3][1] != '3-6')&&($pieceToMove[3][1] != '5-1')&&())
	// 	// move pawn4
	// 	// if playerPawn is on same space as pawn4
	// 		// send playerPawn to start
	// else
	// 	print'poop';
	
	
}

//if card is a 2

//if card is a 3










// $selectquery = "SELECT * from Piece";
// $pieceToMove = $thisDatabaseReader->select($selectquery,"");
// //print("hi");
// if($pieceToMove)
// 		{
// 			print_r($pieceToMove);
// 		}

//print("hi");



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
	$debug = false; // Set to true for debugging
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


// select and query function that selects all pawns and assigns properties to variables
function SelectAndQuery(){

	// query the computer's pieces and store them in an array
	$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
	print('hello');
	$pieceToMove = $thisDatabaseReader->select($selectQuery,'');
	print('hi');

	// // store properties of each computer piece in variables
	// $originalSpaceColor1 = $pieceToMove[0][0];
	// $originalSpaceNumber1 = $pieceToMove[0][1];
	// $originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
	// $index1 = $board->getIndex($originalSpace1);

	// $originalSpaceColor2 = $pieceToMove[1][0];
	// $originalSpaceNumber2 = $pieceToMove[1][1];
	// $originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
	// $index2 = $board->getIndex($originalSpace2);

	// $originalSpaceColor3 = $pieceToMove[2][0];
	// $originalSpaceNumber3 = $pieceToMove[2][1];
	// $originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
	// $index3 = $board->getIndex($originalSpace3);

	// $originalSpaceColor4 = $pieceToMove[3][0];
	// $originalSpaceNumber4 = $pieceToMove[3][1];
	// $originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
	// $index4 = $board->getIndex($originalSpace4);


	// // query the player's pieces and store them in an array
	// $selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
	// $playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


	// // store properties of each player piece in variables
	// $originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
	// $originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
	// $originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
	// $indexP1 = $board->getIndex($originalPlayerSpace1);

	// $originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
	// $originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
	// $originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
	// $indexP2 = $board->getIndex($originalPlayerSpace2);

	// $originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
	// $originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
	// $originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
	// $indexP3 = $board->getIndex($originalPlayerSpace3);

	// $originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
	// $originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
	// $originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
	// $indexP4 = $board->getIndex($originalPlayerSpace4);

	}

print '</article>';
include "footer.php";
?>
