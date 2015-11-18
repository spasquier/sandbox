<?php

include "src/Demo/PostgreSQLDemo.php";
use Demo\PostgreSQLDemo;

$host = "localhost";
$port = "5432";
$dbname = "openbravo";
$user = "postgres";
$pass = "postgres";

$demo = new PostgreSQLDemo($host, $port, $dbname, $user, $pass);
$demo->printTables($dbname);
