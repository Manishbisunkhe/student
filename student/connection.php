<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    //connecting to database
    try{
        $conn = new PDO("mysql:host=$servername; dbname=studentmanagement", $username, $password);
        $conn-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Connected Successfully.';
    }
    catch(\Exception $e){
        $error_message = $e -> getMessage();
    }

?>