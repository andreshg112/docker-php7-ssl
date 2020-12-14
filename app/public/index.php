<?php

error_reporting(E_ALL);

require_once('mysqli_helper.php');

$cfg = include('config.php');

// Connexion et sélection de la base
$conn = new mysqli_helper($cfg['db_host'], $cfg['db_user'], $cfg['db_pass'], $cfg['db_name'], null, null);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = $conn->query("SHOW STATUS LIKE 'Ssl_cipher'");
$row = $res->fetch_assoc();

$res = $conn->query("show variables like '%ssl%'");
$all = $res->fetch_all();

mysqli_close($conn);

exit(json_encode([$row, $all], JSON_UNESCAPED_SLASHES));
