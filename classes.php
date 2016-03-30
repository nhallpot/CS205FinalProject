<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            class Piece {
                
                /* String, int, int, boolean, int, respectively */
                public $color, $number, $position, $inSafety, $fnkSpaceID;
                
                
                public function __construct() {
                }
            }
            
            class Space {
                
                /* int,boolean, boolean, boolean */
                public $pmkSpaceID, $isStart, $isSafety, $isSlide;
                
                public function __construct() {
                    
                }
            }
            
            class Card {
                
                /* int */
                public $value;
                
                public function __construct($value) {
                    $this->value = $value;
                } 
            }
            
            class Deck {
                
                /* cards array */
                public $cards = array(45);
                
                public function __construct() {
                    /* deck contains 5 ones, and four of every other */
                    for ($i = 0; $i < 5; $i++) {
                        $this->cards[$i] = new Card(1);
                    }
                    
                    $i = 5;
                    /* 13 is a Sorry! card, 6s and 9s don't exist */
                    while ($i < 46) {
                        $this->cards[$i++] = new Card(2);
                        $this->cards[$i++] = new Card(3);
                        $this->cards[$i++] = new Card(4);
                        $this->cards[$i++] = new Card(5);
                        $this->cards[$i++] = new Card(7);
                        $this->cards[$i++] = new Card(8);
                        $this->cards[$i++] = new Card(10);
                        $this->cards[$i++] = new Card(11);
                        $this->cards[$i++] = new Card(12);
                        $this->cards[$i++] = new Card(13);
                    }
                }
                
                public function draw() {
                    return array_pop($this->cards);
                }
                
                public function shuffle() {
                    for ($j = 0; $j <= count($this->cards); $j++) {
                        
                        $rand = mt_rand(0, count($this->cards)-1);
                        $temp = $this->cards[$rand];
                        $this->cards[$rand] = $this->cards[$j]; 
                        $this->cards[$j] = $temp;
                    }
                }
                
                public function isEmpty() {
                    if (count($this->cards) == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            
            class Player {
                /* string, string */
                public $name, $color;
                public function __construct() {
                }
            }
            
            class Game {
                /* int, deck, player, piece, boolean, boolean, boolean */
                public $difficulty, $deck, $player, $array, $showStats, $showBoard, $showHelp;
                
                public function __construct() {
                }
                
                public function updateDatabase() {
                    /* access sql */
                }           
            }
        ?>
    </body>
</html>
