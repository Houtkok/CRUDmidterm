<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vaccine";
    try{
        $con = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "fail" ; 
    }?>

