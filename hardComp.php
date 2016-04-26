<?php

//##############################################################################
//
// Hard computer logic here. Will call in sorry.php
// 
//##############################################################################
include "top.php";
include "classes.php";

// Begin output
print '<article>';
print '<h2>Sample Page</h2>';

// Create a board
$board = new Board(); 

// initialize cardNumber for testing purposes
$cardNumber=2;

// define player's color
$playerColor='R';

// define computer's color
$compColor='Y';

// define pieceNumber 
$pieceNumber = 1;

// if computer draws a 1
if($cardNumber == 1){

	// query the computer's pawns and store them in an array
	$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
	$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
	print 'alah ';

	// store properties of each computer piece in variables
	$originalSpaceColor1 = $pieceToMove[0][0];
	$originalSpaceNumber1 = $pieceToMove[0][1];
	$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
	$index1 = $board->getIndex($originalSpace1);

	$originalSpaceColor2 = $pieceToMove[1][0];
	$originalSpaceNumber2 = $pieceToMove[1][1];
	$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
	$index2 = $board->getIndex($originalSpace2);

	$originalSpaceColor3 = $pieceToMove[2][0];
	$originalSpaceNumber3 = $pieceToMove[2][1];
	$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
	$index3 = $board->getIndex($originalSpace3);

	$originalSpaceColor4 = $pieceToMove[3][0];
	$originalSpaceNumber4 = $pieceToMove[3][1];
	$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
	$index4 = $board->getIndex($originalSpace4);
	print'poop';

	// query the player's pieces and store them in an array
	$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
	$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

	// store properties of each player piece in variables
	$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
	$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
	$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
	$indexP1 = $board->getIndex($originalPlayerSpace1);

	$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
	$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
	$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
	$indexP2 = $board->getIndex($originalPlayerSpace2);

	$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
	$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
	$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
	$indexP3 = $board->getIndex($originalPlayerSpace3);

	$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
	$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
	$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
	$indexP4 = $board->getIndex($originalPlayerSpace4);



	// if pawn1 is in start and there isn’t a compPawn on space right outside of start
	if(($originalSpace1=='y5-1')&&($originalSpace2!='y5')&&($originalSpace3!='y5')&&($originalSpace4!='y5')){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	//else if pawn2 is in start and there isn’t a compPawn on space outside of start
	else if(($originalSpace2=='y5-1')&&($originalSpace1!='y5')&&($originalSpace3!='y5')&&($originalSpace4!='y5')){

		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is in start and there isn’t a compPawn on space outside of start
	else if(($originalSpace3=='y5-1')&&($originalSpace2!='y5')&&($originalSpace1!='y5')&&($originalSpace4!='y5')){
		

		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}
   
	// else if pawn4 is in start and there isn’t a compPawn on space outside of start
	else if(($originalSpace4=='y5-1')&&($originalSpace2!='y5')&&($originalSpace3!='y5')&&($originalSpace1!='y5')){

		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn1 is not in home and not in start and pawn1.pos+1 is not occupied by compPawn
	else if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=$index1+1)&&($index3!=$index1+1)&&($index4!=$index1+1)){
		
		// move pawn1

		// store pawn number in variable
		$pieceNumber=1;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// check for sorry conditions
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and not in start and pawn2.pos+1 is not occupied by compPawn
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=$index2+1)&&($index3!=$index2+1)&&($index4!=$index2+1)){
		// move pawn2

		// declare piece number
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}
	
	// else if pawn3 is not in home and not in start and pawn3.pos+1 is not occupied by compPawn
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index1!=$index3+1)&&($index2!=$index3+1)&&($index4!=$index3+1)){
		
		// move pawn3

		// declare piece number
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		// update query with new information
		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";
	
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}
		
	// else if pawn4 is not in home and not in start and pawn4.pos+1 is not occupied by compPawn
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index1!=$index4+1)&&($index2!=$index4+1)&&($index3!=$index4+1)){
		// move pawn4

		// declare piece number
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}
	else
		
		//forfiet turn	
	
}

