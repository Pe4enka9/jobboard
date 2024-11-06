<?php

$host = 'MySQL-8.2';
$dbname = 'jobboard';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

return new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);