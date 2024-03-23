<?php
define('USER', 'root');
define('PASSWORD', '12345678');
define('HOST', 'localhost');
define('DATABASE', 'login Ucocar');
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>