<?php
echo '<h2>Welcome to the stage where we are ready to connect to db</h2> <br> ';
//ways to connect mySql

// 1-Musqli extension(procidure,object oriented)
// 2-PDO

//MySqli extension (procidure)

$servername = 'localhost';
$username = 'root';
$password = "";

//create a connection object
$conn = mysqli_connect($servername, $username, $password);

//die id connection was not successful

if (!$conn) {
    die('Sorry we failed to connect' . mysqli_connect_errno());
}else{
    echo "Conection was successful";
}



    ?>