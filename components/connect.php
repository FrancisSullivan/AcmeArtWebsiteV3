<?php

function connect() {
    $host = 'localhost';
    $db = 'at2_sprint_3';
    $user = 'adminer';
    $password = 'P@ssw0rd';
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try {
        return new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo "crash here $e";   
    }
}
