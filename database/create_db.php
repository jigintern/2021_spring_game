<?php
$DSN = "mysql:host=localhost;dbname=mysql";
$DB_USER = "root";
$DB_PASS = "";

try{
    $conn = new PDO($DSN,$DB_USER,$DB_PASS);
    // 例外をスローする
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "create database if not exists game";
    $conn->exec($sql);
} catch  (\Exception $e){
    echo $sql . "<br>" . $e->getMessage();
}

$conn =null;