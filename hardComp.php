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

	// query the computer's pieces and store them in an array
	$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";
	$pieceToMove = $thisDatabaseReader->select($selectQuery,$data);

	// query the player's pieces and store them in an array
	$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$playerColor."' ";
	$playerPieceToMove = $thisDatabaseReader->select($selectQuery,$data);

	// if pawn1 is in start and there isn’t a compPawn on space right outside of start
	if(($pieceToMove[0][1] == '5-1')&&($pieceToMove[1][1] != '5')&&($pieceToMove[2][1] != '5')&&($pieceToMove[3][1] != '5'));

		print 'bitch';

		// move pawn1

		// query pawns again
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";
		$pieceToMove = $thisDatabaseReader->select($selectQuery,$data);

		// if playerPawn1 is on same space as pawn1
		if($playerPieceToMove[0][1] == $pieceToMove[0][1])

			// send playerPawn1 to start
			print 'bitch';

		// if playerPawn2 is on same space as pawn1
		if($playerPieceToMove[1][1] == $pieceToMove[0][1])

			// send playerPawn2 to start
			print 'bitch';

		// if playerPawn3 is on same space as pawn1
		if($playerPieceToMove[2][1] == $pieceToMove[0][1])

			// send playerPawn3 to start
			print 'bitch';

		// if playerPawn4 is on same space as pawn1
		if($playerPieceToMove[3][1] == $pieceToMove[0][1])

			// send playerPawn4 to start
			print 'bitch';


	//else if pawn2 is in start and there isn’t a compPawn on space outside of start
	else if(($pieceToMove[1][1] == '5-1')&&($pieceToMove[0][1] != '5')&&($pieceToMove[2][1] != '5')&&($pieceToMove[3][1] != '5'));

		print 'bitch';

		// move pawn2

		// query pawns again
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";
		$pieceToMove = $thisDatabaseReader->select($selectQuery,$data);

		// if playerPawn1 is on same space as pawn2
		if($playerPieceToMove[0][1] == $pieceToMove[1][1])

			// send playerPawn1 to start
			print 'bitch';

		// if playerPawn2 is on same space as pawn2
		if($playerPieceToMove[1][1] == $pieceToMove[1][1])

			// send playerPawn2 to start
			print 'bitch';

		// if playerPawn3 is on same space as pawn2
		if($playerPieceToMove[2][1] == $pieceToMove[1][1])

			// send playerPawn3 to start
			print 'bitch';

		// if playerPawn4 is on same space as pawn2
		if($playerPieceToMove[3][1] == $pieceToMove[1][1])

			// send playerPawn4 to start
			print 'bitch';

	// else if pawn3 is in start and there isn’t a compPawn on space outside of start
	else if(($pieceToMove[2][1] == '5-1')&&($pieceToMove[1][1] != '5')&&($pieceToMove[0][1] != '5')&&($pieceToMove[3][1] != '5'));
		
		print 'bitch';

		// move pawn3

		// query pawns again
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";
		$pieceToMove = $thisDatabaseReader->select($selectQuery,$data);

		// if playerPawn1 is on same space as pawn3
		if($playerPieceToMove[0][1] == $pieceToMove[2][1])

			// send playerPawn1 to start
			print 'bitch';

		// if playerPawn2 is on same space as pawn3
		if($playerPieceToMove[1][1] == $pieceToMove[2][1])

			// send playerPawn2 to start
			print 'bitch';

		// if playerPawn3 is on same space as pawn3
		if($playerPieceToMove[2][1] == $pieceToMove[2][1])

			// send playerPawn3 to start
			print 'bitch';

		// if playerPawn4 is on same space as pawn3
		if($playerPieceToMove[3][1] == $pieceToMove[2][1])

			// send playerPawn4 to start
			print 'bitch';

	// else if pawn4 is in start and there isn’t a compPawn on space outside of start
	else if(($pieceToMove[3][1] == '5-1')&&($pieceToMove[1][1] != '5')&&($pieceToMove[2][1] != '5')&&($pieceToMove[0][1] != '5'));
		
		print 'bitch';

		// move pawn4

		// query pawns again
		$selectQuery = "SELECT p.SpaceColor, p.SpaceNumber FROM Piece p WHERE p.Color = '".$compColor."'";
		$pieceToMove = $thisDatabaseReader->select($selectQuery,$data);

		// if playerPawn1 is on same space as pawn4
		if($playerPieceToMove[0][1] == $pieceToMove[3][1])

			// send playerPawn1 to start
			print 'bitch';

		// if playerPawn2 is on same space as pawn4
		if($playerPieceToMove[1][1] == $pieceToMove[3][1])

			// send playerPawn2 to start
			print 'bitch';

		// if playerPawn3 is on same space as pawn4
		if($playerPieceToMove[2][1] == $pieceToMove[3][1])

			// send playerPawn3 to start
			print 'bitch';

		// if playerPawn4 is on same space as pawn4
		if($playerPieceToMove[3][1] == $pieceToMove[3][1])

			// send playerPawn4 to start
			print 'bitch';
	
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










