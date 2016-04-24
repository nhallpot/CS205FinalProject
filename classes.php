<?php
// Stores all of the classes we will need for the game of Sorry!
    class Piece {
        
        /* String, int, int, boolean, int, respectively */
        public $color, $number, $fnkSpaceNumber, $fnkSpaceColor;
        
        
        public function __construct() {
        }
    }
    
    class Space {
        
        /* int,boolean, boolean, boolean */
        public $pmkSpaceNumber,$pmkSpaceColor, $isStart, $isSafety, $isSlide;
        
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
            $card = array_pop($this->cards);
            return $card->value;
        }
        
        public function shuffle() {
            if (!$this->isEmpty()) {
                shuffle($this->cards);  
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
        
    } 
    class Board {
        /* int, deck, player, piece, boolean, boolean, boolean */
        private $spacesOnBoard;
        
        public function __construct() {

            $this->spacesOnBoard = array();

            array_push($this->spacesOnBoard,
                             'b1','b2','b3','b3-1', 'b3-2', 'b3-3', 'b3-4','b3-5','b3-6', 'b4', 'b5','b5-1','b6', 'b7', 'b8', 'b9','b10','b11','b12','b13','b14','b15',
                             'y1','y2','y3','y3-1','y3-2','y3-3','y3-4','y3-5','y3-6','y4','y5','y5-1','y6','y7','y8','y9','y10','y11','y12','y13','y14','y15',
                            'g1','g2','g3','g3-1','g3-2','g3-3','g3-4','g3-5','g3-6','g4','g5','g5-1','g6','g7','g8','g9','g10','g11','g12','g13','g14','g15',
                            'r1','r2','r3','r3-1','r3-2','r3-3','r3-4','r3-5','r3-6','r4','r5','r5-1','r6','r7','r8','r9','r10','r11','r12','r13','r14','r15');
        }

        public function getIndex($space)
        {
            return array_search($space,$this->spacesOnBoard); // Grab the index value for a given space
          
        }
        public function getSpace($index)
        {
            return $this->spacesOnBoard[$index]; // Return the space for a given index in the array
        }
        
    }       
    
?>

