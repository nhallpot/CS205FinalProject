<?php

//$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$
//
// This class is designed to connect to your database and to handle all
// interactions with the database.
// 
// $dbUserName - username you wish to open the database with, generally here at 
//               uvm they are yourusername_reader, yourusername_writer, 
//               yourusername_admin
// $whichPass - techncially i can figure out which passwoard based on the naming
//              conventions of the first letter after the _ in the username. 
//              However passing the letter in is not that hard and you may not
//              always have a convienent naming convention.
//              
// $dbName - the name of the database that you want to access
// 
// This class is based on this article by Tony Marston        
// http://www.tonymarston.net/php-mysql/3-tier-architecture.html
// 
// 
// NOTE: The security in place is a good start but may or may not be all you need
// 
// 
// You will need to know how many where clauses, quotes, conditional expressions
// and html characters are in your query as the query must match what is expected
// as a mechinism to prevent sql injection. If a query does not work pass the query 
// to the testquery method which will display the counts for you. The idea is that 
// you as the programmer will know how many where clauses you have or how many
// quotes you will have in query where as a hacker would not know this. Let me 
// explain the parameter list:
// 
// $query - this is your sql query less any values that can come from the user
//          which would all be replaced with a ? and the values for the question
//          marks sent as an array for example:
//          
//          $query  = 'SELECT fldFirstName FROM tblPeople WHERE fldCity = ? ';
//          $query .= 'AND fldState = ? ORDER BY fldLastName, fldFirstName';
//          
// $values - this is the array that would hold the values for the above query for
//           example if we want to find all the people living in Burlinton, VT:
//           
//           $data = array("Burlington", "VT");
//           
// $wheres - is how many WHERE clauses are in your query, generally it is only one
//           but at some point you may have nested query.
//           
//           $wheres = 1;
//           
// $conditions - is how many logical conditions you have in your query. The 
//               tricky part is I just look for occurances of the string so the
//               word ORDER has the letters OR so that counts as a condition 
//               along with the logical condition AND. So in this example it
//               looks like this:
//               
//               $conditions = 2;
//            
// $quotes - is how many quotes do you have in your query. In our example here 
//           we dont have any though you may think it does. The way the query 
//           would be written is:
//           
//           SELECT fldFirstName FROM tblPeople WHERE fldCity = "Burlington" 
//           AND fldState = "VT" ORDER BY fldLastName, fldFirstName
//           
//           but we are using PDO so the ? marks take care of those. so our 
//           example be:
//           
//           $quotes = 0;
//           
// $symbols - is currently set up just for less than and greater than but can be
//            modified if you needed to allow other symbols. In our example:
//            
//            $symbols = 0;
//            
//            but is you had a query with fldGrade < 60 then it would be
//            
//            $symbols = 1;
// 
// $spacesAllowed - is a boolean to allow blank spaces that are %20. I coded 
//                  this as they are not allowed but if you needed to change 
//                  this you could.
//                  
// $semiColonAllowed - is a boolean to allow a semi colon in yoru query which
//                     is one of the technigues hackers use to try and break
//                     your code. Generally it should be false but if you need
//                     to allow them you can.
// 
// I have put a DB_DEBUG variable in each method just in case you need it.
// ussually you can find your problem with testquery.
// 
// All values should be passed into the methods in the value array and not part
// of the query string itself
// 
// the parameter count is high for a method but i was not sure the best way to 
// handle the possiblites. however parameter list is the same for select, insert
// update, delete and of course test query.
//$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$

class Database {

    public $db;
    const DB_DEBUG = false;
     
    public function __construct($dbUserName, $whichPass, $dbName) {
        $this->db = null;
        $this->connect($dbUserName, $whichPass, $dbName);
    }

