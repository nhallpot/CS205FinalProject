<?php
$debug = false; // Set to true for debugging
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
	print('<h2>Which piece(s) would you like to move ?</h2>');
	print('<form action="sorry.php" method="post">
			<input type="submit" name="Draw Card" value="Draw Card"/>');
	// Let user select their piece
	print('<input type="radio" name="piece" value="1">1</input>');
	print('<input type="radio" name="piece" value="2">2</input>');
	print('<input type="radio" name="piece" value="3">3</input>');
	print('<input type="radio" name="piece" value="4">4</input>');
	print('</form>');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{	
	// print($color);
	// $deck->shuffle();
	$cardNumber = $deck->draw();
	print('<h2>Which piece(s) would you like to move ?</h2>');
	// Start the form
	print('<form action="sorry.php" method="post">');
	// Let user select their piece
	print('<input type="radio" name="piece" value="1">1</input>');
	print('<input type="radio" name="piece" value="2">2</input>');
	print('<input type="radio" name="piece" value="3">3</input>');
	print('<input type="radio" name="piece" value="4">4</input>');
		
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
	// Check if it's is a 4
	// Move space backwards 4
	else if($cardNumber ===4)
	{
		$cardNumber = -4;
	}
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
	// Move the piece
	$board = new Board(); // Create a board
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
	// Grab the new space from the db after update
	$newPieceSpaceNumberColor = $thisDatabaseReader->select($selectQuery,$data);
	
	$newSpaceColor = $newPieceSpaceNumberColor[0][0];
	$newSpaceNumber = $newPieceSpaceNumberColor[0][1];
	echo '<div id="movePawn" value="'.$pieceColor.$pieceNumber.','.$cardNumber.','.$newSpaceColor.$newSpaceNumber.'"</div>'; // Inject div so they can grab from javascript
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
		print_r("<h1> NEW PIECE SPACE NUMBER AND COLOR: ".$newPieceSpaceNumberColor[0][0]);
		print("<h1> New Space Color: ".$newSpaceColor);
		print("<h1> HERE IS THE Updated after if statements CARD NUMBER".$cardNumber);
	}
	
	// Give the user a chance to select which pawn they would like to use (with CSS and Javascript???)
	
	// End the form
	print('<input type="submit" name="Draw Card" value="Draw Another Card"/>');
	print("</form>");
}
print '</article>';
?>


	<!--
	<article>
			<figure class = "redHome">
				<img id = "redPawn" src="images/redPawn.png">
			</figure>
	</article>
	-->


	<article id="board">
	  <img id="R1" class="pawn" src="images/redPawn.png" />
      <img id="R2" class="pawn" src="images/redPawn.png" />
      <img id="R3" class="pawn" src="images/redPawn.png" />
      <img id="R4" class="pawn" src="images/redPawn.png" />
      <img id="Y1" class="pawn" src="images/yellowPawn.png" />
      <img id="Y2" class="pawn" src="images/yellowPawn.png" />
      <img id="Y3" class="pawn" src="images/yellowPawn.png" />
      <img id="Y4" class="pawn" src="images/yellowPawn.png" />
      <img id="faceDown" src="images/back.jpg"/>
      <img id="card" src="images/0.jpg"/>
	</article> 

	<form id="updateButton" style="top:125px;position:absolute;">
      	<input type="button" value="Move piece" onclick="move();"/>

      	<script type="text/javascript">
      	 function setPosition(){
              if (sessionStorage.getItem("pawns") != null) {
                // Load positions of pawns
                var pawns = JSON.parse(sessionStorage.getItem("pawns"));
                // Set them on grid
                var x = 0;
                var y = 1;
                while (x < pawns.length) {
                  var pawn = 'R' + (y).toString();
                  var imgObj = document.getElementById(pawn);
                  imgObj.style.position = 'absolute';
                  imgObj.style.left = pawns[x][0] + 'px';
                  imgObj.style.top = pawns[x][1] + 'px';
                  x++;
                  pawn = 'Y' + (y).toString();
                  imgObj = document.getElementById(pawn)
                  imgObj.style.position = 'absolute';
                  imgObj.style.left = pawns[x][0] + 'px';
                  imgObj.style.top = pawns[x][1] + 'px';
                  x++;
                  y++;
                }
              var info = document.getElementById('movePawn').getAttribute('value').split(",");
              var pawn = info[0];
              var spaces = info[1];
              var newSpace = info[2].toLowerCase();
                document.getElementById('info').innerHTML = "You drew a " + spaces;
              }
            } 
            window.onload = setPosition();
            </script>
</form>


<!-- NEED TO MAKE THIS WORKkkkkkkkkKKKKKKKK
<form id="clear" style ="top:150px; position:absolute;"/>
	<input type ="button" value="Clear board" onclick="clear();"/>
</form>
-->

	<!--
    <form id="updateButton2" style="top:150px;position:absolute;">
         
         <input type="button" value="red pawn 2" onclick="move('R2','2');" />
    </form>
    <form id="updateButton3" style="top:175px;position:absolute;">
         
         <input type="button" value="red pawn 3" onclick="move('R3','3');" />
    </form>
    <form id="updateButton4" style="top:200px;position:absolute;">
         
         <input type="button" value="red pawn 4" onclick="move('R4','4');" />
    </form>
    <form id="updateButton5" style="top:225px;position:absolute;">
         
         <input type="button" value="yellow pawn" onclick="move('Y1','2');" />
    </form>
	
    <button>get position</button>
	-->




      <script type="text/javascript">
	    $(document).ready(function(){
	   		$("button").click(function(){
	        var x = $("p").position();
	        alert("Top position: " + x.top + " Left position: " + x.left);
			});
		});
	   </script>

<?php
include "footer.php";
?>