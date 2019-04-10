<?php
session_start();

// this will be changed to take value from database.

// this neeeeeds work on
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$databaseName = "fitness";
				// connect with mysql
				$con = mysqli_connect($hostname, $username, $password, $databaseName);
				
				// select Database
				mysqli_select_db($con,'fitness');
				$sql = "SELECT DISTINCT filter FROM gyms";
				$result = mysqli_query($con,$sql);

				while($row = mysqli_fetch_assoc($result)) {
					
					$_SESSION['filterValue'] = $row["filter"];
				 }
				 
				


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Gyms in Helsinki</title>
		<link rel="shortcut icon" type="image/png" href="images/favicon.png">
		<meta charset="UTF-8">
		<meta http-equiv='cache-control' content='no-cache'>
  	  <meta http-equiv='expires' content='0'>
  	  <meta http-equiv='pragma' content='no-cache'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/googlemap.js"></script>
		<link rel="stylesheet" type="text/css" href="css/googlemap.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			.container {
				height: 500px;
			}
			#map {
				
				width: 100%;
				height: 100%;
				border: 1px solid blue;
				margin: 0 auto;
				
			}
			#data, #allData, #filteredData{
				display: none;
			}
		</style>
	</head>
	<body>
	<div class="container">
			<center><h1>Gyms in Helsinki</h1></center>
			<?php 
				// get data from database, send to javascript file with encoding and echo.
				require 'fitness.php';
				$fit = new fitness;
				$coll = $fit->getGymsBlankLatLng();
				$coll = json_encode($coll, true);
				echo '<div id="data">' . $coll . '</div>'; 
				$allData=$fit->filterGyms();
				$allData = json_encode($allData, true);
				echo '<div id="allData">' . $allData . '</div>';
			
			?>
	
		<div id="map"></div>
		<div class="grid-container">
			<div> 
				<form action="php_add_data_to_mysql_database_table.1.php" method="post" id="updateForm">
					<h2>Add Gym</h2>

					<label for="nameNew">Gym Name:</label>
					<input type="text" name="nameNew" required><br><br>

					<label for="addressNew">Gym Address:</label>
					<input type="text" name="addressNew" required><br><br>

					<label for="keywordNew">Gym Keyword:</label>
					<input type="text" name="keywordNew" required><br><br>

					<label for="latNew">(opt) New Lat Cordinate:</label>
					<input type="text" name="latNew" ><br><br>

					<label for="lngNew">(opt) New Lng Cordinate:</label>
					<input type="text" name="lngNew" ><br><br>




					<input type="submit" name="add" value="Add Data">
				</form>
			</div>
			<div> 
				<form action="php_update_data_from_mysql_database_table.php" method="post" id="updateForm">
					<h2>Update Gyms</h2>
					<label for="id">Gym to update (ID):</label>
					<input type="text" name="id" required><br><br>

					<label for="name">New Name:</label>
					<input type="text" name="name" required><br><br>

					<label for="address">New Address:</label>
					<input type="text" name="address" required><br><br>

					<label for="keyword">New Keyword:</label>
					<input type="text" name="keyword" required><br><br>

					<label for="lat">(opt)New Lat Cordinate:</label>
					<input type="text" name="lat" ><br><br>

					<label for="lng">(opt)New Lng Cordinate:</label>
					<input type="text" name="lng" ><br><br>





					<input type="submit" name="update" value="Update Data">
				</form>
			</div>
			
			
		<div id="displayGym"> 

			<h2>Displayed Gyms</h2>
			<form action="php_filter.php" method="post" id="filterForm">
			Filter by Keyword: <select  selected="selected" name="filterInput">
					
			<?php
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$databaseName = "fitness";
				// connect with mysql
				$con = mysqli_connect($hostname, $username, $password, $databaseName);
				
				// select Database
				mysqli_select_db($con,'fitness');
				$sql = "SELECT DISTINCT keyword FROM gyms";
				$records = mysqli_query($con,$sql);

				while ($row = mysqli_fetch_array($records))
					{
						$keyword = $row['keyword'];
						echo "<option value='$keyword'>$keyword</option>";


					}
				

				
			?>
					<input type="submit" name="filterSubmit" value="Filter Data"><br><br>
					</form>
					</select>

					<table border=1 cellpadding=1 cellspacing=1>
						<tr>	
							<th>ID</th>
							<th>Name</th>
							<th>Address</th>
							<th>Keyword</th>
							<th>lat</th>
							<th>lng</th>
							<th>Delete</th>
						</tr>
					
			<?php
				
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$databaseName = "fitness";
				// connect with mysql
				$con = mysqli_connect($hostname, $username, $password, $databaseName);
						
					
				// select Database
				mysqli_select_db($con,'fitness');

				$sql = "SELECT * FROM gyms WHERE filter = keyword";
					
				$records = mysqli_query($con,$sql);

				while ($row = mysqli_fetch_array($records))
					{
						echo "<tr>";
						echo "<td>".$row['id']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['address']."</td>";
						echo "<td>".$row['keyword']."</td>";
						echo "<td>".$row['lat']."</td>";
						echo "<td>".$row['lng']."</td>";
						echo "<td><a href=delete.php?id=".$row['id'].">Delete</a></td>";


					}
				


			?>
					</table>
						<div id="keywordDisplay">
						<h1>All Gyms</h1>

						
							<table border=1 cellpadding=1 cellspacing=1>
							<tr>	
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Keyword</th>
								<th>lat</th>
								<th>lng</th>
								<th>Delete</th>
							</tr>
						<?php
						$hostname = "localhost";
						$username = "root";
						$password = "";
						$databaseName = "fitness";
						// connect with mysql
						$con = mysqli_connect($hostname, $username, $password, $databaseName);
							// select Database
							mysqli_select_db($con,'fitness');
							// select Query
							$sql = "SELECT * FROM gyms";	
							
						


							$records = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($records))
							{
								echo "<tr>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['keyword']."</td>";
								echo "<td>".$row['lat']."</td>";
								echo "<td>".$row['lng']."</td>";
								echo "<td><a href=delete.php?id=".$row['id'].">Delete</a></td>";


							}
							

							
						?>
					</table>
				</div>

				</div>
					</div>
				

	</div>
		
	<?php



	?>
	</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZHPncN6_acE52ilamFDKyJRzPRo9Udzs&callback=loadMap">
</script>
</html>


