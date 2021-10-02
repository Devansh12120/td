<?php
session_start();

$connection = new mysqli("localhost","root","","ecommerce");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}

?>