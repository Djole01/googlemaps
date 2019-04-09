<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
  {
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "fitness";
    
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // get values form input text and number
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $keyword = $_POST['keyword'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
      
            
    // mysql query to Update data
    // if an input field is left blank, the value goes to 0, instead of NULL.
    // if values are blank, sets them to null in the database, for geocode function
    // This means, that when updating a location, you dont need to use coordinates, geocoder will do that instead.
    if(($lat == 0)||($lng == 0))
    {
      $query = "UPDATE `gyms` SET `name`='".$name."',`address`='".$address."',`keyword`='".$keyword."',`lat`=NULL,`lng`=NULL WHERE `id` = $id";  
    }
    
    else
    {
      $query = "UPDATE `gyms` SET `name`='".$name."',`address`='".$address."',`keyword`='".$keyword."',`lat`='".$lat."',`lng`='".$lng."' WHERE `id` = $id";
    }

    $result = mysqli_query($connect, $query);
    
    if($result)
    {
      header("Refresh:0; url=index.php");
    }
    else
    {
        echo 'Data Not Updated';
    }
  
  }
?>

