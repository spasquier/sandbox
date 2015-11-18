<?php

include "src/Demo/PostgreSQLDemo.php";
use Demo\PostgreSQLDemo;

$host = "localhost";
$port = "5432";
$dbname = "openbravo";
$user = "postgres";
$pass = "postgres";

$demo = new PostgreSQLDemo();
$demo->printTables($host, $port, $dbname, $user, $pass);
