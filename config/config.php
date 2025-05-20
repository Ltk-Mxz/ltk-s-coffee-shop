<?php
try {
    // Host
    define("HOST", "localhost");

    // Database Name
    define("DBNAME", "coffee-ltk");

    // Username
    define("USER", "root");

    // Password
    define("PASS", "");

    // La constante APPURL est bien définie
    if (!defined('APPURL')) {
        define('APPURL', 'http://localhost/coffee-ltk');
    }

    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . "", USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $Exception) {
    echo $Exception->getMessage();
}