//if card is a 2
else if($cardNumber==2){

	// query the computer's pawns and store them in an array
	$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
	$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
	print 'alah ';

	// store properties of each computer piece in variables
	$originalSpaceColor1 = $pieceToMove[0][0];
	$originalSpaceNumber1 = $pieceToMove[0][1];
	$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
	$index1 = $board->getIndex($originalSpace1);

	$originalSpaceColor2 = $pieceToMove[1][0];
	$originalSpaceNumber2 = $pieceToMove[1][1];
	$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
	$index2 = $board->getIndex($originalSpace2);

	$originalSpaceColor3 = $pieceToMove[2][0];
	$originalSpaceNumber3 = $pieceToMove[2][1];
	$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
	$index3 = $board->getIndex($originalSpace3);

	$originalSpaceColor4 = $pieceToMove[3][0];
	$originalSpaceNumber4 = $pieceToMove[3][1];
	$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
	$index4 = $board->getIndex($originalSpace4);
	print'poop';

	// query the player's pieces and store them in an array
	$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
	$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

	// store properties of each player piece in variables
	$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
	$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
	$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
	$indexP1 = $board->getIndex($originalPlayerSpace1);

	$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
	$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
	$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
	$indexP2 = $board->getIndex($originalPlayerSpace2);

	$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
	$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
	$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
	$indexP3 = $board->getIndex($originalPlayerSpace3);

	$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
	$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
	$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
	$indexP4 = $board->getIndex($originalPlayerSpace4);

	// if pawn1 is in start and there isn’t a compPawn on space right outside of start
	if(($originalSpace1=='y5-1')&&($originalSpace2!='y5')&&($originalSpace3!='y5')&&($originalSpace4!='y5')){

		// move pawn1

		$pieceNumber=1;
			
		$index1 = $board->getIndex($originalSpace1);

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';

		// increment the index by 1 for special case of two
		$index1 += 1;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	//else if pawn2 is in start and there isn’t a compPawn on space outside of start
	else if(($originalSpace2=='y5-1')&&($originalSpace1!='y5')&&($originalSpace3!='y5')&&($originalSpace4!='y5')){

		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index 1 for two's special case
		$index2 += 1;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is in start and there isn’t a compPawn on space outside of start
	else if(($originalSpace3=='y5-1')&&($originalSpace2!='y5')&&($originalSpace1!='y5')&&($originalSpace4!='y5')){
		

		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by 1 for two's special case
		$index3 += 1;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}
   
	// else if pawn4 is in start and there isn’t a compPawn on space outside of start
	else if(($originalSpace4=='y5-1')&&($originalSpace2!='y5')&&($originalSpace3!='y5')&&($originalSpace1!='y5')){

		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by 1 for two's special case
		$index4 += 1;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn1 is not in home and pawn1 is not in start and $index1+cardNumber is not occupied by compPawn and piece does not go past home ($index1<30 && $index1+$cardNumber<=30)
	else if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber))&&($index3!=($index1+$cardNumber))&&($index4!=($index1+$cardNumber))&&((($index1<30) && (($index1+$cardNumber)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber))&&($index3!=($index2+$cardNumber))&&($index4!=($index2+$cardNumber))&&((($index2<30) && (($index2+$cardNumber)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber))&&($index1!=($index3+$cardNumber))&&($index4!=($index3+$cardNumber))&&((($index3<30) && (($index3+$cardNumber)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber))&&($index3!=($index4+$cardNumber))&&($index1!=($index4+$cardNumber))&&((($index4<30) && (($index4+$cardNumber)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else
}

//if card is a 3
else if($cardNumber==3){

	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber))&&($index3!=($index1+$cardNumber))&&($index4!=($index1+$cardNumber))&&((($index1<30) && (($index1+$cardNumber)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber))&&($index3!=($index2+$cardNumber))&&($index4!=($index2+$cardNumber))&&((($index2<30) && (($index2+$cardNumber)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber))&&($index1!=($index3+$cardNumber))&&($index4!=($index3+$cardNumber))&&((($index3<30) && (($index3+$cardNumber)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber))&&($index3!=($index4+$cardNumber))&&($index1!=($index4+$cardNumber))&&((($index4<30) && (($index4+$cardNumber)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit
	}

}

else if($cardNumber==4){

	// if pawn1 is not in home and pawn1 is not in start and $index1-cardNumber is not occupied by compPawn
	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1-$cardNumber))&&($index3!=($index1-$cardNumber))&&($index4!=($index1-$cardNumber))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 -= $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2-$cardNumber))&&($index3!=($index2-$cardNumber))&&($index4!=($index2-$cardNumber))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 -= $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3-$cardNumber))&&($index1!=($index3-$cardNumber))&&($index4!=($index3-$cardNumber))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 -= $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4-$cardNumber))&&($index3!=($index4-$cardNumber))&&($index1!=($index4-$cardNumber))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 -= $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit
	}

}

else if($cardNumber==5){

	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber))&&($index3!=($index1+$cardNumber))&&($index4!=($index1+$cardNumber))&&((($index1<30) && (($index1+$cardNumber)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber))&&($index3!=($index2+$cardNumber))&&($index4!=($index2+$cardNumber))&&((($index2<30) && (($index2+$cardNumber)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber))&&($index1!=($index3+$cardNumber))&&($index4!=($index3+$cardNumber))&&((($index3<30) && (($index3+$cardNumber)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber))&&($index3!=($index4+$cardNumber))&&($index1!=($index4+$cardNumber))&&((($index4<30) && (($index4+$cardNumber)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit
	}

}

else if($cardNumber==7){

	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber))&&($index3!=($index1+$cardNumber))&&($index4!=($index1+$cardNumber))&&((($index1<30) && (($index1+$cardNumber)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber))&&($index3!=($index2+$cardNumber))&&($index4!=($index2+$cardNumber))&&((($index2<30) && (($index2+$cardNumber)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber))&&($index1!=($index3+$cardNumber))&&($index4!=($index3+$cardNumber))&&((($index3<30) && (($index3+$cardNumber)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber))&&($index3!=($index4+$cardNumber))&&($index1!=($index4+$cardNumber))&&((($index4<30) && (($index4+$cardNumber)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit
	}

}

else if($cardNumber==8){

	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber))&&($index3!=($index1+$cardNumber))&&($index4!=($index1+$cardNumber))&&((($index1<30) && (($index1+$cardNumber)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber))&&($index3!=($index2+$cardNumber))&&($index4!=($index2+$cardNumber))&&((($index2<30) && (($index2+$cardNumber)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber))&&($index1!=($index3+$cardNumber))&&($index4!=($index3+$cardNumber))&&((($index3<30) && (($index3+$cardNumber)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber))&&($index3!=($index4+$cardNumber))&&($index1!=($index4+$cardNumber))&&((($index4<30) && (($index4+$cardNumber)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit
	}

}

else if($cardNumber==10){

	//define cardNumber1 and cardNumber2
	$cardNumber1=10;
	$cardNumber2=-1;

	// if pawn1 is not in home and pawn1 is not in start and $index1+cardNumber1 is not occupied by compPawn and piece does not go past home ($index1<30 && $index1+$cardNumber1<=30)
	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber1))&&($index3!=($index1+$cardNumber1))&&($index4!=($index1+$cardNumber1))&&((($index1<30) && (($index1+$cardNumber1)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber1.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber1;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber1 is not occupied by compPawn and $index2<30 $index2+cardNumber1 <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber1))&&($index3!=($index2+$cardNumber1))&&($index4!=($index2+$cardNumber1))&&((($index2<30) && (($index2+$cardNumber1)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber1.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber1;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber1 is not occupied by compPawn and $index3<30 && $index3+cardNumber1 <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber1))&&($index1!=($index3+$cardNumber1))&&($index4!=($index3+$cardNumber1))&&((($index3<30) && (($index3+$cardNumber1)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber1.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber1;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber1 is not occupied by compPawn && ($index4<30 && $index4+cardNumber1 <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber1))&&($index3!=($index4+$cardNumber1))&&($index1!=($index4+$cardNumber1))&&((($index4<30) && (($index4+$cardNumber1)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber1.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber1;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// if pawn1 is not in home and pawn1 is not in start and $index1+cardNumber2 is not occupied by compPawn
	else if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber2))&&($index3!=($index1+$cardNumber2))&&($index4!=($index1+$cardNumber2))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber2.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber2;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber2 is not occupied by compPawn 
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber2))&&($index3!=($index2+$cardNumber2))&&($index4!=($index2+$cardNumber2))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber2.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber2;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber2 is not occupied by compPawn 
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber2))&&($index1!=($index3+$cardNumber2))&&($index4!=($index3+$cardNumber2))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber2.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber2;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber1 is not occupied by compPawn
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber2))&&($index3!=($index4+$cardNumber2))&&($index1!=($index4+$cardNumber2))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber2.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber2;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit turn
	}
	
	

}

else if($cardNumber==11){

}

else if($cardNumber==12){

	// if pawn1 isn't home or in start and there isn't another compPawn 12 spaces ahead, and pawn1 <= 12 spaces from home
	if(($originalSpace1!='y5-1')&&($originalSpace1!='y3-6')&&($index2!=($index1+$cardNumber))&&($index3!=($index1+$cardNumber))&&($index4!=($index1+$cardNumber))&&((($index1<30) && (($index1+$cardNumber)<=30)) | ($index1>30))){

		// move pawn1

		$pieceNumber=1;


		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index1 = $board->getIndex($originalSpace1);

		// increment the index by the card drawn
		$index1 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace1 = $board->getSpace($index1);
		$newSpace1 = strtoupper($newSpace1);
		
		// Update the piece in the database
		$newSpaceColor1 = substr($newSpace1, 0, 1); // Grab the color
		$newSpaceNumber1 = substr($newSpace1, 1,strlen($newSpace1)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor1."', p.SpaceNumber='".$newSpaceNumber1."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");

		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);

		// if playerPawn1 is on same space as pawn1, send playerPawn1 to start
		if($originalSpace1==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn1, send playerPawn2 to start
		else if($originalSpace1==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn1, send playerPawn3 to start
		else if($originalSpace1==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn1, send playerPawn4 to start
		else if($originalSpace1==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn2 is not in home and pawn2 is not in start and $index2+cardNumber is not occupied by compPawn and $index2<30 $index2+cardNumber <= 30
	else if(($originalSpace2!='y5-1')&&($originalSpace2!='y3-6')&&($index1!=($index2+$cardNumber))&&($index3!=($index2+$cardNumber))&&($index4!=($index2+$cardNumber))&&((($index2<30) && (($index2+$cardNumber)<=30)) | ($index2>30))){
		
		// move pawn2
		$pieceNumber=2;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index2 = $board->getIndex($originalSpace2);

		// increment the index by the card drawn
		$index2 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace2 = $board->getSpace($index2);
		$newSpace2 = strtoupper($newSpace2);
		
		// Update the piece in the database
		$newSpaceColor2 = substr($newSpace2, 0, 1); // Grab the color
		$newSpaceNumber2 = substr($newSpace2, 1,strlen($newSpace2)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor2."', p.SpaceNumber='".$newSpaceNumber2."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah2 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn2, send playerPawn1 to start
		if($originalSpace2==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn2, send playerPawn2 to start
		else if($originalSpace2==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn2, send playerPawn3 to start
		else if($originalSpace2==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn2, send playerPawn4 to start
		else if($originalSpace2==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn3 is not in home and pawn3 is not in start and $index3+cardNumber is not occupied by compPawn and $index3<30 && $index3+cardNumber <= 30
	else if(($originalSpace3!='y5-1')&&($originalSpace3!='y3-6')&&($index2!=($index3+$cardNumber))&&($index1!=($index3+$cardNumber))&&($index4!=($index3+$cardNumber))&&((($index3<30) && (($index3+$cardNumber)<=30)) | ($index3>30))){
		
		// move pawn3
		$pieceNumber=3;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index3 = $board->getIndex($originalSpace3);

		// increment the index by the card drawn
		$index3 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace3 = $board->getSpace($index3);
		$newSpace3 = strtoupper($newSpace3);
		
		// Update the piece in the database
		$newSpaceColor3 = substr($newSpace3, 0, 1); // Grab the color
		$newSpaceNumber3 = substr($newSpace3, 1,strlen($newSpace3)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor3."', p.SpaceNumber='".$newSpaceNumber3."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah3 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn3, send playerPawn1 to start
		if($originalSpace3==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn3, send playerPawn2 to start
		else if($originalSpace3==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn3, send playerPawn3 to start
		else if($originalSpace3==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn3, send playerPawn4 to start
		else if($originalSpace3==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	// else if pawn4 is not in home and pawn4 is not in start and $index4+cardNumber is not occupied by compPawn && ($index4<30 && $index4+cardNumber <= 30)
	else if(($originalSpace4!='y5-1')&&($originalSpace4!='y3-6')&&($index2!=($index4+$cardNumber))&&($index3!=($index4+$cardNumber))&&($index1!=($index4+$cardNumber))&&((($index4<30) && (($index4+$cardNumber)<=30)) | ($index4>30))){
		
		// move pawn4
		$pieceNumber=4;

		echo '<div id="movePawn" value="'.$compColor.$pieceNumber.','.$cardNumber.'"</div>';
			
		$index4 = $board->getIndex($originalSpace4);

		// increment the index by the card drawn
		$index4 += $cardNumber;

		// Grab the space color and number that is at the index
		$newSpace4 = $board->getSpace($index4);
		$newSpace4 = strtoupper($newSpace4);
		
		// Update the piece in the database
		$newSpaceColor4 = substr($newSpace4, 0, 1); // Grab the color
		$newSpaceNumber4 = substr($newSpace4, 1,strlen($newSpace4)); // Grab the number

		$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newSpaceColor4."', p.SpaceNumber='".$newSpaceNumber4."' WHERE p.Color = '".$compColor."' AND p.Number = '".$pieceNumber."'";

		
		$updated = $thisDatabaseWriter->update($updateQuery,$data);

		// query the computer's pawns and store them in an array
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";	
		$pieceToMove = $thisDatabaseReader->select($selectQuery,"");
		print 'alah4 ';

		// store properties of each computer piece in variables
		$originalSpaceColor1 = $pieceToMove[0][0];
		$originalSpaceNumber1 = $pieceToMove[0][1];
		$originalSpace1 = strtolower($originalSpaceColor1.$originalSpaceNumber1);
		$index1 = $board->getIndex($originalSpace1);

		$originalSpaceColor2 = $pieceToMove[1][0];
		$originalSpaceNumber2 = $pieceToMove[1][1];
		$originalSpace2 = strtolower($originalSpaceColor2.$originalSpaceNumber2);
		$index2 = $board->getIndex($originalSpace2);

		$originalSpaceColor3 = $pieceToMove[2][0];
		$originalSpaceNumber3 = $pieceToMove[2][1];
		$originalSpace3 = strtolower($originalSpaceColor3.$originalSpaceNumber3);
		$index3 = $board->getIndex($originalSpace3);

		$originalSpaceColor4 = $pieceToMove[3][0];
		$originalSpaceNumber4 = $pieceToMove[3][1];
		$originalSpace4 = strtolower($originalSpaceColor4.$originalSpaceNumber4);
		$index4 = $board->getIndex($originalSpace4);
		print'poopyyyy';

		// query the player's pieces and store them in an array
		$selectQuery2 = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."'";
		$playerPieceToMove = $thisDatabaseReader->select($selectQuery2,"");


		// store properties of each player piece in variables
		$originalPlayerSpaceColor1 = $playerPieceToMove[0][0];
		$originalPlayerSpaceNumber1 = $playerPieceToMove[0][1];
		$originalPlayerSpace1 = strtolower($originalPlayerSpaceColor1.$originalPlayerSpaceNumber1);
		$indexP1 = $board->getIndex($originalPlayerSpace1);

		$originalPlayerSpaceColor2 = $playerPieceToMove[1][0];
		$originalPlayerSpaceNumber2 = $playerPieceToMove[1][1];
		$originalPlayerSpace2 = strtolower($originalPlayerSpaceColor2.$originalPlayerSpaceNumber2);
		$indexP2 = $board->getIndex($originalPlayerSpace2);

		$originalPlayerSpaceColor3 = $playerPieceToMove[2][0];
		$originalPlayerSpaceNumber3 = $playerPieceToMove[2][1];
		$originalPlayerSpace3 = strtolower($originalPlayerSpaceColor3.$originalPlayerSpaceNumber3);
		$indexP3 = $board->getIndex($originalPlayerSpace3);

		$originalPlayerSpaceColor4 = $playerPieceToMove[3][0];
		$originalPlayerSpaceNumber4 = $playerPieceToMove[3][1];
		$originalPlayerSpace4 = strtolower($originalPlayerSpaceColor4.$originalPlayerSpaceNumber4);
		$indexP4 = $board->getIndex($originalPlayerSpace4);


		// if playerPawn1 is on same space as pawn4, send playerPawn1 to start
		if($originalSpace4==$originalPlayerSpace1){

			// declare piece number
			$pieceNumber=1;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor1 = $playerColor; // Grab the color
			$newPlayerSpaceNumber1 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor1."', p.SpaceNumber='".$newPlayerSpaceNumber1."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
	
		}

		// if playerPawn2 is on same space as pawn4, send playerPawn2 to start
		else if($originalSpace4==$originalPlayerSpace2){

			// declare piece number
			$pieceNumber=2;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor2 = $playerColor; // Grab the color
			$newPlayerSpaceNumber2 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor2."', p.SpaceNumber='".$newPlayerSpaceNumber2."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn3 is on same space as pawn4, send playerPawn3 to start
		else if($originalSpace4==$originalPlayerSpace3){

			// declare piece number
			$pieceNumber=3;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor3 = $playerColor; // Grab the color
			$newPlayerSpaceNumber3 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor3."', p.SpaceNumber='".$newPlayerSpaceNumber3."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}

		// if playerPawn4 is on same space as pawn4, send playerPawn4 to start
		else if($originalSpace4==$originalPlayerSpace4){

			// declare piece number
			$pieceNumber=4;		
			
			// declare the color/number associated w/ start position
			$newPlayerSpaceColor4 = $playerColor; // Grab the color
			$newPlayerSpaceNumber4 = '5-1'; // Grab the number

			// update the database with new information
			$updateQuery = "UPDATE Piece p SET p.SpaceColor='".$newPlayerSpaceColor4."', p.SpaceNumber='".$newPlayerSpaceNumber4."' WHERE p.Color = '".$playerColor."' AND p.Number = '".$pieceNumber."'";
		
			$updated = $thisDatabaseWriter->update($updateQuery,$data);
		}
	}

	else{

		//forfeit
	}

}

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

print '</article>';
include "footer.php";
?>
