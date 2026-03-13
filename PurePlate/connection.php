<?php
// Create connection
$connection = mysqli_connect("localhost", "root", "");

// Check connection
if(!$connection){
    die("Connection failed: " . mysqli_connect_error());
}

// Select database
$db = mysqli_select_db($connection, "demo");

// Check database selection
if(!$db){
    die("Database not found. Please create database 'demo' in phpMyAdmin.");
}
?>