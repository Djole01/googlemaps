<?php 


	class fitness	
	{
		private $id;
		private $name;
		private $address;
		private $keyword;
		private $lat;
		private $lng;
		private $conn;
		private $filter;
		private $tableName = "gyms";

		// data members created, get set
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		function setKeyword($keyword) { $this->keyword = $keyword; }
		function getKeyword() { return $this->keyword; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }
		function setFilter($filter) { $this->filter = $filter; }
		function getFilter() {return $this->filter;}
		
		// Connection to database 
		public function __construct() 
		{
			require_once('db/DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}
		// selects gyms with no cordinates from mysql database
		public function getGymsBlankLatLng()
		{
			$sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		/*
		// selects all the gyms
		// I planned to use this interchangeably with the filter function below, but i did not manage to implement it so that the filter only happens
		// once the filter form is submitted (my application reloads index, and then whatever variable i set there will be set the default value again). 
		
		Currently, it will filter by default.
		
		public function getAllGyms() {

			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		*/
		// filter function
		public function filterGyms()
		{
			// sql query takes only the data where the selected filter matches the keyword.
			$sql = "SELECT * FROM $this->tableName WHERE filter = keyword";	
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		
		// adds cordinates through geo coding. 
		public function updateGymWithLatLng() 
		{
			$sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat', $this->lat);
			$stmt->bindParam(':lng', $this->lng);
			$stmt->bindParam(':id', $this->id);

			if($stmt->execute()) 
			{
				return true;
			} 
			else 
			{
				return false;
			}
		}


		public function getFilterFromDatabase() 
		{
			$sql = "SELECT DISTINCT filter FROM $this->tableName";	
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		
	}

?>