<?php

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
		for($j=0; $j < 13; $j++)
		{
			if($j==4)
			{
				for($k=0;$k<2;$k++)
				{
					$values.="('".$color.(string)$j."-".(string)$k."','0','0','0'),";
				}				
			}
			elseif($j==2)
			{
				for($k=0;$k<7;$k++)
				{
					$values.="('".$color.(string)$j."-".(string)$k."','0','0','0'),";
				}
			}
			else
			{
				$values.= "('".$color . (string)$j."','0','0','0'),";
			}
		}
	}

	$query = 'INSERT INTO `Space` (`SpaceID`, `isStart`,`isSafety`,`isSlide`) VALUES'.$values;
	$query = rtrim($query,',');	

	// PIECE TABLE
	$values2="";
	foreach ($colorArray as $color) {
		for($j=1; $j <=4; $j++)
		{
			$values2.="('".$color."','".(string)$j."', '".$color."4-1'),";
		}

	}
	$query2 = 'INSERT INTO `Piece` (`Color`, `Number`,`SpaceID`) VALUES'.$values2;
	$query2 = rtrim($query2,',');	
?>