<?php
include "top.php";
?>

<link rel="stylesheet" type="text/css" href="css/base.css">
<?php
//################################
//This page acts as a simple GUI for displaying pre-canned queries from the database
print '<body>';
print '<h1 id="stat">Statistics</h1>';
print '<br>';
print '<h2>Hard Mode</h2>';
print'<ol> ';     
        
  if ($GET['display'] == "winsHard") {
            print '<li class="activePage"><a href="?display=winsHard">Wins</a></li>';
        } else {
            print '<li><a href="?display=winsHard">Wins</a></li>';
        }
        
        if ($path_parts['filename'] == "lossesHard") {
            print '<li class="activePage"><a href="?display=lossesHard">Losses</a></li>';
        } else {
            print '<li><a href="?display=lossesHard">Losses</a></li>';
        }
        
        if ($path_parts['filename'] == "ratioHard") {
            print '<li class="activePage"><a href="?display=ratioHard">Win/Loss Ratio</a></li>';
        } else {
            print '<li><a href="?display=ratioHard">Win/Loss Ratio</a></li>';
        }

        if ($path_parts['filename'] == "freqDrawHard") {
            print '<li class="activePage"><a href="?display=freqDrawHard">Most Frequently Drawn Card</a></li>';
        } else {
            print '<li><a href="?display=freqDrawHard">Most Frequently Drawn Card</a></li>';
        }
        
        if ($path_parts['filename'] == "avgTurnsHomeHard") {
            print '<li class="activePage"><a href="?display=avgTurnsHomeHard">Average Turns to Get Home</a></li>';
        } else {
            print '<li><a href="?display=avgTurnsHomeHard">Average Turns to Get Home</a></li>';
        }

        if ($path_parts['filename'] == "avgTurnsWinHard") {
            print '<li class="activePage"><a href="?display=avgTurnsWinHard">Average Turns to Win</a></li>';
        } else {
            print '<li><a href="?display=avgTurnsWinHard">Average Turns to Win</a></li>';
        }
print'</ol>';

	if(isset($_GET['display'])){

		$display = $_GET['display'];
	}
	if($display=='winsHard'){

		print '<h1>Wins</h1>';
		$stmt = 'SELECT * from Space';
		$winsHard = $thisDatabaseReader->select($stmt,$data,0,0,0,0,false,false);

		print_r($winsHard[1]);

	}
	else if($display == 'lossesHard'){

		print '<h1>Losses</h1>';
	}
	else if($display == 'ratioHard'){
		print '<h1>Win/Loss Ratio</h1>';
	}
	else if($display== 'freqDrawHard'){

		print '<h1>Most Frequently Drawn Card</h1>';
	}
	else if($display == 'avgTurnsHomeHard'){

		print '<h1>Average Turns to Get Home</h1>';
	}

    else if($display == 'avgTurnsWinHard'){

        print '<h1>Average Turns to Win</h1>';
    }

print '<br>';
print '<br>';
print '<h2>Easy Mode</h2>';
print'<ol> ';     
        
  if ($GET['display'] == "winsEasy") {
            print '<li class="activePage"><a href="?display=winsEasy">Wins</a></li>';
        } else {
            print '<li><a href="?display=winsEasy">Wins</a></li>';
        }
        
        if ($path_parts['filename'] == "lossesEasy") {
            print '<li class="activePage"><a href="?display=lossesEasy">Losses</a></li>';
        } else {
            print '<li><a href="?display=lossesEasy">Losses</a></li>';
        }
        
        if ($path_parts['filename'] == "ratioEasy") {
            print '<li class="activePage"><a href="?display=ratioEasy">Win/Loss Ratio</a></li>';
        } else {
            print '<li><a href="?display=ratioEasy">Win/Loss Ratio</a></li>';
        }

        if ($path_parts['filename'] == "freqDrawEasy") {
            print '<li class="activePage"><a href="?display=freqDrawEasy">Most Frequently Drawn Card</a></li>';
        } else {
            print '<li><a href="?display=freqDrawEasy">Most Frequently Drawn Card</a></li>';
        }
        
        if ($path_parts['filename'] == "avgTurnsHomeEasy") {
            print '<li class="activePage"><a href="?display=avgTurnsHomeEasy">Average Turns to Get Home</a></li>';
        } else {
            print '<li><a href="?display=avgTurnsHomeEasy">Average Turns to Get Home</a></li>';
        }

        if ($path_parts['filename'] == "avgTurnsWinEasy") {
            print '<li class="activePage"><a href="?display=avgTurnsWinEasy">Average Turns to Win</a></li>';
        } else {
            print '<li><a href="?display=avgTurnsWinEasy">Average Turns to Win</a></li>';
        }
print'</ol>';

    if(isset($_GET['display'])){

        $display = $_GET['display'];
    }
    if($display=='winsEasy'){

        print '<h1>Wins</h1>';
        print '<p>hi</p>';
        $stmt = "SELECT * from Space";
        $winsEasy = $thisDatabaseReader->select($stmt,"",0,0,1,0,false,false);

        print($winsEasy[1]);

    }
    else if($display == 'lossesEasy'){

        print '<h1>Losses</h1>';
    }
    else if($display == 'ratioEasy'){
        print '<h1>Win/Loss Ratio</h1>';
    }
    else if($display== 'freqDrawEasy'){

        print '<h1>Most Frequently Drawn Card</h1>';
    }
    else if($display == 'avgTurnsHomeEasy'){

        print '<h1>Average Turns to Get Home</h1>';
    }

    else if($display == 'avgTurnsWinEasy'){

        print '<h1>Average Turns to Win</h1>';
    }

    print '<br><br>';

    print '</body>';


include "footer.php";

?>
