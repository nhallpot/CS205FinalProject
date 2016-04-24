<?php
	$spacesOnBoard = array();
     array_push($spacesOnBoard,
                     'b1','b2','b3','b3-1', 'b3-2', 'b3-3', 'b3-4','b3-5','b3-6', 'b4', 'b5','b5-1','b6', 'b7', 'b8', 'b9','b10','b11','b12','b13','b14','b15',
                     'y1','y2','y3','y3-1','y3-2','y3-3','y3-4','y3-5','y3-6','y4','y5','y6','y7','y8','y9','y10','y11','y12','y13','y14','y15',
                    'g1','g2','g3','g3-1','g3-2','g3-3','g3-4','g3-5','g3-6','g4','g5','g6','g7','g8','g9','g10','g11','g12','g13','g14','g15',
                   'r1','r2','r3','r3-1','r3-2','r3-3','r3-4','r3-5','r3-6','r4','r5','r6','r7','r8','r9','r10','r11','r12','r13','r14','r15');
	print_r($spacesOnBoard);
	$search = 'b3';
	print($search);
	$index = array_search($search, $spacesOnBoard);
	print($index);
?>