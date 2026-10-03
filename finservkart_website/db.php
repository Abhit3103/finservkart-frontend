<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'finservkart');
define('DB_PASS', 'WindRed@12345');
define('DB_NAME', 'finservkart');

/* Attempt to connect to MySQL database */
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS['conn'] = $pdo;

} catch (PDOException $e) {
    $GLOBALS['e'] = $e;
    die("ERROR: Could not connect. " . $e->getMessage());
}