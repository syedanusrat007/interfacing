<?php
include 'db/db_connect.php';
//Query to select movie id and movie name
$query = "SELECT id,  FROM app";
$result = array();
$movieArray = array();
$response = array();
//Prepare the query
if($stmt = $con->prepare($query)){
	$stmt->execute();
	//Bind the fetched data to $movieId and $movieName
	$stmt->bind_result($id);
	//Fetch 1 row at a time					
	while($stmt->fetch()){
		//Populate the movie array
		$movieArray["movie_id"] = $id;
		
		$result[]=$movieArray;
		
	}
	$stmt->close();
	$response["success"] = 1;
	$response["data"] = $result;
	
 
}else{
	//Some error while fetching data
	$response["success"] = 0;
	$response["message"] = mysqli_error($con);
		
	
}
//Display JSON response
echo json_encode($response);
 
?>