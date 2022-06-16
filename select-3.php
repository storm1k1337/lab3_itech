<?php

try {

    require_once('connecting.php');
    $dbh = connect();
    
    $querySelect = 'SELECT DISTINCT c.netname
                    FROM computer c
                    WHERE c.guarantee < CURRENT_DATE';

    echo '<ol>';
    foreach($dbh->query($querySelect) as $row)
        echo '<li class = "listItem">', $row[0], '</li>';
    echo '</ol>';
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}

$dbh = null;
        
    
