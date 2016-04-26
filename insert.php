<?php
    include "top.php";

	// PHP Script to "start" the game by inserting data into the database. 
	// SPACE TABLE
	$values = "";
	$colorArray = array(
		0 => "B",
		1 => "G",
		2 => "R",
		3 => "Y"
	);
	foreach($colorArray as $color)
	{
		for($j=1; $j < 16; $j++)
		{
			if($j==5)
			{
				$values.= "('".$color."','". (string)$j."','0','0','0'),";
				for($k=1;$k<2;$k++)
				{
					$values.="('".$color."','".(string)$j."-".(string)$k."','0','0','0'),";
				}				
			}
			elseif($j==3)
			{
				$values.= "('".$color."','". (string)$j."','0','0','0'),";
				for($k=1;$k<7;$k++)
				{
					$values.="('".$color."','".(string)$j."-".(string)$k."','0','0','0'),";
                }
			}
			else
			{
				$values.= "('".$color."','". (string)$j."','0','0','0'),";
			}
		}
	}

	$query = "INSERT INTO `Space` (`SpaceColor`,`SpaceNumber`, `isStart`,`isSafety`,`isSlide`) VALUES ".$values;
	$query = rtrim($query,',');	
	$quoteCount = substr_count($query, "'");

	// print($query);
	// print($quoteCount);
	// Now that we have built the query, we need to insert it into the database. 
	$records = $thisDatabaseWriter->insert($query);
	// if($records)
	// {
	// 	print("<p> hey, it could have worked </p>");
	// }
	// else{
	// 	print("<p> hey, it didnt work </p>");
	// }
	// PIECE TABLE
	$values2="";
	foreach ($colorArray as $color) {
		for($j=1; $j <=4; $j++)
		{
			$values2.="('".$color."','".(string)$j."', '".$color."','5-1'),";
		}

	}
	$query2 = 'INSERT INTO `Piece` (`Color`, `Number`,`SpaceColor`,`SpaceNumber`) VALUES'.$values2;
	$query2 = rtrim($query2,',');	
	$quoteCount2 = substr_count($query2, "'");

	$records2 = $thisDatabaseWriter->insert($query2);
	
	print $query2;

	$query3 = 'SELECT * FROM Space';
	$records3 = $thisDatabaseReader->select($query3,$data,0,0,0,0,false,false);

	foreach ($records3 as $record) {
		print($record[0]);
	}
?>