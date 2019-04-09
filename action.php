<?php 
	require 'fitness.php';
	$fit = new fitness;
	$fit->setId($_REQUEST['id']);
	$fit->setLat($_REQUEST['lat']);
	$fit->setLng($_REQUEST['lng']);
	$status = $fit->updateGymWithLatLng();
	if($status == true) 
	{
		header("Refresh:0; url=index.php");
	} 
	else 
	{
		echo "Failed...";
	}



 ?>