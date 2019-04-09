<?php


$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "fitness";
// connect with mysql
$con = mysqli_connect($hostname, $username, $password, $databaseName);
// select Database
mysqli_select_db($con,'fitness');
// select Query"using GET
$sql = "DELETE FROM gyms WHERE id='$_GET[id]'";
// Execute the query
 if (mysqli_query($con,$sql))
 {
    header("refresh:1; url=index.php");
 }
else 
{
    echo "Not Deleted";
}
?>