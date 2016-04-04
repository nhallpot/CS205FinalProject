<?php
	include "top.php";
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
				for($k=0;$k<6;$k++)
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
	print($query);
?>