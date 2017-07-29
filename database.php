<?php
  

    $dsn = 'mysql:host=sql1.njit.edu;dbname=oah5';
    $username = 'oah5';
    $password = '8ch7Js22';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>