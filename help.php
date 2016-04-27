<?php

//##############################################################################
//
// Information on the rules of the game, and how our app works
// 
//##############################################################################
include "top.php";

// Begin output
print '<article>';
print('<h4> Welcome to the help page! Here you can find a very helpful link that explains how to play Sorry! </h4>');
print('<h5> To play our implementation of Sorry! simply selct the number of the pawn you would like to move and select "Draw Card" or "Draw Another Card" (if you have already completed a move). </h5>');
print('<h5> Once you have clicked this button simply click the "Move Piece" button to move the piece based off of the card you drew.</h5>');
print("<h6><a target='_blank' href='https://en.wikipedia.org/wiki/Sorry!_(game)'> Click this link to see the Wikipedia instructions for playing Sorry!</a></h6>");
print '</article>';
include "footer.php";
?>