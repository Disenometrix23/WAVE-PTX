<?php 
    
    define('USER', 'metrix_user');
    define('PASSWORD', 'khGngkUIcW8ugObD');
    define('HOST', 'localhost');
    define('DATABASE', 'metrix_wape');

    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }

   
?>
