<?php

echo "Lets create a database <br> ";

$serverName = "localhost";
$userName = "root";
$password = "";

$conn = mysqli_connect($serverName, $userName, $password);

//die if connection is not successful
if (!$conn) {
    die('Sorry not connected to db' . mysqli_connect_errno());
} else {
    echo 'Connected to db';
}
;

//Create a db
$sql = "CREATE DATABASE dbprakash";
$result = mysqli_query($conn, $sql);

//Check for the data vase creation success
echo '<br>';
if ($result) {
    echo 'The db was created successful';
} else {
    echo 'The db was not created because of this error------->' . mysqli_error($conn);
}

?>