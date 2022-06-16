<?php

function connect(){
    $dsn = "mysql:host=localhost;dbname=comp";
    $user = 'root';
    $pass = '';

    try {
        return new PDO($dsn, $user, $pass);
    }
    catch(PDOException $ex) {
        echo $ex->GetMessage();
    }
}
        
    
