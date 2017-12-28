<?php

const DBUSER = ' ';
const HOST = ' ';
const DBPASS = ' ';
const DBNAME = 'twitter';
try {
$pdo=new  PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8mb4', DBUSER, DBPASS);
} catch (PDOException $e) {
exit($e->getMessage());
}