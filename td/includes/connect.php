<?php
$connection = new mysqli("localhost","root","","ecommerce");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}

//CREATE TABLE users(id int(5),fname varchar(255),lname varchar(255),email varchar(255),mobile int(11),password varchar(10));
//ALTER TABLE users ADD PRIMARY KEY (id);
// CREATE TABLE newsletter(id int(5),email varchar(255));
//ALTER TABLE newsletter ADD PRIMARY KEY (id);
