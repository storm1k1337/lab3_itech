<?php

try {

    require_once('connecting.php');
    $dbh = connect();
    $item = $_GET['cpu'];
    
    $querySelect = "SELECT DISTINCT c.netname
                    FROM computer c 
                        INNER JOIN processor p ON p.ID_Processor = c.FID_processor
                    WHERE p.name = '$item';";

    $sth = $dbh->prepare($querySelect);
    $sth->execute();
    echo json_encode($sth->fetchAll(\PDO::FETCH_ASSOC));
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}

$dbh = null;
        
    
