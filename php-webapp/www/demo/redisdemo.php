<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//include private password
header('Content-Type: text/plain');

include "../private/redis.inc.php";
$redis = new Redis(); 

//Connecting to Redis server on localhost 
$redis->connect('127.0.0.1', 6379); 
$redis->auth($redispassword);
echo "Connection to server sucessfully\n"; 

//check whether server is running or not 
echo "Server is running: ".$redis->ping()."\n"; 
$bar=$redis->incr("bar");
echo "redis bar:".$bar."\n";

$redis->close();

?>