// $selectquery = "SELECT * from Piece";
// $pieceToMove = $thisDatabaseReader->select($selectquery,$data);
// //print("hi");
// if($pieceToMove)
// 		{
// 			print_r($pieceToMove);
// 		}

//print("hi");


// //function for the computer's move


// 	//create variable for holding int value of draw
// 	var cardVal = 1;

// 	//document.write(cardVal+" ");
// 	//document.write(spacePos.length+" ");

// 		//draw
// 		//cardVal = Deck.draw();

// 		/*	if(cardVal == 0){
// 				//if there is at least one piece at start

// 				//and opponent has a piece outside of start
// 					(playerPiece1.position != [4-1])					
// 					//replace a piece at start with opponent's piece
// 				//else
// 					//forfeit turn

// 			}

// 			*/

// 			if(cardVal == 1){

// 				//document.write(cardVal+" ");
// 				//if there is at least one piece at start and
// 				//the comp doesn't have a piece at first space
// 				//move out of start to first space
// 				if(cardVal == 2){

// 					//document.write(2);

// 				}

// 				//else move piece fewest spaces to home	
// 				else{

// 					//document.write(spacePos.length+" ");

// 					for(var i=1; i<=4; i++){

// 						imgObj = document.getElementById("redPawn"+i);
//                			imgObj.style.position= 'absolute'; 

// 						//document.write(cardVal+" ");

// 						for (var x = 0; x < spacePos.length; x++) {
// 		                  var arr = spacePos[x];
// 		                  //console.log(arr[0]);
// 		                  //console.log(parseInt(getCssProperty(pawn,'left')));
// 		                  //console.log(arr[0] === parseInt(getCssProperty(pawn,'left')));
// 		                  if (arr[0] === parseInt(getCssProperty('redPawn'+i,'left')) && (arr[1] === parseInt(getCssProperty('redPawn'+i,'top')))) {
// 		                    arrayIndex = x;
// 		                    //document.write(x);
//                  			}
//                			}

//                			imgObj.style.left =spacePos[arrayIndex+cardVal][0] + 'px';
//                			imgObj.style.top =spacePos[arrayIndex+cardVal][1] + 'px';
//                			for (var x = 0; x < spacePos.length; x++) {
// 		                  var arr = spacePos[x];
// 		                  //console.log(arr[0]);
// 		                  //console.log(parseInt(getCssProperty(pawn,'left')));
// 		                  //console.log(arr[0] === parseInt(getCssProperty(pawn,'left')));
// 		                  if (arr[0] === parseInt(getCssProperty('redPawn'+i,'left')) && (arr[1] === parseInt(getCssProperty('redPawn'+i,'top')))) {
// 		                    arrayIndex = x;
// 		                    //document.write(x);
//                  			}
//                			}

//                			//document.write("arrayindex: "+arrayIndex+" ");

// 					}
					
// 				}
					

// 			}

// /*
// 			if(cardVal == 2){

// 				//if there is at least one piece at start and
// 				//the comp doesn't have a piece at space '4'
			
// 					//move out of home to space '4'
// 				//else
// 					//move piece fewest spaces to home
// 				//take another turn
// 				compMove();
// 			}

// 			if(cardVal == 3){
// 				//if all pieces are in start
		
// 					//forfeit turn
// 				//else
// 					//move piece fewest spaces to home 
// 			}

// 			if(cardVal == 4){
// 				//if all pieces are in start
	
// 					//forfeit turn
// 				//else
// 					//move piece closest to start 4 spaces backwards

// 			}

// 			if(cardVal == 5){
// 				//if all pieces are in start
	
// 					//forfeit turn
// 				//else
// 					//move piece closest to home 5 spaces

// 			}


// 			if(cardVal == 7){
// 				//if all pieces are in start
		
// 					//forfeit turn
// 				//else
// 					//

// 			}

// 			if(cardVal == 8){
// 				//if all pieces are in start
		
// 					//forfeit turn

// 			}

// 			if(cardVal == 10){
// 				//if all pieces are in start
		
// 					//forfeit turn

// 			}

// 			if(cardVal == 11){
// 				//if all pieces are in start
				
// 					//forfeit turn

// 			}

// 			if(cardVal == 12){
// 				//if all pieces are in start
				
// 					//forfeit turn

// 			}
// 			*/


print '</article>';
include "footer.php";
?>
