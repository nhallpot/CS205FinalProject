<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        // This sets the current page to not be a link. Repeat this if block for
        //  each menu item 
        
        
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage"><a href="index.php">Home</a></li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        
        if ($path_parts['filename'] == "help") {
            print '<li class="activePage"><a href="help.php">Help</a></li>';
        } else {
            print '<li><a href="help.php">Help</a></li>';
        }
        
        if ($path_parts['filename'] == "sorry") {
            print '<li class="activePage"><a href="sorry.php">Play Sorry!</a></li>';
        } else {
            print '<li><a href="sorry.php">Play Sorry!</a></li>';
        }
        ?>
    </ol>
</nav>
<!-- #################### Ends Main Navigation    ########################## -->

