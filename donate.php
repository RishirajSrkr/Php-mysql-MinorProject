<?php
// ---creating variable for each value----
header("Location: response2.html");

$name = $_POST["name"];
$number = $_POST["number"];
$age = $_POST["age"];
$donationHistory = $_POST["donationHistory"];
$disease = $_POST["disease"];
$description = $_POST["description"];



$host = "localhost";
$username = "root";  
$password = "";
$dbname = "bloodbank";


$conn = mysqli_connect($host, $username, $password, $dbname);



if(mysqli_connect_errno())
{
    die("Connection error: " .mysqli_connect_errno());
}




$sql = "INSERT INTO donation (name, number, age, donationhistory, disease, description) VALUES(?,?,?,?,?,?)";

//creating prepare statement object
$stmt = mysqli_stmt_init($conn);



if( ! mysqli_stmt_prepare($stmt, $sql))
{
    die(mysqli_error($conn));
}
//syntax error in sql will be caught here



mysqli_stmt_bind_param($stmt, "siisss", $name, $number, $age, $donationHistory, $disease, $description);

mysqli_stmt_execute($stmt);

echo "Success!";




