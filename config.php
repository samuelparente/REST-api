<?php
// ** Developed by Samuel Parente
// ** Testing purposes
// ** Configuration file for connecting to DB


// Dataabase configuration
$hostname = 'localhost';
$username = 'root_test';
$password = 'root_test';
$database = 'tests';

// Connect to database
$conn = mysqli_connect($hostname,$username,$password,$database);

if( !$conn){

    echo ("Cannot connect to db: " . mysqli_connect_error());

}
    

?>