    private function connect($dbUserName, $whichPass, $dbName) {
        // Generally I place the password file in a folder outside of my
        // project so there is only one pass.php for all my projects. Then
        // if i change my passwords i only need to change one file.
        require("pass.php");
        

        switch ($whichPass) {
            case "a":
                $dbUserPass = $dbAdmin;
                break;
            case "r":
                $dbUserPass = $dbReader;
                break;
            case "w":
                $dbUserPass = $dbWriter;
                break;
        }


        $query = NULL;

        $dsn = 'mysql:host=webdb.uvm.edu;dbname=';

        if (self::DB_DEBUG) {
            print "<p>Username: " . $dbUserName;
            print "<p>DSN: " . $dsn . $dbName;
            print "<p>PW: " . $whichPass;

        }

        try {
            if (!$this->db)
                $this->db = new PDO($dsn . $dbName, $dbUserName, $dbUserPass);
            if (!$this->db) {
                if (self::DB_DEBUG)
                    echo '<p>A You are NOT connected to the database!</p>';
                return 0;
            } else {
                if (self::DB_DEBUG)
                    echo '<p>A You are connected to the database!</p>';
                return $this->db;
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            if (self::DB_DEBUG)
                echo "<p>A An error occurred while connecting to the database: $error_message </p>";
        }
        return $this->db;
    }


    // #########################################################################
    // Performs a delete query and returns boolean true or false based on 
    // success of query. 
    public function delete($query, $values = "") {
        $success = false;

        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        } else {
            $success = $statement->execute();
        }

        $statement->closeCursor();

        return $success;
    }

    //############################################################################
    // Performs an insert query and returns boolean true or false based on success
    // of query.     
    public function insert($query, $values = "") {
        $success = false;


        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        } else {
            $success = $statement->execute();
        }

        $statement->closeCursor();

        return $success;
    }

    // #########################################################################
    // Used the get the value of the autonumber primary key on the last insert
    // sql statement you just performed
    public function lastInsert() {
        $query = "SELECT LAST_INSERT_ID()";

        $statement = $this->db->prepare($query);

        $statement->execute();

        $recordSet = $statement->fetchAll();

        $statement->closeCursor();

        if ($recordSet)
            return $recordSet[0]["LAST_INSERT_ID()"];

        return -1;
    }

    // #########################################################################
    // attempt to sanitize queries
    // An attempt to stop Hackers as they try to end statments with a semi colon
    // so I replace those the letter Q (could be anything) which allows the 
    // query to execute but it will fail returning nothing.
    // spaces in this conext refer to %20 and most likely will not be in your
    // query
    function sanitizeQuery($query, $spacesAllowed = false, $semiColonAllowed = false) {
        $replaceValue = "Q";

        if (!$semiColonAllowed) {
            $query = str_replace(';', $replaceValue, $query);
        }

        $query = htmlentities($query, ENT_QUOTES);

        $query = str_replace('%20', $replaceValue, $query);

        return $query;
    }

    // #########################################################################
    // Performs a select query and returns an associtative array
    // 
    // $query should be in the form:
    //       SELECT fieldNames FROM table WHERE field = ?
    //       
    // $values is an array that holds the values for all the ? in $query.
    // 
    // Hackers try to add more where clauses and conditions so this is an 
    // attempt to not let them.
    // 
    // $wheres is the total number of WHERE statements in the query. 
    // 
    // $conditions is how many AND, &&, OR, ||, NOT, !, XOR are in the $query 
    //
    // $quotes is how many quotes your query string has
    // 
    // $symbols is for < and > in your conditional expression 
    // 
    // all of the above can be inside the wuery any place.
    //
    // function returns "" if it is not correct
    //
    // $this->sanitizeQuery is another attempt to stop Hackers
    //
    //  $spacesAllowed are %20 and not a blank space
    //  $semiColonAllowed is ; and generally you do not have them in your query
    //
    public function select($query, $values = "") {

        
        $statement = $this->db->prepare($query);
        print($statement->error);
        print($db->error);

        if (is_array($values)) {
            $statement->execute($values);
        } else {
            $statement->execute();
        }

        $recordSet = $statement->fetchAll();

        $statement->closeCursor();

        return $recordSet;
    }



    // #########################################################################
    // Performs an update query and returns boolean true or false based on 
    // success of query. 
    public function update($query, $values = "") {
        $success = false;
        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        } else {
            $success = $statement->execute();
        }

        $statement->closeCursor();

        return $success;
    }

}

// end class
?>
