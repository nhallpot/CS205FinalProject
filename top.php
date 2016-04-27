<?php
include "lib/constants.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sorry!</title>
        <meta charset="utf-8">
        <meta name="author" content="Sorry!">
        <meta name="description" content="Web version of Sorry!">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="css/base.css" type="text/css" media="screen">


        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <?php
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        //
        // inlcude all libraries. 
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%

        print "<!-- require Database.php -->";

        require_once(LIB_PATH . '/Database.php');

        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        //
        // Set up database connection
        //
        // generally you dont need the admin on the web

        print "<!-- make Database connections -->";
        $dbUserName = 'nhallpot_reader';
        $whichPass = "r"; //flag for which one to use.
        $dbName = DATABASE_NAME;

        $thisDatabaseReader = new Database($dbUserName, $whichPass, $dbName);

        $dbUserName = 'nhallpot_writer';
        $whichPass = "w";
        $thisDatabaseWriter = new Database($dbUserName, $whichPass, $dbName);	

        include 'board.php';
        ?>
    </head>

    <!-- **********************     Body section      ********************** -->
    <?php
    print '<body id="' . $PATH_PARTS['filename'] . '">';
    include "header.php"; 
    include "nav.php";  
    include "board.php";
    ?>