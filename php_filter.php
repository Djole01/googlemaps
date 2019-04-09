<?php 
session_start();

if((isset($_POST["filterSubmit"])) && !empty($_POST["filterSubmit"])) 
{
   
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "fitness";
        
  $connect = mysqli_connect($hostname, $username, $password, $databaseName);
        
  // get values form filter input
  $filter = $_POST['filterInput'];
  // session variable, that will go into the database for newly added points.
  // this makes it so that when the filter is active, a new point will show up, without needing to filter again.
  $_SESSION['filterValue'] = $filter;
                
  // mysql query to Update data
      
        
  $query = "UPDATE `gyms` SET `filter`='".$filter."'";

  $result = mysqli_query($connect, $query);
        
  if($result)
  {
    header("Refresh:0; url=index.php");
     exit();
  }
  else
  {
    echo 'Data Not Updated';
  }
}
?>