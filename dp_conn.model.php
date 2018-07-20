<?php

    try{
        
        $Dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
        $Options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
        $Conn = new PDO($Dsn, DBUSER, DBPASS, $Options);

    } 
    catch (PDOException $e){
        echo $e->getCode(). $e->getMessage();
    }
