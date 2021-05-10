<?php
include 'db/db_connect.php';
$movieArray = array();
$response = array();
//Check for mandatory parameter movie_id
if(isset($_GET['id'])){
	$movieId = $_GET['id'];
	//Query to fetch movie details
	$query = "SELECT lat, lon FROM app WHERE id=?";
	if($stmt = $con->prepare($query)){
		//Bind movie_id parameter to the query
		$stmt->bind_param("i",$id);
		$stmt->execute();
		//Bind fetched result to variables $movieName, $genre, $year and $rating
		$stmt->bind_result($lat,$lon);
		//Check for results		
		if($stmt->fetch()){
			//Populate the movie array
			$movieArray["id"] = $id;
			$movieArray["lat"] = $lat;
			$movieArray["lon"] = $lon;
			
		
		
		}else{
			//When movie is not found
			$response["success"] = 0;
			$response["message"] = "Movie not found";
		}
		$stmt->close();
 
 
	}else{
		//Whe some error occurs
		$response["success"] = 0;
		$response["message"] = mysqli_error($con);
		
	}
 
}else{
	//When the mandatory parameter movie_id is missing
	$response["success"] = 0;
	$response["message"] = "missing parameter movie_id";
}
//Display JSON response
echo json_encode($response);
?>