<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sorry!</title>
        <meta charset="utf-8">
        <meta name="description" content="A php app that tracks inventory">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="custom.css" type="text/css" media="screen">    
        <link rel="stylesheet" href="bootstrap.css" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap.min.css" type="text/css" media="screen">
       
        <?php
        $debug = false;

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// PATH SETUP
//
        $domain = "http://";
        if (isset($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }

        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");

        $domain .= $server;

        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

        $path_parts = pathinfo($phpSelf);

        if ($debug) {
            print "<p>Domain" . $domain;
            print "<p>php Self" . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre>";
        }

    </head>
    <!-- ################ body section ######################### -->

    <?php
    print '<body>';
    //id="' . $path_parts['filename'] . '"
    ?>