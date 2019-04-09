<?php
  session_start();
  // php code to Update data from mysql database Table

if(isset($_POST['add']))
  {
      // database credidentials
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "fitness";
    
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    

    // get values form input text 
    
    $nameNew = $_POST['nameNew'];
    $addressNew = $_POST['addressNew'];
    $keywordNew = $_POST['keywordNew'];
    $latNew = $_POST['latNew'];
    $lngNew = $_POST['lngNew'];
    if (isset($_SESSION['filterValue']))
    {
      // session variable, from php_filter.php. It sets the new data to have the same filter like the other data in database.
      $filter = $_SESSION['filterValue'];
    }
    else 
    {
      echo 'session not working';
    } 
    // mysql query to insert data
    // if an input field is left blank, the value goes to 0, instead of NULL.
    // if values are blank, sets them to null in the database, for geocode function
    if(($latNew == 0)||($lngNew == 0))
    {
      $query = "INSERT INTO gyms (name,address,keyword,lat,lng,filter) VALUES ('$nameNew','$addressNew','$keywordNew',NULL,NULL,'$filter')";
    }
    else
    {
      $query = "INSERT INTO gyms (name,address,keyword,lat,lng,filter) VALUES ('$nameNew','$addressNew','$keywordNew','$latNew','$lngNew','$filter')";

    }
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
      
      header("Refresh:0; url=index.php");
      // header("Refresh:0; url=index.php");
    }
    else
    {
      echo 'Data Not Added';
    }
  }
?>





