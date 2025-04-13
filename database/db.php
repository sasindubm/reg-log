<?php
//declaring essential variables to create a database connection

$hostName = "localhost:3306"; //default mysql port is 3306. you can change it here according to your mysql port is different
$userName = "root"; //default user is root. change if it's different.
$password = "1128"; //place here your dbms password.
$databaseName = "phpform"; //place here your database name.

//create connection
$conn = mysqli_connect($hostName, $userName, $password, $databaseName); //$conn should hold a value if connection is successful.

//test connection for debug purpose only
// if (!empty($conn)) { //check that $conn variable isn't empty
//     echo "<script>window.alert('database connection successful');</script>"; //if $conn isn't empty
// } else {
//     echo "<script>window.alert('database connection failed.');</script>"; //if $conn is empty
// }

?>