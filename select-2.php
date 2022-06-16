<?php

try {

    require_once('connecting.php');
    $dbh = connect();
    $item = $_GET['software'];
    
    $querySelect = "SELECT DISTINCT c.netname
                    FROM computer c 
                        INNER JOIN computer_software cs ON c.ID_Computer = cs.FID_computer
                        INNER JOIN software s ON cs.FID_software = s.id_software
                    WHERE s.name = '$item';";

    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");

    echo '<?xml version="1.0" encoding="utf8" ?>';
    echo "<root>";

    foreach($dbh->query($querySelect) as $row)
        print "<netname>$row[0]</netname>";

    echo "</root>";
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}

$dbh = null;