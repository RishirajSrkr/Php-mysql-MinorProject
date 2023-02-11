<?php
// ---creating variable for each value----
header("Location: response.html");

$name = $_POST["name"];
$number = $_POST["number"];
$qty = filter_input(INPUT_POST, "qty",FILTER_VALIDATE_INT);



$host = "localhost";
$username = "root";  
$password = "";
$dbname = "bloodbank";


$conn = mysqli_connect($host, $username, $password, $dbname);



if(mysqli_connect_errno())
{
    die("Connection error: " .mysqli_connect_errno());
}




$sql = "INSERT INTO a_minus (name, number, qty) VALUES(?, ?, ?)";

//creating prepare statement object
$stmt = mysqli_stmt_init($conn);


if( ! mysqli_stmt_prepare($stmt, $sql))
{
    die(mysqli_error($conn));
}
//syntax error in sql will be caught here



mysqli_stmt_bind_param($stmt, "sii", $name, $number, $qty);

mysqli_stmt_execute($stmt);

echo "Success!";


