<?php

echo "<h2>Lets create a table in database</h2> <br> ";

$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = 'dbprakash';

$conn = mysqli_connect($serverName, $userName, $password, $dbname);

//die if connection is not successful
if (!$conn) {
    die('Sorry not connected to db' . mysqli_connect_errno());
} else {
    echo 'Connected to db';
}
;
echo '<br>';

//Create a table in db

$sql = "CREATE TABLE `phptrip` (`sno` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(12) NOT NULL , `dest` VARCHAR(4) NOT NULL , PRIMARY KEY (`sno`))";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'Table was created successfully';
} else {
    echo 'Table was not created '.mysqli_error($conn);
}


?>