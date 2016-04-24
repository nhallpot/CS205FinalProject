<?php
	print('<h2>Which piece(s) would you like to move ?</h2>');
	print('<form action="sorry.php" method="post">');
			
	// Let user select their piece
	print('<input type="radio" name="piece" value="1">1</input>');
	print('<input type="radio" name="piece" value="2">2</input>');
	print('<input type="radio" name="piece" value="3">3</input>');
	print('<input type="radio" name="piece" value="4">4</input>');
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		print('<input type="submit" name="Draw Card" value="Draw Another Card"/>');
		print("</form>");
	}
	else
	{
		print('<input type="submit" name="Draw Card" value="Draw Card"/>');
		print('</form>');
	}



?>