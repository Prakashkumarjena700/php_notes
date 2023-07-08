<?php
echo "Lets insert data in db <br> ";

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

//variables into the tables
$name = "Preeti";
$destinaiton = "Dhenkanal";

//sql query will be executied
$sql = "INSERT INTO `phptrip` (`name`, `dest`) VALUES ('$name', '$destinaiton')";


//Add a new data in the table
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "New trip has been added in to the table";
} else {
    echo "Data has NOT been added" . mysqli_error($conn);
}


?>